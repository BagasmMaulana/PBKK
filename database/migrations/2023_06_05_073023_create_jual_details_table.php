<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJualDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jual_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('jual_id');
            $table->integer('pizza_id');
            $table->string('nama_pizza');
            $table->integer('qty');
            $table->decimal('harga_satuan');
            $table->decimal('sub_total');
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jual_details');
    }
}
