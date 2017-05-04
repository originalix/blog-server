<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticalContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlesContent', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('artical_id')->unsigned();
           $table->foreign('artical_id')->references('id')->on('articles')->onDelete('cascade');
           $table->string('title');
           $table->longText('desc');
           $table->longText('content');
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
        Schema::dropIfExists('ArticlesContent');
    }
}
