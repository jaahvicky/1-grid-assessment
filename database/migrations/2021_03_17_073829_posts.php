<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    // posts table
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title')->unique();
        $table->text('body');
        $table->bigInteger('user_id')->unsigned()->nullable();
        $table->timestamps();

        $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('posts');
    }
}
