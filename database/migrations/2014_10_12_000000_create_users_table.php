<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat') -> nullable();
            $table->string('email') -> nullable();
            $table->integer('no_hp') -> nullable();
            $table->string('username') -> nullable();
            $table->string('password');
            $table->integer('is_admin')->nullable();
            $table->string('created_by')-> nullable();
            $table->string('updated_by') -> nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}