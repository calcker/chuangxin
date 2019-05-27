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
            $table->tinyInteger('pending')->default(0);
            $table->tinyInteger('vip')->default(0);
            $table->string('domain')->unique();
            $table->enum('reg_type', ['email', 'mobile', 'weixin', 'weibo', 'qq']);
            $table->timestamp('created_at');
            $table->char('created_ip', 15);
            $table->timestamp('name_updated_at')->nullable();
            $table->timestamp('domain_updated_at')->nullable();
            $table->rememberToken();
            $table->tinyInteger('email_binding')->default(0);
            $table->tinyInteger('mobile_binding')->default(0);
            $table->tinyInteger('weixin_binding')->default(0);
            $table->tinyInteger('weibo_binding')->default(0);
            $table->tinyInteger('qq_binding')->default(0);
            $table->timestamp('last_logined_at')->nullable();
            $table->char('last_logined_ip', 15)->nullable();
        });

        Schema::create('email_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('token')->unique();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('mobile_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->char('mobile', 11)->unique();
            $table->string('password');
            $table->string('token')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('email_accounts');
        Schema::dropIfExists('mobile_accounts');

    }
}
