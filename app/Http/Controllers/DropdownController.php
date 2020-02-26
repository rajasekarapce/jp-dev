<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class DropdownController extends Controller
{
    
        public function getInstituteList(Request $request)
        {
            
            if(Input::get('id') !='')
            {
              $institutions = DB::table("institutions")
            ->where([["state_id",$request->input('id')],['status', 1]])->get();
            return response()->json($institutions);  
            }
            return [];
            
        }

        public function getUniversitiesList(Request $request)
        {
            
            if(Input::get('id') !='')
            {
              $universities = DB::table("universities")
            ->where([["state_id",$request->input('id')],['status', 1]])->get();
            return response()->json($universities);  
            }
            return [];
            
        }        
}
