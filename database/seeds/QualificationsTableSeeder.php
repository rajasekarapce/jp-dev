<?php

use Illuminate\Database\Seeder;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('qualifications')->insert(array(
  array('id' => '1','course' => 'Diploma','status' => '1','qual_type' => '3', 'pouplar' => 1),
  array('id' => '2','course' => 'BE/B.Tech','status' => '1','qual_type' => '1', 'pouplar' => 1),
  array('id' => '3','course' => 'MBA/PGDM','status' => '1','qual_type' => '2', 'pouplar' => 1),
  array('id' => '4','course' => 'MCA','status' => '1','qual_type' => '2', 'pouplar' => 1),
  array('id' => '5','course' => 'ME/M.Tech','status' => '1','qual_type' => '2', 'pouplar' => 1),
  array('id' => '6','course' => 'MSc','status' => '1','qual_type' => '2', 'pouplar' => 1),
  array('id' => '7','course' => 'B.Arch','status' => '1','qual_type' => '1'),
  array('id' => '8','course' => 'B.Com','status' => '1','qual_type' => '1'),
  array('id' => '9','course' => 'B.Pharm','status' => '1','qual_type' => '1'),
  array('id' => '10','course' => 'BA','status' => '1','qual_type' => '1'),
  array('id' => '11','course' => 'BBA/BBM','status' => '1','qual_type' => '1'),
  array('id' => '12','course' => 'BCA','status' => '1','qual_type' => '1'),
  array('id' => '13','course' => 'BDS','status' => '1','qual_type' => '1'),
  array('id' => '14','course' => 'BEd','status' => '1','qual_type' => '1'),
  array('id' => '15','course' => 'BHM','status' => '1','qual_type' => '1'),
  array('id' => '16','course' => 'BSc','status' => '1','qual_type' => '1'),
  array('id' => '17','course' => 'BVSc','status' => '1','qual_type' => '1'),
  array('id' => '18','course' => 'CA','status' => '1','qual_type' => '1'),
  array('id' => '19','course' => 'CS','status' => '1','qual_type' => '1'),
  array('id' => '20','course' => 'ICWA','status' => '1','qual_type' => '1'),
  array('id' => '21','course' => 'LLB','status' => '1','qual_type' => '1'),
  array('id' => '22','course' => 'MBBS','status' => '1','qual_type' => '1'),
  array('id' => '23','course' => 'B.Design','status' => '1','qual_type' => '1'),
  array('id' => '24','course' => 'B.FashionTech','status' => '1','qual_type' => '1'),
  array('id' => '25','course' => 'BFA','status' => '1','qual_type' => '1'),
  array('id' => '26','course' => 'BAMS','status' => '1','qual_type' => '1'),
  array('id' => '27','course' => 'BHMS','status' => '1','qual_type' => '1'),
  array('id' => '28','course' => 'B.P.Ed','status' => '1','qual_type' => '1'),
  array('id' => '29','course' => 'B.F.Sc(Fisheries)','status' => '1','qual_type' => '1'),
  array('id' => '30','course' => 'BSW','status' => '1','qual_type' => '1'),
  array('id' => '31','course' => 'Other Graduate','status' => '1','qual_type' => '1'),
  array('id' => '32','course' => 'LLM','status' => '1','qual_type' => '2'),
  array('id' => '33','course' => 'M Phil / Ph.D','status' => '1','qual_type' => '2'),
  array('id' => '34','course' => 'M.Arch','status' => '1','qual_type' => '2'),
  array('id' => '35','course' => 'M.Com','status' => '1','qual_type' => '2'),
  array('id' => '36','course' => 'M.Pharm','status' => '1','qual_type' => '2'),
  array('id' => '37','course' => 'MA','status' => '1','qual_type' => '2'),
  array('id' => '38','course' => 'MD','status' => '1','qual_type' => '2'),
  array('id' => '39','course' => 'MDS','status' => '1','qual_type' => '2'),
  array('id' => '40','course' => 'MEd','status' => '1','qual_type' => '2'),
  array('id' => '41','course' => 'MHM','status' => '1','qual_type' => '2'),
  array('id' => '42','course' => 'MS','status' => '1','qual_type' => '2'),
  array('id' => '43','course' => 'MSW','status' => '1','qual_type' => '2'),
  array('id' => '44','course' => 'PG Diploma','status' => '1','qual_type' => '2'),
  array('id' => '45','course' => 'MVSc','status' => '1','qual_type' => '2'),
  array('id' => '46','course' => 'MPEd','status' => '1','qual_type' => '2'),
  array('id' => '47','course' => 'M.F.Sc(Fisheries)','status' => '1','qual_type' => '2'),
  array('id' => '48','course' => 'Other Post Graduate','status' => '1','qual_type' => '2'),
  array('id' => '49','course' => 'Certificate Course (ITI)','status' => '1','qual_type' => '3'),
  array('id' => '50','course' => 'Vocational Training','status' => '1','qual_type' => '3'),
  array('id' => '51','course' => '12th Pass (HSE)','status' => '1','qual_type' => '3'),
  array('id' => '52','course' => '10th Pass (SSC)','status' => '1','qual_type' => '3'),
  array('id' => '53','course' => 'Upto 9th Std','status' => '1','qual_type' => '3'),
  array('id' => '54','course' => 'No Education/Schooling','status' => '1','qual_type' => '3'),
  array('id' => '55','course' => 'Other Course','status' => '1','qual_type' => '3')
));
    }
}
