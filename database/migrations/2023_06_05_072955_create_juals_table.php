<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('konsumen_id');
            $table->integer('kurir_id');
            $table->enum('status_jual', ['CART','PESAN','PROSES','SIAP','ANTAR','TIBA',
           'BATAL']);
            $table->dateTime('waktu_pesan')->nullable();
            $table->dateTime('waktu_proses')->nullable();
            $table->dateTime('waktu_siap')->nullable();
            $table->dateTime('waktu_antar')->nullable();
            $table->dateTime('waktu_tiba')->nullable();
            $table->dateTime('waktu_batal')->nullable();
            $table->string('keterangan');
            $table->decimal('total_harga');
            $table->integer('konsumen_rate');
            $table->integer('kurir_rate');
            $table->integer('resto_rate');
            $table->integer('alamat_kirim_id');
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juals');
    }
}
