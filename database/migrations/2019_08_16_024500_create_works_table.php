<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('key', 24)->unique();
            $table->unsignedInteger('user_id')->index();
            $table->char('copy_key', 24)->unique();
            $table->char('feed_key', 24)->unique();
            $table->char('album_key', 24)->index();
            $table->string('title')->index();
            $table->string('brief');
            $table->longText('content');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('updated_times')->default(0);
            $table->timestamp('topped_at')->nullable()->index();
            $table->boolean('top_flag')->default(false)->index();
            $table->boolean('remarkable')->default(true)->index();
            $table->unsignedInteger('collects')->default(0);
            $table->unsignedInteger('remarks')->default(0);
            $table->unsignedInteger('praises')->default(0);
            $table->unsignedInteger('reads')->default(0);
            $table->unsignedInteger('shares')->default(0);
            $table->unsignedInteger('appeals')->default(0);
        });

        Schema::create('albums', function (Blueprint $table) {
            $table->char('key', 24)->primary();
            $table->unsignedInteger('user_id')->index();
            $table->string('name');
            $table->unsignedInteger('works_count')->default(0);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('works_remarks', function (Blueprint $table) {
            $table->char('key', 24)->primary();
            $table->char('works_key', 24)->index();
            $table->char('notice_key', 24)->index();
            $table->unsignedInteger('from_user_id')->index();
            $table->unsignedInteger('to_user_id')->index();
            $table->text('content');
            $table->unsignedInteger('supports')->default(0);
            $table->unsignedInteger('opposes')->default(0);
            $table->unsignedInteger('appeals')->default(0);
            $table->timestamp('created_at');
            $table->softDeletes();
        });

        Schema::create('works_praises', function (Blueprint $table) {
            $table->char('key', 24)->primary();
            $table->char('works_key', 24)->index();
            $table->char('notice_key', 24)->index();
            $table->char('feed_key', 24)->index();
            $table->unsignedInteger('praiser_id')->index();
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
        Schema::dropIfExists('works');
        Schema::dropIfExists('albums');
        Schema::dropIfExists('works_remarks');
        Schema::dropIfExists('works_praises');
    }
}
