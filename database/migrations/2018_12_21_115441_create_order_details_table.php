<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            /*****************外键*****************/
            $table->string('order_id',255);
            $table->foreign('order_id')->references('id')->on('orders');
            /**************************************/
            $table->string('goods_id',255);
            $table->string('good_num',255);
            $table->string('goods_price',255);
            $table->string('goods_all_price',255);
            $table->string('zp_integral',30);
            $table->string('goods_sku',30)->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
