<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id');
            /*****************外键*****************/
            $table->string('user_id',255);
            $table->foreign('user_id')->references('id')->on('users');
            /**************************************/
            $table->string('phone',50);
            $table->string('name',50);
            $table->string('address',100);
            $table->string('address_dec',100)->nullable();
            $table->char('address_flag')->default(0);
            $table->string('update_by',50)->nullable();
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
        Schema::dropIfExists('user_addresses');
    }
}
