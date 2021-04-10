<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormAssistence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_assistences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('coursexpostulante_id');
            $table->foreign('coursexpostulante_id')->references('id')->on('coursexpostulante');
            $table->date('date_assistence');
            $table->string('assistance', 3);
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
        Schema::dropIfExists('form_assistence');
    }
}
