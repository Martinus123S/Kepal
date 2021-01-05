<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_produk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produk');
            $table->integer('id_pesan');
            $table->integer('kuantitas');
            $table->integer('total'); // qty * harga
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
        Schema::dropIfExists('pesan_produk');
    }
}
