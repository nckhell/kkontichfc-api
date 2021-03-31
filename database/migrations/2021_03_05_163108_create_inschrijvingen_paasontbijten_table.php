<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInschrijvingenPaasontbijtenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('API_inschrijvingen_paasontbijten', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('tel');
            $table->string('email');
            $table->text('order');
            $table->string('total_price');
            $table->string('ophaal_of_levering');
            $table->string('dag');
            $table->string('uur');
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
        Schema::dropIfExists('inschrijvingen_paasontbijten');
    }
}
