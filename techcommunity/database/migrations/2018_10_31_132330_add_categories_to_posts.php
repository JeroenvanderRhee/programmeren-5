<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('newsposts', function (Blueprint $table) {
            
            $table->string('image')->after('body_text')->default('uploads/No-image.jpg');
            $table->string('categorie')->after('image')->default('No Category');
            $table->dropColumn('uploaded_file');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
