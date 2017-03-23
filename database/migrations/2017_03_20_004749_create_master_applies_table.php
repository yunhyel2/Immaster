<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->string('birth')->nullable();
            $table->string('gender');

            $table->string('career')->nullable();

            $table->string('intro');
            $table->string('intro_detail');
            $table->string('sns_1')->nullable();
            $table->string('sns_2')->nullable();
            $table->string('sns_3')->nullable();
            $table->string('sns_4')->nullable();

            $table->string('business');
            $table->string('business_docu')->nullable();
            $table->string('business_name')->nullable();
            $table->string('sale');
            $table->string('sale_docu')->nullable();
            $table->string('sale_name')->nullable();
            $table->string('bankbook_docu')->nullable();
            $table->string('bankbook_name');

            $table->string('profile_image');
            $table->string('profile_name');
            $table->string('image')->nullable();
            $table->string('image_name')->nullable();
            
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
