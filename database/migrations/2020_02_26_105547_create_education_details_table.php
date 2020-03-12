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
            $table->integer('hq_passmonth')->nullable();
            $table->integer('hq_passyear');
            $table->tinyInteger('hq_marktype')->nullable();
            $table->float('hq_mark')->nullable();
            $table->integer('hq_state')->unsigned()->nullable();
            $table->foreign('hq_state')->references('id')->on('states');
            $table->integer('hq_institute')->unsigned();
            $table->foreign('hq_institute')->references('id')->on('institutions');
            $table->integer('hq_university')->unsigned();
            $table->foreign('hq_university')->references('id')->on('universities');

            //12th Mark    
            $table->integer('xii_passmonth')->nullable();
            $table->integer('xii_passyear')->nullable();
            $table->tinyInteger('xii_marktype')->nullable();
            $table->float('xii_mark')->nullable();
            $table->string('xii_school')->nullable();
            $table->string('xii_board')->nullable();
            //10th Mark    
            $table->integer('x_passmonth')->nullable();
            $table->integer('x_passyear')->nullable();
            $table->tinyInteger('x_marktype')->nullable();
            $table->float('x_mark')->nullable();
            $table->string('x_school')->nullable();
            $table->string('x_board')->nullable();
            
            
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
