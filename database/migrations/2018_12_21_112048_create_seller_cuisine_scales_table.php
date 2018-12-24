<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerCuisineScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_cuisine_scales', function (Blueprint $table) {
            $table->increments('id');
            /*****************外键*****************/
            $table->string('cuisine_id',255);
            $table->foreign('cuisine_id')->references('id')->on('seller_cuisines');
            /*************************************/
            $table->string('sku_name',60);
            $table->string('sku_price',30);
            $table->string('sku_ori_price',30);
            $table->char('del_flag',1)->default(0);
            $table->string('update_by',50)->nullable();
            $table->string('remarks',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_cuisine_scales');
    }
}
