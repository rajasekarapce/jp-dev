<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('work_exp');
            $table->tinyInteger('hold_offer')->nullable();
            $table->tinyInteger('eng_commrate');
            $table->json('other_languages')->nullable();
            $table->string('training_course')->nullable();
            $table->string('training_instname')->nullable();
            $table->tinyInteger('dur_frommonth')->nullable();
            $table->integer('dur_fromyr')->nullable();
            $table->tinyInteger('dur_tomonth')->nullable();
            $table->integer('dur_toyr')->nullable();

             $table->text('training_details')->nullable();
             $table->string('achievements1')->nullable();
             $table->string('achievements2')->nullable();
             $table->string('achievements3')->nullable();
             $table->text('brief_desc')->nullable();

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
        Schema::dropIfExists('career_details');
    }
}
