<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('hq_qualid')->unsigned();
            $table->foreign('hq_qualid')->references('id')->on('qualifications');
            $table->integer('hq_passmonth');
            $table->integer('hq_passyear');
            $table->tinyInteger('hq_marktype');
            $table->float('hq_mark');
            $table->integer('hq_state')->unsigned();
            $table->foreign('hq_state')->references('id')->on('states');
            $table->integer('hq_institute')->unsigned();
            $table->foreign('hq_institute')->references('id')->on('institutions');
            $table->integer('hq_university')->unsigned();
            $table->foreign('hq_university')->references('id')->on('universities');

            //12th Mark    
            $table->integer('xii_passmonth');
            $table->integer('xii_passyear');
            $table->tinyInteger('xii_marktype');
            $table->float('xii_mark');
            $table->string('xii_school');
            $table->string('xii_board');
            //10th Mark    
            $table->integer('x_passmonth');
            $table->integer('x_passyear');
            $table->tinyInteger('x_marktype');
            $table->float('x_mark');
            $table->string('x_school');
            $table->string('x_board');
            
            
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
        Schema::dropIfExists('education_details');
    }
}
