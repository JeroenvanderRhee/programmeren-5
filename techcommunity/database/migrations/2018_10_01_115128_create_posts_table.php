<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->ipAddress('url');   
            $table->string('title');
            $table->longText('description_post');
            $table->longText('long_text');
            $table->string('uploaded_file');
            $table->dateTime('created_at_date');
            $table->dateTime('created_by_user');
            $table->ipAddress('ip_created_at');   
            $table->boolean('active');
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
        Schema::dropIfExists('posts');
    }
}
