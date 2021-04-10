<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamPCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_p', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('postulante_id');
            $table->foreign('postulante_id')->references('id')->on('persons');
            $table->string('book');
            $table->string('folio');
            $table->string('apartado');
            $table->unsignedInteger('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('instructor');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');  
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
        Schema::dropIfExists('exam_p');
    }
}
