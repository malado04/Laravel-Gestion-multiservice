<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('montant');
            $table->string('operation');
            $table->bigInteger('commission')->nullable();
            $table->bigInteger('fk_service_id')->nullable();
            $table->bigInteger('fk_solde_id')->nullable();
            $table->bigInteger('fk_caisse_id')->nullable();
            $table->bigInteger('fk_barem_id')->nullable(); 
            $table->bigInteger('fk_sup_id')->nullable();
            $table->bigInteger('fk_up_id')->nullable();
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
        Schema::dropIfExists('operations');
    }
}
