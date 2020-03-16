<?php

namespace App\Http\Controllers;

use App\EducationDetail;
use App\Country;
use App\Qualification;
use App\Institution;
use App\University;
use App\State;
use App\JobApplication;
use Illuminate\Http\Request;
use Auth;
use DB;

class EducationDetailsController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addOrUpdate(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $edu = EducationDetail::where('user_id', Auth::user()->id)->first();
        if(!empty($edu->id))
        {
            $education_detail = EducationDetail::findOrFail($edu->id);    
            $education_detail->update($input);
        }
        else{

        $educationDetail = EducationDetail::create($input);
        }

        return redirect()->route('education_edit')->with('success', 'Updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EducationDetail  $educationDetail
     * @return \Illuminate\Http\Response
     */
    public function show(EducationDetail $educationDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationDetail  $educationDetail
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
        $title = trans('app.profile_edit');
        $user = Auth::user();

        if (isset($id)){
            $user = User::find($id);
        }

        $educationDetail = EducationDetail::where('user_id',Auth::user()->id)->first();    

        
        $countries = Country::all();
        $states = State::select('id', 'state_name')->get('id', 'state_name');
        $qualifications = Qualification::where('status', 1)->get();
        $institutions = $universities = [];
        $view = 'education.create';
        if(isset($educationDetail->id))
        {

            $universities = University::where('state_id', $educationDetail->hq_university)->get();
            $institutions = Institution::where('state_id', $educationDetail->hq_state)->get();
            $view = 'education.edit';   

        }    

        $user_id = Auth::user()->id;
        $applied_jobs = DB::table('job_applications')
            ->select('*','job_applications.created_at as Applied_Date')
            ->leftJoin('users', 'job_applications.employer_id', '=', 'users.id')
            ->leftJoin('jobs', 'job_applications.job_id', '=', 'jobs.id')
            ->Where('job_applications.user_id', $user_id)
            ->get();

        $applied_job_count = $applied_jobs->count();

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

        return view('admin.'.$view, compact('title', 'user', 'countries', 'qualifications', 'states', 'educationDetail', 'institutions', 'universities','applied_job_count','name','email','phone','city','country_name','passedout','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationDetail  $educationDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationDetail $educationDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationDetail  $educationDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationDetail $educationDetail)
    {
        //
    }
}
