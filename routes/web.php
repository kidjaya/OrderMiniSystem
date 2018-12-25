<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {   return view('welcome'); });
Route::resource('users','UserController');

/*********************************用户地址&用户信息***************************************************/

Route::get('/users','UserController@index'); //获取所有用户信息->判断管理员权限 <= 1
    Route::post('/users/grant','WxxcxController@getWxUserInfo');//微信小程序登录获取输入插入库 并返回sessionKey和用户信息

Route::group(['middleware'=>'VerifyIdentity'],function(){
    Route::post('/users/addresses','WxUserController@getUserAddress'); //-获取用户地址
    Route::post('/users/addresses/add','UserAddressController@store');//增加用户地址
    Route::post('/users/addresses/edit','UserAddressController@update');//修改用户地址->判断是否是当前用户
    Route::post('/users/addresses/destroy','UserAddressController@destroy');//删除用户地址->判断是否是当前用户
});

/*********************************商家信息&商家排序***************************************************/
Route::get('/sellers','SellerController@index');//获取所有商家（推荐） 每一次加载10个 传？page=number 可获得对应值
    Route::get('/sellers/monthSales','SellerController@orderByMonth');//获取所有商家（销量） 每一次加载10个 传？page=number 可获得对应值
    Route::get('/sellers/freight','SellerController@orderByFreight');//获取所有商家 （免运费）每一次加载10个 传？page=number 可获得对应值
    Route::get('/sellers/grade','SellerController@orderByGrade');//获取所有商家（评分） 每一次加载10个 传？page=number 可获得对应值
//Route::group(['middleware'=>'isAdminister','prefix'=>'admin'],function(){
    Route::post('/sellers/add');//增加商家 -》判断管理员等级为0
    Route::post('/sellers/delete');//删除商家 -》判断管理员等级为0
    Route::post('/sellers/edit');//修改商家信息 -》判断管理员等级为 <=1
//});

/*********************************商品排序&商品详情&商品信息*******************************************/
Route::get('/sellers/{seller_id}','SellerController@show');//获取商家所有商品
    Route::get('/sellers/cuisines/sales/{seller_id}','SellerController@sales');//获取商家所有商品（按销量）
    Route::get('/sellers/cuisines/price/{seller_id}','SellerController@price');//获取商家所有商品（按价格）
        Route::get('/sellers/cuisines/{cuisine_id}','CuisineController@show');//获取商品详细信息
//Route::group(['middleware'=>'isSeller','prefix'=>'modify'],function(){
    Route::post('/sellers/cuisine/add');//商家增加商品 ->判别商家
    Route::post('/sellers/cuisine/edit');//商家修改商品  ->判别商家
    Route::post('/sellers/cuisine/destroy');//商家删除商品  ->判别商家
    Route::post('/sellers/cuisine/Switch');//商家店铺状态开关  ->判别商家
//});

/*********************************获取订单&订单详情&插入订单&更新订单**********************************************/
Route::post('/goods/orders');//->middleware('isAdminister')//管理员获取所有订单->判断管理员等级 <=1
    Route::post('/goods/orders/sellers');//->middleware('isSeller');//获取某商家所有订单->判断是否为助理以上<=3
Route::group(['middleware'=>'VerifyIdentity'],function(){
    Route::post('/goods/order/putOrder','OrderController@store');//插入订单 是否是当前用户，商家是否在线，库存是否足够
    Route::post('/goods/order/payOrder','OrderController@update');//支付订单 ->是否是当前用户 钱是否足够
    Route::post('/goods/myOrderList','OrderController@show');//获取当前用户订单每次加载10个->判断是否是当前用户
    Route::post('/goods/myOrderList/destroy','OrderController@destroy');//删除用户选择的某个订单->判断是否是当前用户
    Route::post('/goods/myOrderList/detail','OrderDetailController@show');//获取某个订单详情页
});



