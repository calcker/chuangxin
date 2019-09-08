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
            $table->char('key', 24)->unique();
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
            $table->boolean('weixin_binding')->default(false);
            $table->boolean('weibo_binding')->default(false);
            $table->boolean('qq_binding')->default(false);
            $table->timestamp('last_logined_at')->nullable();
            $table->char('last_logined_ip', 15)->nullable();
        });

        Schema::create('email_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->enum('identity', ['person', 'company', 'org', 'member']);
            $table->string('token')->unique();
            $table->timestamps();
            $table->char('created_ip', 15);
            $table->boolean('verified')->default(false);
        });

        Schema::create('persons', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('followings')->default(0);
            $table->unsignedInteger('followers')->default(0);
            $table->unsignedInteger('praises')->default(0);
            $table->unsignedInteger('collections')->default(0);
            $table->unsignedInteger('mails')->default(0);
            $table->unsignedInteger('works')->default(0);
            $table->unsignedInteger('inspirations')->default(0);
            $table->unsignedInteger('sellings')->default(0);
            $table->unsignedInteger('questions')->default(0);
            $table->unsignedInteger('answers')->default(0);
            $table->unsignedInteger('build_teams')->default(0);
            $table->unsignedInteger('join_teams')->default(0);
            $table->enum('gender', [1, 2]);
            $table->string('profession')->index();
            $table->unsignedSmallInteger('field')->index();
            $table->datetime('birthday');
            $table->unsignedSmallInteger('district')->index();
            $table->text('brief');
            $table->timestamps();
        });

        Schema::create('logins', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->index();
            $table->enum('client_type', ['web', 'app']);
            $table->enum('account_type', ['email', 'mobile', 'weixin', 'weibo', 'qq']);
            $table->timestamp('logined_at');
            $table->char('logined_ip', 15);
        });

        Schema::create('followers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('follower_id')->index();
            $table->timestamp('created_at');
            $table->softDeletes();
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
        Schema::dropIfExists('followers');

    }
}
