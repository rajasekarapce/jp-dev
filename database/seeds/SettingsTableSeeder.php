<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(
			[
        		'name' => 'WorkPreference',
        		'description' => 'Full Time, Part-Time, Internship, Apprenticeship',
        		'type' => 'user',
                'created_by' => 1,
   			 ]);
        Setting::create(
   			[
        		'name' => 'MinSalExpPerYear',
        		'description' => 'Minimum salary Expected (per Year)',
        		'type' => 'user',
                'created_by' => 1,
   			]);
        Setting::create([
        		'name' => 'PreferredJobRole1',
        		'description' => 'Choose your Job Preferences carefully. You will get Interview opportunities based on your Job Role Preferences.',
        		'type' => 'user',
                'created_by' => 1, 
   			]);
        Setting::create([
                'name' => 'PreferredJobRole2',
                'description' => 'Choose your Job Preferences carefully. You will get Interview opportunities based on your Job Role Preferences.',
                'type' => 'user',
                'created_by' => 1, 
            ]);
        Setting::create([
                'name' => 'PreferredJobRole3',
                'description' => 'Choose your Job Preferences carefully. You will get Interview opportunities based on your Job Role Preferences.',
                'type' => 'user',
                'created_by' => 1, 
            ]);
        Setting::create([
                'name' => 'TrainingStudyCat',
                'description' => 'Choose your Training / Study category',
                'type' => 'user',
                'created_by' => 1, 
            ]);
        Setting::create([
                'name' => 'CourseType',
                'description' => 'Classroom, Online, Both',
                'type' => 'user',
                'created_by' => 1,
            ]);
        Setting::create([
                'name' => 'QueryExpectation',
                'description' => 'Your Queries or Expectation',
                'type' => 'user',
                'created_by' => 1,
            ]);
        Setting::create([
                'name' => 'Aspirants',
                'description' => 'Only Government Jobs, Only Private Jobs, Both',
                'type' => 'user',
                'created_by' => 1,
            ]);        
    }
}
