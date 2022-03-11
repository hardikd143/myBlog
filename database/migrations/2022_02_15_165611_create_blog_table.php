<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create blog 
        Schema::create('BLOG', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('blogID')->unique();
            $table->timestamps();
            $table->longText('blogText');
            $table->string('blogcategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BLOG');
    }
}
