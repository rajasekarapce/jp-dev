<?php

namespace App\Http\Controllers;

use App\CareerDetail;
use App\ComptetiveExam;
use App\AcademicProject;
use App\Certification;
use App\Skill;
use Illuminate\Http\Request;
use Auth;
use DB;

class CareerDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        $academic_projs = $request->academic_proj;
        $compexamps = $request->compexamp;
        $certifs = $request->certif;
        $skills = $request->skills;
        $input = $request->except(['academic_proj', 'skills']);
        $i= $j = 1;
        $academic_projects = $compexams = $certifications =  [];
        DB::table('academic_projects')->where('user_id', Auth::user()->id)->delete();
        DB::table('comptetive_exams')->where('user_id', Auth::user()->id)->delete();
        DB::table('certifications')->where('user_id', Auth::user()->id)->delete();
        foreach ($academic_projs as $key => $value) {
            $academic_projects[] = ['user_id' => Auth::user()->id,'academic_projtype' => $value['academic_projtype'], 'academic_projname' => $value['academic_projname'], 'academic_projdesc' => $value['academic_projdesc'], 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()];
            $i++;
        }
        if(!empty($academic_projects))
        DB::table('academic_projects')->insert($academic_projects);
        $insertce = true;
        if(!empty($compexamps))
        {

	        foreach ($compexamps as $key => $value) {
                if($value['competitive_exam']=='')
                {
                    $insertce = false;
                }    
	            $compexams[] = ['user_id' => Auth::user()->id,'competitive_exam' => $value['competitive_exam'], 'score_type' => $value['score_type'], 'score' => $value['score'], 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()];
	        }
        }

        $insertcert = false;
        if(!empty($certifs))
        {

	        foreach ($certifs as $key => $value) {
                if($value['certification']=='')
                {
                    $insertcert = false;
                }
	            $certifications[] = ['user_id' => Auth::user()->id,'certification' => $value['certification'], 'cert_passmonth' => $value['cert_passmonth'], 'cert_passyr' => $value['cert_passyr'], 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()];
	        }
        }

        if(!empty($compexams) && $insertce==true)
        DB::table('comptetive_exams')->insert($compexams);

        if(!empty($certifications) && $insertcert==true)
        DB::table('certifications')->insert($certifications);
        if(isset($input['other_languages']))
        $input['other_languages'] = json_encode($input['other_languages']);
        $input['user_id'] = Auth::user()->id;
        $careerdet = CareerDetail::where('user_id', Auth::user()->id)->first();
        if(!empty($careerdet->id))
        {
            $career_detail = CareerDetail::findOrFail($careerdet->id);    
            $career_detail->update($input);
            $view = 'career.create';
        }
        else{
        CareerDetail::create($input);   
        }
        Auth::User()->skills()->sync($skills, true);

        return redirect()->route('career_edit')->with('success', 'Updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CareerDetail  $careerDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CareerDetail $careerDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CareerDetail  $careerDetail
     * @return \Illuminate\Http\Response
     */
    public function createOrEdit()
    {
        $title = trans('app.profile_edit');
        $user = Auth::user();

        if (isset($id)){
            $user = User::find($id);
        }
        $user_skills = array_column(Auth::User()->skills->toArray(),'id');
        $careerDetail = CareerDetail::where('user_id',Auth::user()->id)->first();
        $academic_projects = AcademicProject::where('user_id',Auth::user()->id)->get();
        $competitive_exams = ComptetiveExam::where('user_id',Auth::user()->id)->get();
        $certifications = Certification::where('user_id',Auth::user()->id)->get();    
        $view  = 'career.create';
        $skills = Skill::get();
         if(!empty($careerDetail->id))
        {
            $view  = 'career.edit';
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
        $reg_id = $users[0]->reg_id;


        return view('admin.'.$view, compact('title', 'user', 'careerDetail', 'skills', 'user_skills', 'academic_projects', 'competitive_exams', 'certifications','applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CareerDetail  $careerDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CareerDetail $careerDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CareerDetail  $careerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerDetail $careerDetail)
    {
        //
    }
}
