<?php

namespace App\Http\Controllers;

use App\WxUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WxUserController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WxUser  $wxUser
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
        $session_key =Crypt::decryptString($request->header('sessionKey'));
        $user =WxUser::where('session_key',$session_key)->first();
        if($user==null){
            return json_encode( ['msg'=>'USER_DOES_NOTE_EXIST','code'=>'20001']);
        }else{
            return $user->getAddress->tojson();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WxUser  $wxUser
     * @return \Illuminate\Http\Response
     */
    public function edit(WxUser $wxUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WxUser  $wxUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WxUser $wxUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WxUser  $wxUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(WxUser $wxUser)
    {
        //
    }
}
