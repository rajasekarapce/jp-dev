<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use App\Payment;
use App\User;
use App\FlagJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $applied_jobs = array();
        $data = [
            'usersCount' => User::count(),
            'totalPayments' => Payment::success()->sum('amount'),
            'activeJobs' => Job::active()->count(),
            'totalJobs' => Job::count(),
            'employerCount' => User::employer()->count(),
            'agentCount' => User::agent()->count(),
            'totalApplicants' => JobApplication::count(),

        ];

        // $applications = JobApplication::whereUserId($user_id)->orderBy('id', 'desc')->paginate(20);


        $user_id = Auth::user()->id; 

        $users = DB::table('users')
            ->select('*')
            ->leftJoin('education_details', 'users.id', '=', 'education_details.user_id')
            ->leftJoin('qualifications', 'education_details.hq_qualid', '=', 'qualifications.id')
            ->Where('users.id', $user_id)
            ->get();
    
            $name = $users[0]->name;
            $email = $users[0]->email;
            $phone = $users[0]->phone;
            $city = $users[0]->city;
            $country = $users[0]->country_name;
            $passedout = $users[0]->hq_passyear;
            $course = $users[0]->course;    
           
            $applied_jobs = DB::table('job_applications')
            ->select('*','job_applications.created_at as Applied_Date')
            ->leftJoin('users', 'job_applications.employer_id', '=', 'users.id')
            ->leftJoin('jobs', 'job_applications.job_id', '=', 'jobs.id')
            ->Where('job_applications.user_id', $user_id)
            ->get();

        $applied_job_count = $applied_jobs->count();
        

        if(Auth::user()->user_type == 'employer') {
            $skills = $request->get('skills');
            $latest_jobs = array();
            if($skills){
                $user_ids = DB::table('skills')
                    ->join('skill_user', 'skill_user.skill_id', '=', 'skills.id')
                    ->Where('skills.name', 'like', '%'.$skills.'%')
                    ->select('skill_user.user_id')
                    ->get();
                    $userId = array();
                    foreach($user_ids as $uid) {
                        $userId[] = $uid->user_id;
                    }
                if(count($userId)){
                    $userId = array_unique($userId);
                    $latest_jobs = User::where('user_type', 'user')
                        ->WhereIn('id', $userId)
                        ->select('id','name','email','phone','updated_at')
                        ->orderBy('id', 'desc')
                        ->get();
                }
                
            }
            
//return view('admin.dashboard', compact('latest_jobs','data','course') );
        } else {
            $latest_jobs = DB::table('jobs')
                //->select('*','job_applications.created_at as Applied_Date')
                ->leftJoin('qualifications', 'jobs.qualification', '=', 'qualifications.id')
                ->leftJoin('users', 'jobs.user_id', '=', 'users.id')
                //->Where('job_applications.user_id', $user_id)
                ->orderBy('jobs.id', 'desc')
                ->paginate(10);

                $latest_jobs = DB::table('jobs')
                ->select('*','jobs.id as job_id')
                ->leftJoin('qualifications', 'jobs.qualification', '=', 'qualifications.id')
                ->leftJoin('users', 'jobs.user_id', '=', 'users.id')
                //->leftJoin('job_applications', 'jobs.id', '=', 'job_applications.job_id')
                
                //->Where('job_applications.user_id', $user_id)
                ->orderBy('jobs.id', 'desc')
                ->paginate(10);
                // 
            // echo "<pre>";
            // print_r($latest_jobs);
            // exit;
    
           
    
           // return view('admin.dashboard', compact('latest_jobs','data','applied_job_count','user_id','name','email','phone','city','country_name','passedout','course') );  
          
        }

        return view('admin.dashboard', compact('latest_jobs','data','applied_job_count','user_id','name','email','phone','city','country_name','passedout','course') );

    }
}
