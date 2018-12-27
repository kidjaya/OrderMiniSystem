<?php

namespace App\Http\Controllers;

use App\Seller;
use App\SellerCuisine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $page = request()->page ?? 1;
        $key = "sellers.paginate.".$page;
        $sellers = Cache::get($key);
        if(!$sellers){
            $sellers=Seller::paginate(10);
            Cache::set($key,$sellers,10);
            return json_encode($sellers);
        }
        return json_encode($sellers);
    }
            // 筛选路由
            public function orderByMonth()
            {
                //月销量排序
                $page = request()->page ?? 1;
                $key = "sellers.orderByMonth.paginate.".$page;
                $sellers = Cache::get($key);
                if(!$sellers){
                    $sellers=Seller::orderBy('seller_month_sales','desc')->paginate(10);
                    Cache::set($key,$sellers,10);
                    return json_encode($sellers);
                }
                return json_encode($sellers);
//                return Seller::orderBy('seller_month_sales','desc')->paginate(10)->toJson();
            }
            public function orderByGrade()
            {
                //评分排序
                $page = request()->page ?? 1;
                $key = "sellers.orderByGrade.paginate.".$page;
                $sellers = Cache::get($key);
                if(!$sellers){
                    $sellers=Seller::orderBy('seller_grade','desc')->paginate(10);
                    Cache::set($key,$sellers,10);
                    return json_encode($sellers);
                }
                return json_encode($sellers);
//                return Seller::orderBy('seller_grade','desc')->paginate(10)->toJson();
            }
            public function orderByFreight()
            {
                //运费排序
                $page = request()->page ?? 1;
                $key = "sellers.orderByFreight.paginate.".$page;
                $sellers = Cache::get($key);
                if(!$sellers){
                    $sellers=Seller::where('seller_freight',0)->orderBy('seller_month_sales','desc')->paginate(10);
                    Cache::set($key,$sellers,10);
                    return json_encode($sellers);
                }
                return json_encode($sellers);
//              return Seller::where('seller_freight',0)->orderBy('seller_month_sales','desc')->paginate(10)->toJson();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id==null){
            return ['msg'=>'NEED_ID_BY_URL','code'=>'400001'];
        }
        $key_detail = "sellersCuisines".$id;
        $key_type = "sellersCuisinesType".$id;
        $cuisines = Cache::get($key_detail);
        $cuisines_types = Cache::get($key_type);
        if(!$cuisines&&!$cuisines_types){
            $seller=Seller::find($id);
            $cuisine=$seller->getCuisine;
            $type=$seller->getType;
            Cache::set($key_detail,$cuisine,10);
            Cache::set($cuisines_types,$type,10);
            return json_encode(['cuisine'=>$cuisine,'type'=>$type]);
        }
//        $seller=Seller::find($id);
//        $cuisine=$seller->getCuisine;
//        $type=$seller->getType;
        return json_encode(['cuisine'=>$cuisines,'type'=>$cuisines_types]);
    }
            /**
             * Display the specified resource.
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function sales($id)
            {
                if ($id == null) {
                    return ['msg' => 'NEED_ID_BY_URL', 'code' => '400001'];
                }
                $page = request()->page ?? 1;
                $key="sellerCuisineBySales".$id.$page;
                $cuisines = Cache::get($key);
                if(!$cuisines){
                    $cuisines = SellerCuisine::where('seller_id',$id)
                        ->orderBy('cuisine_month_sales','desc')
                        ->paginate(10);
                    Cache::set($key,$cuisines,10);
                    return json_encode($cuisines);
                }
//                $cuisine = SellerCuisine::where('seller_id',$id)
//                        ->orderBy('cuisine_month_sales','desc')
//                        ->paginate(10);
                return json_encode($cuisines);
            }
            /**
             * Display the specified resource.
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function price($id)
            {
                if ($id == null) {
                    return ['msg' => 'NEED_ID_BY_URL', 'code' => '400001'];
                }
                $page = request()->page ?? 1;
                $key="sellerCuisineByPrice".$id.$page;
                $cuisines = Cache::get($key);
                if(!$cuisines){
                    $cuisines = SellerCuisine::where('seller_id',$id)
                    ->orderBy('cuisine_price','desc')
                    ->paginate(10);
                    Cache::set($key,$cuisines,10);
                    return json_encode($cuisines);
                }
//                $cuisine = SellerCuisine::where('seller_id',$id)
//                    ->orderBy('cuisine_price','desc')
//                    ->paginate(10);
                return json_encode($cuisines);
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
