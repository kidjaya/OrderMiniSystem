<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seller_name',60);
            $table->integer('seller_type')->default(0);
            $table->string('seller_des',100)->nullable();
            $table->string('seller_logo',100);
            $table->string('seller_time',60);
            $table->integer('seller_grade')->default(5);
            $table->string('seller_address',255);
            $table->integer('seller_month_sales',50)->default(3);
            $table->char('seller_freight',1)->default(0);
            $table->char('seller_status',1)->default(1);
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
        Schema::dropIfExists('sellers');
    }
}
