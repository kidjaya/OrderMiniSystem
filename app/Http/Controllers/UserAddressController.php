<?php

namespace App\Http\Controllers;

use App\UserAddress;
use App\User;
use App\WxUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取id
        $session_key =Crypt::decryptString($request->header('sessionKey'));
        $user_id =WxUser::where('session_key',$session_key)->first()->id;
        if($user_id==null){return json_encode(['msg'=>'NEED_USER_ID','code'=>'40001']);}
        if($request->phone==null){return json_encode(['msg'=>'NEED_PHONE','code'=>'40001']);}
        elseif($request->name==null){return json_encode(['msg'=>'NEED_NAME','code'=>'40001']);}
        elseif($request->address==null){return json_encode(['msg'=>'NEED_ADDRESS','code'=>'40001']);}
        elseif($request->address_dec==null){return json_encode(['msg'=>'NEED_ADDRESS_DEC','code'=>'40001']);}
        $userAddress=new UserAddress();
        $userAddress->user_id=$user_id;//WxUser::where('open_id',$request->open_id)->get()->id;
        $userAddress->phone=$request->phone;
        $userAddress->name=$request->name;
        $userAddress->address=$request->address;
        $userAddress->address_dec=$request->address_dec;
        //更新默认地址标记
        if($request->has('address_flag')){
            $userAddress->address_flag=$request->address_flag;
            UserAddress::where(['user_id'=>$user_id,'address_flag'=>1])->update(['address_flag'=>0]);
        }
        $store=$userAddress->save();
        if($store){
            return json_encode(['msg'=>'SUCCESS_STORE_ADDRESS','code'=>200,'new_address_id'=>$userAddress->id]);
        }else{
            return json_encode(['msg'=>'ERROR','code'=>-1]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show(UserAddress $userAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        //获取id
        $session_key =Crypt::decryptString($request->header('sessionKey'));
        $user_id =WxUser::where('session_key',$session_key)->first()->id;
//        $this->authorize('update',$userAddress);
        if($request->address_id==null){return json_encode(['msg'=>'NEED_ADDRESS_ID','code'=>'40001']);}
        elseif($request->phone==null){return json_encode(['msg'=>'NEED_PHONE','code'=>'40001']);}
        elseif($request->name==null){return json_encode(['msg'=>'NEED_NAME','code'=>'40001']);}
        elseif($request->address==null){return json_encode(['msg'=>'NEED_ADDRESS','code'=>'40001']);}
        elseif($request->address_dec==null){return json_encode(['msg'=>'NEED_ADDRESS_DEC','code'=>'40001']);}
        $updateAddress=UserAddress::findOrFail($request->address_id);

        //判断是否是当前用户
        if($updateAddress->user_id!=$user_id){
            return ['msg'=>'you are 不是current用户'];
        }
            $updateAddress->phone=$request->phone;
            $updateAddress->name=$request->name;
            $updateAddress->address=$request->address;
            $updateAddress->address_dec=$request->address_dec;
            if($request->has('address_flag')){
                $userAddress->address_flag=$request->address_flag;
                UserAddress::where(['user_id'=>$user_id,'address_flag'=>1])->update(['address_flag'=>0]);
            }
            $update=$updateAddress->update();
            if($update){
                return json_encode(['msg'=>'SUCCESS_UPDATE_ADDRESS','code'=>200]);
            }else{
                return json_encode(['msg'=>'ERROR','code'=>-1]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $session_key =Crypt::decryptString($request->header('sessionKey'));
        $user_id =WxUser::where('session_key',$session_key)->first()->id;
        UserAddress::findOrFail($request->address_id);
        $destroyAddress = UserAddress::destroy($request->address_id);

        //判断是否是当前用户
        if($destroyAddress->user_id!=$user_id){
            return ['msg'=>'you are 不是current用户'];
        }

        if($destroyAddress){
            return json_encode(['msg'=>'SUCCESS_DELETE_ADDRESS','code'=>200]);
        }
        else{
            return json_encode(['msg'=>'ERROR','code'=>-1]);
        }
    }
}
