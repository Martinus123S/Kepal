<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationToCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function(Blueprint $table){
          $table->integer('id_produk')->unsigned()->change();
          $table->foreign('id_produk')->references('id')->on('produks')
                 ->onUpdate('cascade')->onDelete('cascade');
      });

        Schema::table('carts', function(Blueprint $table){
          $table->integer('id_user')->unsigned()->change();
          $table->foreign('id_user')->references('id')->on('users')
                 ->onUpdate('cascade')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //   Schema::table('carts', function(Blueprint $table) {
      //       $table->dropForeign('carts_id_produk_foreign');
      //   });
      // ​
      //   Schema::table('carts', function(Blueprint $table) {
      //       $table->dropIndex('carts_id_produk_foreign');
      //   });
      // ​
      //   Schema::table('carts', function(Blueprint $table) {
      //       $table->integer('id_produk')->change();
      //   });
      //
      //   Schema::table('carts', function(Blueprint $table) {
      //       $table->dropForeign('carts_id_user_foreign');
      //   });
      // ​
      //   Schema::table('carts', function(Blueprint $table) {
      //       $table->dropIndex('carts_id_user_foreign');
      //   });
      // ​
      //   Schema::table('carts', function(Blueprint $table) {
      //       $table->integer('id_user')->change();
      //   });
    }
}
