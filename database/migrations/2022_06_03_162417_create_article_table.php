<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('id_catarticle');
            $table->string('judul_artikel');
            $table->string('slug')->unique;
            $table->text('deskripsi_artikel');
            $table->string('gambar_artikel');
            $table->string('sumber_artikel');
            $table->integer('status');
            $table->enum('featured',['No','Yes']);
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
        Schema::dropIfExists('article');
    }
}
