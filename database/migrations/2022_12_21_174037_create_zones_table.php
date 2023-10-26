<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('zones');
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('nom_zone')->unique();
            
            $table->unsignedBigInteger('fk_sup_id');
            $table->foreign('fk_sup_id')->references('id')->on('users');
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
        Schema::dropIfExists('zones');
    }
}
