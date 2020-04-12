<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class PreferenceController extends Controller
{
    public function createOrEdit()
    {
        $title = trans('app.profile_edit');
        $user = Auth::user();
        if(isset($user))
        $user_data = \App\User::with(['workpreference', 'minsalexpperyear', 'preferredjobrole1', 'preferredjobrole2', 'preferredjobrole3', 'trainingstudycat', 'coursetype', 'queryexpectation', 'aspirants'])->find($user->id);
        
        $applied_jobs = DB::table('job_applications')
            ->select('*','job_applications.created_at as Applied_Date')
            ->leftJoin('users', 'job_applications.employer_id', '=', 'users.id')
            ->leftJoin('jobs', 'job_applications.job_id', '=', 'jobs.id')
            ->Where('job_applications.user_id', $user->id)
            ->get();

        $applied_job_count = $applied_jobs->count();
        
        return view('admin.preferences.edit', compact('title', 'user', 'reg_id', 'applied_job_count' , 'user_data'));
    }
    public function addOrUpdate(Request $request)
    {
    	$title = trans('app.profile_edit');
        $user = Auth::user();
        
        if (isset($id)){
            $user = User::find($id);
        }
        $settings = $request->post('settings');
        
        if (! empty($settings)) { 
        	$data =	 array();
            foreach ($settings as $key => $value) {
            	# code...

            	if(is_array($value))
            	{
            		$value = json_encode($value, true);
            	}
            	$setting = \App\Setting::findOrfail($key);
            	$data[$key] = ['created_by'=> Auth::user()->id, 'value' => $value];
            }
             $user->settings()->sync($data);  //If one or more skill is selected associate institution to skills          
        }       

        $applied_jobs = DB::table('job_applications')
            ->select('*','job_applications.created_at as Applied_Date')
            ->leftJoin('users', 'job_applications.employer_id', '=', 'users.id')
            ->leftJoin('jobs', 'job_applications.job_id', '=', 'jobs.id')
            ->Where('job_applications.user_id', $user->id)
            ->get();

        $applied_job_count = $applied_jobs->count();

        if(isset($user))
        $user_data = \App\User::with(['workpreference', 'minsalexpperyear', 'preferredjobrole1', 'preferredjobrole2', 'preferredjobrole3', 'trainingstudycat', 'coursetype', 'queryexpectation', 'aspirants'])->find($user->id);

        return back()->with('success', trans('app.preference_updated'));
    }
}
