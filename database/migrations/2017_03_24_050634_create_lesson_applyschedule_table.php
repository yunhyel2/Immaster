<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonApplyscheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_applyschedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule')->unsigned();
            $table->integer('sub_schedule')->unsigned();
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');

            $table->integer('apply_id')->unsigned();
            $table->foreign('apply_id')->references('id')->on('lesson_applies');
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
        //
    }
}
