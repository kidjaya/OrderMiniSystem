<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WxUser;
use Iwanli\Wxxcx\Wxxcx;

class WxxcxController extends Controller
{
    protected $wxxcx;

    function __construct(Wxxcx $wxxcx)
    {
        $this->wxxcx = $wxxcx;
    }

    /**
     * 小程序登录获取用户信息
     * @author 晚黎
     * @date   2017-05-27T14:37:08+0800
     * @param  \Illuminate\Http\Request  $request
     * @return [type]                   [description]
     */
    public function getWxUserInfo()
    {
        //code 在小程序端使用 wx.login 获取
        $code = request('code', '');
        //encryptedData 和 iv 在小程序端使用 wx.getUserInfo 获取
        $encryptedData = request('encryptedData', '');
        $iv = request('iv', '');

        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);
        //获取解密后的用户信息
        return $this->wxxcx->getUserInfo($encryptedData, $iv);
    }
}
