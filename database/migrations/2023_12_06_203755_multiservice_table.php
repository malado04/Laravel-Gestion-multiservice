<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MultiserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiservices', function (Blueprint $table) {
            $table->id();
            $table->string('rs');
            $table->string('sigle')->nullable();
            $table->string('numrg')->nullable();
            $table->string('ninea')->nullable();
            $table->bigInteger('fk_sup_id')->nullable();
            $table->bigInteger('fk_up_id')->nullable();
            $table->bigInteger('fk_proprio_id')->nullable();
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
        Schema::dropIfExists('multiservices');
    }
}
