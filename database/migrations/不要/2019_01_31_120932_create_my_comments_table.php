<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_comments', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('my_post_id');
          $table->string('body');
          $table->timestamps();
          $table
            ->foreign('post_id')
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
        Schema::dropIfExists('my_comments');
    }
}
