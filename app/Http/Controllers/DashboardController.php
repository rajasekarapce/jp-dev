<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request){

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
        } else {
            $latest_jobs = DB::table('jobs')
                //->select('*','job_applications.created_at as Applied_Date')
                ->leftJoin('qualifications', 'jobs.qualification', '=', 'qualifications.id')
                ->leftJoin('users', 'jobs.user_id', '=', 'users.id')
                //->Where('job_applications.user_id', $user_id)
                ->orderBy('jobs.id', 'desc')
                ->paginate(10);
        }
        return view('admin.dashboard', compact('latest_jobs','data') );
    }
}
