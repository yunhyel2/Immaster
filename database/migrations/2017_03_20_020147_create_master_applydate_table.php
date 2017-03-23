<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterApplydateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_applydate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day');
            $table->string('time');

            $table->integer('apply_id')->unsigned();
            $table->foreign('apply_id')->references('id')->on('master_applies');

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
