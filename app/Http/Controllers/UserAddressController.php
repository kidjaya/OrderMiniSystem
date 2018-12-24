<?php

namespace App\Http\Controllers;

use App\UserAddress;
use Illuminate\Http\Request;

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
        //
        if($request->user_id==null){return json_encode(['msg'=>'NEED_USER_ID','code'=>'40001']);}
        elseif($request->phone==null){return json_encode(['msg'=>'NEED_PHONE','code'=>'40001']);}
        elseif($request->name==null){return json_encode(['msg'=>'NEED_NAME','code'=>'40001']);}
        elseif($request->address==null){return json_encode(['msg'=>'NEED_ADDRESS','code'=>'40001']);}
        elseif($request->address_dec==null){return json_encode(['msg'=>'NEED_ADDRESS_DEC','code'=>'40001']);}
        $userAddress=new UserAddress();
        $userAddress->user_id=$request->user_id;
        $userAddress->phone=$request->phone;
        $userAddress->name=$request->name;
        $userAddress->address=$request->address;
        $userAddress->address_dec=$request->address_dec;
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
        if($request->address_id==null){return json_encode(['msg'=>'NEED_ADDRESS_ID','code'=>'40001']);}
        elseif($request->phone==null){return json_encode(['msg'=>'NEED_PHONE','code'=>'40001']);}
        elseif($request->name==null){return json_encode(['msg'=>'NEED_NAME','code'=>'40001']);}
        elseif($request->address==null){return json_encode(['msg'=>'NEED_ADDRESS','code'=>'40001']);}
        elseif($request->address_dec==null){return json_encode(['msg'=>'NEED_ADDRESS_DEC','code'=>'40001']);}
        $updateAddress=UserAddress::findOrFail($request->address_id);
            $updateAddress->phone=$request->phone;
            $updateAddress->name=$request->name;
            $updateAddress->address=$request->address;
            $updateAddress->address_dec=$request->address_dec;
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
        UserAddress::findOrFail($request->address_id);
        $destroyAddress = UserAddress::destroy($request->address_id);
        if($destroyAddress){
            return json_encode(['msg'=>'SUCCESS_DELETE_ADDRESS','code'=>200]);
        }
        else{
            return json_encode(['msg'=>'ERROR','code'=>-1]);
        }
    }
}
