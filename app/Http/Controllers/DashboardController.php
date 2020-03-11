<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function dashboard(){

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

        $latest_jobs = DB::table('jobs')
            //->select('*','job_applications.created_at as Applied_Date')
            ->leftJoin('qualifications', 'jobs.qualification', '=', 'qualifications.id')
            ->leftJoin('users', 'jobs.user_id', '=', 'users.id')
            //->Where('job_applications.user_id', $user_id)
            ->orderBy('jobs.id', 'desc')
            ->get();

            
            // 
              
             

        return view('admin.dashboard', $latest_jobs ,$data );
    }
}
