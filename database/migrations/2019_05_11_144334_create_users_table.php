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
            $table->enum('type', ['person', 'company', 'org', 'member']);
            $table->enum('login_type', ['mobile', 'weixin', 'weibo', 'qq', 'email']);
            $table->tinyInteger('pending')->default(0);
            $table->tinyInteger('vip')->default(0);
            $table->string('domain')->unique();
            $table->timestamp('created_at');
            $table->timestamp('name_updated_at')->nullable();
            $table->timestamp('domain_updated_at')->nullable();
            $table->rememberToken();
        });

        Schema::create('emails', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('token');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('emails');

    }
}
