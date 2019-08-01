<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            /**
             * feed 类型
             */
            $table->enum('feed_type', [
                'nm', //new messages (新消息)
                'nw', //new works (新作品)
                'pw', //praise works (赞了新作品)
                'nt', //new topic (新话题)
                'no', //new opinion (新见解)
                'po', //praise works (赞了新见解)
                'ng', //new group (新建讨论组)
                'nt', //new team (新建团队)
                'ns', //new sale (新建出售)
                'nh', //new hire（新建招聘）
                'nc', //contract（新建分包）
            ]);
            $table->char('copy_key', 64)->unique();
            $table->bigInteger('timestamp');
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
        Schema::dropIfExists('feeds');
    }
}
