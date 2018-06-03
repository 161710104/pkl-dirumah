<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gambar');
            $table->string('nama');
            $table->string('warna');
            $table->string('transmisi');
            $table->string('tahun_keluar');
            $table->string('varian');
            $table->integer('cakupan_mesin');
            $table->integer('penumpang');
            $table->integer('kilometer');
            $table->integer('harga');
            $table->longText('deskripsi');
            $table->UnsignedInteger('merk_id');
            $table->foreign('merk_id')->references('id')->on('merks')->ondelete('cascade');
            $table->string('tipe');
            $table->UnsignedInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->ondelete('cascade');
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
        Schema::dropIfExists('mobils');
    }
}
