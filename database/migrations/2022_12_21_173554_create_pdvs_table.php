<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::dropIfExists('pdvs');

        Schema::create('pdvs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_pdv')->unique();
            $table->unsignedBigInteger('fk_sup_id');
            $table->unsignedBigInteger('fk_zone_id');

            $table->foreign('fk_sup_id')->references('id')->on('users');
            // $table->foreign('fk_zone_id')->references('id')->on('zones');

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
        Schema::dropIfExists('pdvs');
    }
}
