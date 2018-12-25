<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Migrations\Migration;

class CreateWxUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->unique();
            $table->string('session_key',255);
            $table->string('uuid',255)->default(Uuid::uuid1());
            $table->string('zp_integral',20)->default(0);
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
        Schema::dropIfExists('wx_users');
    }
}
