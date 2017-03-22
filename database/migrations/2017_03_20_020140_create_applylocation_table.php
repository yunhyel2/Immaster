<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplylocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applylocation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->string('location_detail');

            $table->integer('apply_id')->unsigned();
            $table->foreign('apply_id')->references('id')->on('masterapplies');
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
