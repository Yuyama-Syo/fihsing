<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('target',20);
            $table->integer('catch_number');
            $table->integer('max_size');
            $table->//prefecture_idのカラム
            $table->//city_idのカラム
            $table->string('weather',20);
            $table->dateTime('catch_time');
            $table->string('fishing_type',20);
            $table->string('rod',20)->nullable();
            $table->string('reel',20)->nullable();
            $table->string('line',20)->nullable();
            $table->string('item',20)->nullable();
            $table->text('image_path');
            $table->timestamps();
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
        Schema::dropIfExists('posts');
    }
}
