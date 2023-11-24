<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('min');
            $table->bigInteger('max');
            $table->bigInteger('montant');
            $table->string('typeoperation');
            $table->bigInteger('fk_service_id')->nullable();
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
        Schema::dropIfExists('commissions');
    }
}
