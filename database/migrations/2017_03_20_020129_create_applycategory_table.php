<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplycategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applycategory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('tag');

            $table->integer('master_id')->unsigned();
            $table->foreign('master_id')->references('id')->on('masterapplies');
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
