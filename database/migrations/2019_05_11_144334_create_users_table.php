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
            $table->increments('id');
            $table->char('key', 64)->unique();
            $table->string('name');
            $table->enum('identity', ['person', 'company', 'org', 'member']);
            $table->string('email')->unique();
            $table->char('mobile', 11)->unique()->nullable();
            $table->string('password');
            $table->tinyInteger('pending')->default(0);
            $table->tinyInteger('vip')->default(0);
            $table->string('domain')->unique();
            $table->enum('reg_type', ['email', 'mobile', 'weixin', 'weibo', 'qq']);
            $table->timestamps();
            $table->char('created_ip', 15);
            $table->rememberToken();
            $table->string('api_token', 64)->unique();
            $table->tinyInteger('weixin_binding')->default(0);
            $table->tinyInteger('weibo_binding')->default(0);
            $table->tinyInteger('qq_binding')->default(0);
            $table->timestamp('last_logined_at')->nullable();
            $table->char('last_logined_ip', 15)->nullable();
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
            $table->increments('id');
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

        Schema::create('persons', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->mediumInteger('follows')->default(0);
            $table->mediumInteger('followers')->default(0);
            $table->mediumInteger('praises')->default(0);
            $table->mediumInteger('collects')->default(0);
            $table->mediumInteger('news')->default(0);
            $table->mediumInteger('works')->default(0);
            $table->mediumInteger('opinions')->default(0);
            $table->mediumInteger('sales')->default(0);
            $table->mediumInteger('groups')->default(0);
            $table->mediumInteger('teams')->default(0);
            $table->timestamps();
            $table->char('updated_ip', 15)->nullable();
        });

        Schema::create('logins', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->index();
            $table->enum('client_type', ['web', 'app']);
            $table->enum('account_type', ['email', 'mobile', 'weixin', 'weibo', 'qq']);
            $table->timestamp('logined_at');
            $table->char('logined_ip', 15);
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
        Schema::dropIfExists('email_registers');
        Schema::dropIfExists('persons');
        Schema::dropIfExists('logins');      

    }
}
