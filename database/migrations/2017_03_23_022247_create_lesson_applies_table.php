<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('category-detail');
            $table->string('postcode');
            $table->string('location');
            $table->string('class');
            $table->integer('howmany_week')->unsigned()->nullable();
            $table->integer('howmany_total')->unsigned()->nullable();
            $table->string('howmany');
            $table->integer('howmany_min')->unsigned()->nullable();
            $table->integer('howmany_max')->unsigned()->nullable();
            $table->integer('cost')->unsigned();

            $table->string('lesson-name');
            $table->string('lesson-intro');
            $table->string('lesson-goal');
            $table->string('curriculum');
            $table->string('required')->nullable();
            $table->string('lesson-ready')->nullable();
            $table->string('lesson-etc')->nullable();
            $table->string('lesson-tag');

            $table->integer('master_id')->unsigned();
            $table->foreign('master_id')->references('id')->on('server_userprofile');

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
