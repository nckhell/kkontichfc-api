<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaastornooiInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paastornooi_inscriptions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('gc');
                $table->string('club');
                $table->string('stamnummer');
                $table->string('shirtColor');
                $table->string('pantsColor');
                $table->string('team');
                $table->string('contactName');
                $table->string('contactAddress');
                $table->string('contactTel');
                $table->string('contactEmail');
                $table->timestamp("dateOfInscription")->useCurrent();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paastornooi_inscriptions');
    }
}
