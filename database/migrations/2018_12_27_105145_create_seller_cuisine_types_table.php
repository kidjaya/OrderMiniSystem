<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerCuisineTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_cuisine_types', function (Blueprint $table) {
            $table->increments('id');
            /********************************************外键****************************************************/
            $table->integer('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers');
            /*****************************************************************************************************/
            $table->string('seller_type_name',20);
            $table->integer('seller_type_id')->nullable();
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
        Schema::dropIfExists('seller_cuisine_types');
    }
}
