<?php

namespace App\Http\Controllers;

use App\State;
use App\Branch;
use App\University;
use App\Institution;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getStatesOption(Request $request){
        
        $states = State::whereCountryId($request->country_id)->get();

          
        //Get the states from country
        $option = "<option value=''>Select a state</option>";
        if ($states->count()){
            foreach ($states as $state){
                $option .= "<option value='{$state->id}'>{$state->state_name}</option>";
            }
        }

        return ['success' => true, 'state_options' => $option];
    }

    public function getQualificationOption(Request $request){
        
        $branchs = Branch::whereQualificationId($request->qualifications_id)->get();

        //Get the states from country
        $option = "<option value=''>Select a Branch</option>";
        if ($branchs->count()){
            foreach ($branchs as $branch){
                $option .= "<option value='{$branch->id}'>{$branch->branch_name}</option>";
            }
        }
        
        return ['success' => true, 'branch_options' => $option ];
    }

    public function getBranchsOption(Request $request){
       
        $branchs = Branch::whereQualificationId($request->qualifications_id)->get();

        //Get the states from country
        $option = "<option value=''>Select a Branch</option>";
        if ($branchs->count()){
            foreach ($branchs as $branch){
                $option .= "<option value='{$branch->id}'>{$branch->name}</option>";
            }
        }

        return ['success' => true, 'branch_options' => $option];
    }
    
    public function getInstitutionOption(Request $request){
        
        $institutions = Institution::whereStateId($request->state_id)->get();

        //Get the states from country
        $option = "<option value=''>Select a Institution</option>";
        if ($institutions->count()){
            foreach ($institutions as $institution){
                $option .= "<option value='{$institution->id}'>{$institution->name}</option>";
            }
        }

        return ['success' => true, 'institution_options' => $option];
    }
    

    public function getUniversityOption(Request $request){
        
        $universities = University::whereStateId($request->state_id)->get();

        //Get the states from country
        $option = "<option value=''>Select a Institution</option>";
        if ($universities->count()){
            foreach ($universities as $university){
                $option .= "<option value='{$university->id}'>{$university->name}</option>";
            }
        }

        return ['success' => true, 'university_options' => $option];
    }

    

}
