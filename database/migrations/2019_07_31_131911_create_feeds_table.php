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
            $table->char('key', 24)->primary();
            $table->unsignedInteger('user_id')->index();
            /**
             * feed 类型
             */
            $table->enum('type', [
                'nm', //new messages (新消息, 分包，合作，提问)
                'nw', //new works (新作品)
                'pw', //praise works (赞了作品)
                'no', //new opinion (新见解)
                'po', //praise opinion (赞了见解)
                'nt', //new team (新建团队)
                'ns', //new sale (新建出售)
                'nh', //new hire（新建招聘）
            ]);
            $table->char('copy_key', 24)->index();
            $table->timestamp('created_at')->index();
            $table->softDeletes();
        });

        Schema::create('copies', function (Blueprint $table) {
            $table->char('key', 24)->primary();
            $table->char('original_key', 24);
            $table->enum('type', [
                'works',//作品
                'topic',//话题
                'opinion',//观点
                'team',//团队
            ]);
            $table->text('brief');
            $table->boolean('delete')->default(false);
            $table->index('original_key', 'type');
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
        Schema::dropIfExists('copies');
    }
}
