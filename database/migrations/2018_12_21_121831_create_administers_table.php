<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ramsey\Uuid\Uuid;

class CreateAdministersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');//对应的商家管理
            $table->string('gm_uuid',255)->default(Uuid::uuid1());
            $table->string('phone',30)->nullable();
            $table->string('password',255);
            $table->string('email',255)->unique();
            $table->char('power',2)->default(3);//0 root ,1 administer, 2 Seller ,3 SellerAssistant
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
        Schema::dropIfExists('administers');
    }
}
