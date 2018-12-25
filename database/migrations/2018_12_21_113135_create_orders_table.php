<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ramsey\Uuid\Uuid;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            /*****************外键*****************/
            $table->string('user_id',255);
            $table->foreign('user_id')->references('id')->on('wx_users');
            /**************************************/
            /*****************外键*****************/
            $table->string('seller_id',255);
            $table->foreign('seller_id')->references('id')->on('sellers');
            /**************************************/
            $table->string('order_num',255)->default(Uuid::uuid4());
            $table->char('distribution',1)->default(1);
            $table->string('address',100);
            $table->string('name',30);
            $table->string('gender',10)->default(0);
            $table->string('phone',30);
            $table->string('order_price',20);
            $table->string('goods_price',20);
            $table->string('freight',10)->default(1);
            $table->string('discount',10)->default(0);
            $table->string('coupon_id',255)->nullable();
            $table->string('zp_integral',10)->default(0);
            $table->char('order_state',1)->default(0);
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
        Schema::dropIfExists('orders');
    }
}
