<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYouthInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youth_inscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->enum('sex', ['M', 'F']);
            $table->string('address');
            $table->string('postal');
            $table->string('city');
            $table->string('tel');
            $table->string('birthDate');
            $table->string('birthPlace');
            $table->string('RRN');
            $table->string('legalRepresentative')->nullable();
            $table->string('landOfOrigin')->nullable();
            $table->string('adressAbroad')->nullable();
            $table->string('dateOfArrivalInBelgium')->nullable();
            $table->string('previousClub')->nullable();
            $table->string('position')->nullable();
            $table->string('bankNumber')->nullable();
            $table->enum('affiliatedWithOtherClub', ['Y', 'N'])->nullable();
            $table->text('diseaseAndMedication')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('youth_inscriptions');
    }
}
