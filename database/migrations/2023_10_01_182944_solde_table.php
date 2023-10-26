<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoldeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldes', function (Blueprint $table) {
          
            $table->id();  
            $table->bigInteger('montant');
            $table->bigInteger('fk_caisse_id')->nullable();
            $table->bigInteger('fk_solde_id')->nullable();
            $table->bigInteger('fk_sup_id')->nullable();
            $table->bigInteger('fk_up_id')->nullable();
            $table->bigInteger('act')->default(1);
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
        Schema::dropIfExists('soldes');
    }
}
