<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKledingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('API_kleding', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('birth_date');
            $table->enum('member_type', ['NEW', 'EXISTING'])->nullable();
            $table->string('sweater_champ');
            $table->string('socks_glasgow');
            $table->string('short_manchester_black');
            $table->string('t_shirt_jako_red')->nullable();
            $table->string('training_pants_classico')->nullable();
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
        Schema::dropIfExists('kleding');
    }
}
