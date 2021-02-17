<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('lesson_id');
            $table->tinyInteger('weekdays');
            $table->time('start');
            $table->time('end');
            $table->timestamps();

            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('cascade');
            $table->foreign('classroom_id')
                ->references('id')->on('classrooms')
                ->onDelete('cascade');
            $table->foreign('lesson_id')
                ->references('id')->on('lessons')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
