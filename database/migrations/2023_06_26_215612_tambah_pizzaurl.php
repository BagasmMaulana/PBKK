<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahPizzaurl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
 Schema::table('pizzas', function(Blueprint $table){
 $table->string('pizza_url')->default('');
 });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
