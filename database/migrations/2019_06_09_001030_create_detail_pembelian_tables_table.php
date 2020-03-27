<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPembelianTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembelian_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pembelian_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pembelian_id')->references('id')->on('pembelian');
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
        Schema::dropIfExists('detail_pembelian_tables');
    }
}
