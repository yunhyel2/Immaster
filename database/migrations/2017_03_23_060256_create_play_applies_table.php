<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('category_detail');
            $table->string('postcode');
            $table->string('location');
            $table->integer('howmany_min')->unsigned()->nullable();
            $table->integer('howmany_max')->unsigned()->nullable();
            $table->integer('cost')->unsigned();

            $table->string('play_name');
            $table->string('play_intro');
            $table->string('play_ready')->nullable();
            $table->string('play_etc')->nullable();
            $table->string('play_tag');

            $table->integer('master_id');
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
