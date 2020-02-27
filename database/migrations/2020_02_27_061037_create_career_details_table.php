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

            $table->tinyInteger('academic_projtype1')->comment('1=My Project, 2=Mini Project, 3=My Seminar, 4=My Presentation, 5= My Case Study');
            $table->string('academic_projname1')->nullable();
            $table->text('academic_projdesc1')->nullable();
            $table->tinyInteger('academic_projtype2')->comment('1=My Project, 2=Mini Project, 3=My Seminar, 4=My Presentation, 5= My Case Study')->nullable();
            $table->string('academic_projname2')->nullable();

            $table->text('academic_projdesc2')->nullable();
            $table->tinyInteger('academic_projtype3')->comment('1=My Project, 2=Mini Project, 3=My Seminar, 4=My Presentation, 5= My Case Study')->nullable();
            $table->string('academic_projname3')->nullable();
            $table->text('academic_projdesc3')->nullable();

            $table->tinyInteger('competitive_exam1')->comment('1=AICEE, 2=AIEEE, 3=AIPMT, 4=CAT, 5=CDS, 6=CLAT, 7=DCEE, 8=GATE, 9=GIC, 10=GMAT, 11=GRE, 12=Civil Service, 13=ICFAI, 14=IES, 15=IIT JEE, 16=LDC, 17=LIC, 18=LSAT, 19=MAT, 20=MCAT, 21=MCET, 22=NAT, 23=NDA, 24=NET, 25=SAT, 26=SET, 27=SNAP, 28=SSC, 29=TOEFL/IELTS, 30=UDC, 31=WBJEE, 32=XAT')->nullable();
            $table->tinyInteger('score_type1')->nullable();
            $table->float('score1')->nullable();
            $table->tinyInteger('competitive_exam2')->nullable();
            $table->tinyInteger('score_type2')->nullable();
            $table->float('score2')->nullable();

            $table->tinyInteger('certification1')->nullable();
            $table->integer('cert_passyr1')->nullable();
            $table->integer('cert_passmonth1')->nullable();

            $table->tinyInteger('certification2')->nullable();
            $table->integer('cert_passyr2')->nullable();
            $table->integer('cert_passmonth2')->nullable();
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
