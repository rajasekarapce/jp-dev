<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptetiveExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptetive_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('competitive_exam')->comment('1=AICEE, 2=AIEEE, 3=AIPMT, 4=CAT, 5=CDS, 6=CLAT, 7=DCEE, 8=GATE, 9=GIC, 10=GMAT, 11=GRE, 12=Civil Service, 13=ICFAI, 14=IES, 15=IIT JEE, 16=LDC, 17=LIC, 18=LSAT, 19=MAT, 20=MCAT, 21=MCET, 22=NAT, 23=NDA, 24=NET, 25=SAT, 26=SET, 27=SNAP, 28=SSC, 29=TOEFL/IELTS, 30=UDC, 31=WBJEE, 32=XAT');
            $table->tinyInteger('score_type');
            $table->float('score');
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
        Schema::dropIfExists('comptetive_exams');
    }
}
