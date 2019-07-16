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
            $table->char('key', 64)->unique();
            $table->string('name');
            $table->enum('identity', ['person', 'company', 'org', 'member']);
            $table->string('email')->unique()->nullable();
            $table->char('mobile', 11)->unique()->nullable();
            $table->string('password');
            $table->tinyInteger('pending')->default(0);
            $table->tinyInteger('vip')->default(0);
            $table->string('domain')->unique();
            $table->enum('reg_type', ['email', 'mobile', 'weixin', 'weibo', 'qq']);
            $table->timestamps();
            $table->char('created_ip', 15);
            $table->rememberToken();;
            $table->tinyInteger('weixin_binding')->default(0);
            $table->tinyInteger('weibo_binding')->default(0);
            $table->tinyInteger('qq_binding')->default(0);
        });
        /*
        Schema::create('email_accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('verified_at');
            $table->char('verified_ip', 15);
            $table->foreign('user_id')->references('id')->on('users');
        });
        */

        Schema::create('email_registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->enum('identity', ['person', 'company', 'org', 'member']);
            $table->string('token')->unique();
            $table->timestamps();
            $table->char('created_ip', 15);
            $table->tinyInteger('verified')->default(0);
        });

        /*
        Schema::create('mobile_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->char('mobile', 11)->unique();
            $table->string('password');
            $table->string('token')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('email_accounts');
        Schema::dropIfExists('email_registers');

    }
}
