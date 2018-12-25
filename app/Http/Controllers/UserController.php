<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "创建新的用户表单";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->name==null){return json_encode(['msg'=>'NEED_NAME','code'=>'40001']);}
        elseif($request->openid==null){return json_encode(['msg'=>'NEED_OPENID','code'=>'40001']);}
        elseif($request->phone==null){return json_encode(['msg'=>'NEED_PHONE','code'=>'40001']);}
        elseif($request->gender==null){return json_encode(['msg'=>'NEED_SEX','code'=>'40001']);}
        $user = new User();
        $user->name = $request->name;
        $user->openid = $request->openid;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $store=$user->save();
        if($store){
            return json_encode(['msg'=>'SUCCESS_ STORE_USER','code'=>200,'new_user_id'=>$user->id]);
        }else{
            return json_encode(['msg'=>'ERROR','code'=>-1]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user =User::find($id);
        if(!$user){
            return json_encode( ['msg'=>'USER_DOES_NOTE_EXIST','code'=>'20001']);
        }else{
            return  $user->toJson();
        }
    }
            /**
             * Display the specified resource.
             * @param \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function getUserAddress(Request $request)
            {

                $user =User::find($request->user_id);
                if($user==null){
                    return json_encode( ['msg'=>'USER_DOES_NOTE_EXIST','code'=>'20001']);
                }else{
                    $user->getAddress;
                    return $user->toJson();
                }
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return "编辑用户信息";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=User::find($id);
        $user->name=$request->name;
        $user->openid=$request->openid;
        $user->phone=$request->phone;
        $user->gender=$request->gender;
        $update=$user->update();
        if($update){
            return json_encode(['msg'=>"SUCCESS_UPDATE",'id'=>$id]);
        }else{
            return json_encode(['msg'=>"FAIL_UPDATE",'id'=>$id]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if(!$user){
            return json_encode( ['msg'=>'USER_DOES_NOTE_EXIST','code'=>'20001']);
        }else {
            User::destroy($id);
            return "删除" . $id . "用户";
        }
    }
}
