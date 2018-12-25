<?php

namespace App\Http\Controllers;

use App\SellerCuisine;
use App\SellerCuisineScale;
use Illuminate\Http\Request;

class CuisineController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
//     * @param  \App\SellerCuisine  $sellerCuisine
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查看商品细节包括规格
        $cuisine = SellerCuisine::find($id);
        if(!$cuisine){
            return json_encode( ['msg'=>'CUISINE_DOES_NOTE_EXIST','code'=>'20001']);
        }
        elseif($cuisine->has_sku){
            $cuisine->allScale;
            return json_encode(['detail'=>$cuisine]);
        }
        else{
            return  $cuisine->toJson();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellerCuisine  $sellerCuisine
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerCuisine $sellerCuisine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellerCuisine  $sellerCuisine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerCuisine $sellerCuisine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerCuisine  $sellerCuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerCuisine $sellerCuisine)
    {
        //
    }
}
