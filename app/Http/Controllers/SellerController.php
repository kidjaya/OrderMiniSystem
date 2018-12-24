<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取全部商家
        return Seller::paginate(10)->toJson();
    }
            // 筛选路由
            public function orderByMonth()
            {
                //
                return Seller::orderBy('seller_month_sales','desc')->paginate(10)->toJson();
            }
            public function orderByGrade()
            {
                //
                return Seller::orderBy('seller_grade','desc')->paginate(10)->toJson();
            }
            public function orderByFreight()
            {
                //
                return Seller::where('seller_freight',0)->orderBy('seller_month_sales','desc')->paginate(10)->toJson();
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
//     * @param  \App\Seller  $seller
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuisine=Seller::find($id);
        return $cuisine->getCuisine->toJson();

//
//        $seller = Seller::find($id);
//        if(!$seller){
//            return json_encode( ['msg'=>'SELLER_DOES_NOTE_EXIST','code'=>'20001']);
//        }else{
//            return  $seller->toJson();
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
