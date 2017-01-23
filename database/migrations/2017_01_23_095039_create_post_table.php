<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
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
            $table->string('title', 255);
            $table->string('body', 255);
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('tag_id');
            $table->integer('post_id');
            $table->string('tag', 255);
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
        Schema::drop('posts');
        Schema::drop('tags');
    }
}
