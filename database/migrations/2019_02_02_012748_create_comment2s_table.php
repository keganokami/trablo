<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComment2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment2s', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('my_post_id');
          $table->string('body');
          $table->timestamps();
          $table
            ->foreign('my_post_id')
            ->references('id')
            ->on('my_posts')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment2s');
    }
}
