<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerCuisinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_cuisines', function (Blueprint $table) {
            $table->increments('id');
            /*****************外键*****************/
            $table->integer('seller_id',255);
            $table->foreign('seller_id')->references('id')->on('sellers');
            /**************************************/
            $table->string('cuisine_name',50);
            $table->integer('type_id')->default(0);
            $table->string('cuisine_pic',100);
            $table->string('cuisine_dec',60)->nullable();
            $table->string('cuisine_stock',10)->default(100);
            $table->integer('cuisine_ori_price');
            $table->integer('cuisine_price');
            $table->char('has_sku',1)->default(0);
            $table->char('cuisine_state',1)->default(1);
            $table->string('cuisine_body',255);
            $table->integer('cuisine_month_sales')->default(5);
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
        Schema::dropIfExists('seller_cuisines');
    }
}
