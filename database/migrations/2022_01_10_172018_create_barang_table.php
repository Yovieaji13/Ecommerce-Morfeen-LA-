<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('slug')->unique;
            $table->integer('harga');
            $table->text('deskripsi');
            $table->integer('status');
            $table->enum('trending',['No','Yes']);
            $table->string('gambar_disply');
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
        Schema::dropIfExists('barang');
    }
}
