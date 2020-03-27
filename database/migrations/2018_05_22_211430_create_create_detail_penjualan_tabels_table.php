<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreateDetailPenjualanTabelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penjualan_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('penjualan_id')->references('id')->on('penjualan');
            $table->foreign('barang_id')->references('id')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_penjualan');
    }
}
