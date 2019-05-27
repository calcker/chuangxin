<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('identity', ['person', 'company', 'org', 'member']);
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('pending')->default(0);
            $table->tinyInteger('vip')->default(0);
            $table->tinyInteger('actived')->default(0);
            $table->char('mobile', 11)->nullable();
            $table->string('domain')->unique();
            $table->timestamp('created_at');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verified_token')->unique();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('mobile_verified_token')->nullable();
            $table->timestamp('name_updated_at')->nullable();
            $table->timestamp('domain_updated_at')->nullable();
            $table->rememberToken();
            //$table->enum('login_type', ['mobile', 'weixin', 'weibo', 'qq', 'email']);
        });

        /*
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('active_token')->unique();
            $table->timestamp('actived_at')->nullable();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('emails');

    }
}
