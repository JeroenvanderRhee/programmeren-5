<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewspostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsposts', function (Blueprint $table) {
            $table->increments('id')->unique;
            $table->ipAddress('url');   
            $table->string('title');
            $table->longText('description_post');
            $table->longText('long_text');
            $table->string('uploaded_file');
            $table->dateTime('created_at_date');
            $table->string('created_by_user');
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
        Schema::dropIfExists('newsposts');
    }
}
