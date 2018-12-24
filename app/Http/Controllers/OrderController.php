<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //插入新的订单
        if($request->user_id==null){return json_encode(['msg'=>'NEED_USER_ID','code'=>'40001']);}
        elseif($request->seller_id==null){return json_encode(['msg'=>'NEED_SELLER_ID','code'=>'40001']);}
        elseif($request->address==null){return json_encode(['msg'=>'NEED_ADDRESS','code'=>'40001']);}
        elseif($request->name==null){return json_encode(['msg'=>'NEED_NAME','code'=>'40001']);}
        elseif($request->order_price==null){return json_encode(['msg'=>'NEED_ORDER_PRICE','code'=>'40001']);}
        elseif($request->goods_price==null){return json_encode(['msg'=>'NEED_GOODS_PRICE','code'=>'40001']);}
        elseif($request->phone==null){return json_encode(['msg'=>'NEED_PHONE','code'=>'40001']);}
        elseif($request->detail==null){return json_encode(['msg'=>'NEED_DETAIL','code'=>'40001']);}
        $order = new Order();
            $order->user_id = $request->user_id;
            $order->seller_id = $request->seller_id;
            $order->address = $request->address;
            $order->name = $request->name;
            $order->order_price = $request->order_price;
            $order->goods_price = $request->goods_price;
            $order->phone = $request->phone;
//        dd($order=$request->detail);
            $store=$order->save();
//        dd($order->id);
        foreach($request->detail as $value){
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->goods_id = $value['goods_id'];
            $orderDetail->good_num = $value['good_num'];
            $orderDetail->goods_price = $value['goods_price'];
            $orderDetail->goods_all_price = $value['goods_all_price'];
            $orderDetail->goods_sku = $value['goods_sku'];
            $orderDetail->zp_integral = $value['zp_integral'];
            $detail=$orderDetail->save();
            if(!$detail){
                return json_encode(['msg'=>'ERROR','code'=>-1]);
            }
        }
        if($store){
            return json_encode(['msg'=>'SUCCESS_STORE_ORDER_&_DETAIL','code'=>200,'new_order_id'=>$order->id]);
        }else{
            return json_encode(['msg'=>'ERROR','code'=>-1]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //查看某个用户的订单
        $orderList =  User::find($request->id);
        return $orderList->getOrder->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if(Order::where('id',$request->order_id)->get()){
            $order_id=$request->order_id;
            $status=Order::where('id',$order_id)->update(['order_state'=>1]);
            if($status){
                //TODO通知卖家
                //TODO增加积分
                return json_encode(['msg'=>'SUCCESS_PAY','code'=>'200']);
            }
        }else{
                return  json_encode(['msg'=>'SERVICE_DEFAULT','code'=>'-1']);
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
        //删除订单
        $delete=Order::destroy($request->order_id);
        $deleteDetail=OrderDetail::destroy('order_id',$request->order_id);
        if($delete&&$deleteDetail){
            return json_encode(['msg'=>'SUCCESS_DELETE']);
        }else{
            return json_encode(['msg'=>'FAIL_DELETE','code'=>'404']);
        }
    }
}
