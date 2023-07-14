<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatKirimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_kirims', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('konsumen_id');
            $table->string('nama_penerima');
            $table->string('alamat');
            $table->boolean('is_default');
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_kirims');
    }
}
