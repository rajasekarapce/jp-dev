<?php

namespace App\Http\Controllers;

use App\Country;
use App\Designation;
use App\Skill;
use App\Qualification;
use App\JobApplication;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;

class UserController extends Controller
{

    public function index()
    {

        $title = trans('app.users');
        $current_user = Auth::user();
        $users = User::where('id', '!=', $current_user->id)->orderBy('name', 'asc')->paginate(20);
        return view('admin.users', compact('title', 'users'));
        
    }


    public function show($id = 0){
        if ($id){
            $title = trans('app.profile');
            $user = User::find($id);

            $is_user_id_view = true;
            return view('admin.profile', compact('title', 'user', 'is_user_id_view'));
        }
    }

    /**
     * @param $id
     * @param null $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function statusChange($id, $status = null){
        if(config('app.is_demo')){
            return redirect()->back()->with('error', 'This feature has been disable for demo');
        }

        $user = User::find($id);
        if ($user && $status){
            if ($status == 'approve'){
                $user->active_status = 1;
                $user->save();

            }elseif($status == 'block'){
                $user->active_status = 2;
                $user->save();
            }
        }
        return back()->with('success', trans('app.status_updated'));
    }
    public function savedJobs(){
     $title = __('app.applicant');
     $user_id = Auth::user()->id;
        $applications = JobApplication::whereUserId($user_id)->orderBy('id', 'desc')->paginate(20);

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

     return view('admin.saved_jobs', compact('title', 'applications', 'applied_jobs' ,'applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id'));       
    }

    public function appliedJobs(){
        $title = __('app.applicant');
        $user_id = Auth::user()->id;
        $applications = JobApplication::whereUserId($user_id)->orderBy('id', 'desc')->paginate(20);

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

        // echo "<pre>";
        // print_r($applied_job_count);
        // exit;
        return view('admin.applied_jobs', compact('title', 'applications', 'applied_jobs' ,'applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id'));
    }

    public function registerJobSeeker(){
        $title = __('app.register_job_seeker');
        $countries = Country::all();
        $qualifications = Qualification::all();
        //$states = state::all();
        $states1 = state::all();
        $old_country = false;
        if (old('country')){
            $old_country = Country::find(old('country'));
        }
        $skills = Skill::get();
        return view('register-job-seeker', compact('title', 'countries', 'old_country','states','states1','qualifications', 'skills'));
        // return view('register-job-seeker', compact('title', 'countries', 'old_country'));
    }

    public function registerJobSeekerPost(Request $request){
        
        $rules = [
            'name'      => ['required', 'string', 'max:190'],
            'email'     => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
            'phone'     => 'required',
            'country'   => 'required',
            'state'     => 'required',
        ];

        $random_number = $this->get_random_number();
        $this->validate($request, $rules);

        $data = $request->input();
        $country = Country::find($request->country);
        $state_name = null;
        if ($request->state){
            $state = State::find($request->state);
            $state_name = $state->state_name;
        }

        // $image = $request->file('logo');
        // $image_name = $image->getClientOriginalName();
        // $logoPath = 'uploads/images/logos/'.$image_name;
        // Storage::disk('public')->put($logoPath, $image);

        if ($request->hasFile('resume')){
            $image = $request->file('resume');

            $valid_extensions = ['pdf','docx','doc'];
            if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
                return redirect()->back()->withInput($request->input())->with('error', 'Only .pdf, .docx and .doc is allowed extension') ;
            }
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            //$resized_thumb = Image::make($image)->resize(256, 256)->stream();

            $resume = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $resumePath = 'uploads/resume/'.$resume;

            move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath);
                $data['resume'] = $resume;

            
        }
        // echo "<pre>";
        // print_r($data);
        // echo $random_number;
        // exit;
       
        $create = User::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'reg_id'        => $random_number,
            'resume'        => $data['resume'],
            'user_type'     => 'user',
            'phone'     => $data['phone'],
            'country_id'     => $data['country'],
            'state_id'     => $data['state'],
            'city'     => $data['city'],
            //'logo'     => $image_name,
            'country_name'  => $country->country_name,
            'state_name'  => $state_name,
            'password'      => Hash::make($data['password']),
            'active_status' => 1,
        ]);

        $user_id = $create->id;
        $skills = $request->skills;
        $user = User::findOrFail($user_id);
        $user->skills()->sync($skills, true);
        DB::table('education_details')->insert(
            ['hq_qualid' => $data['qualification'] ,
            /*'branch' => $data['branch'] ,*/
            'hq_passyear' => $data['passed_out'] ,
            'hq_passmonth' => $data['hq_passmonth'] ,
            'hq_marktype' => $data['percent_or_cgpa'] ,
            'hq_mark' => $data['percentage'] ,
            'hq_state' => $data['college_location'] ,
            'hq_institute' => $data['institute'] ,
            'hq_university' => $data['university'] ,
            'user_id' =>    $user_id ,
            'xii_passmonth' => '0',
            'xii_passyear' => '0',
            'xii_marktype' => '0',
            'xii_mark' => '0',
            'xii_school' => '0',
            'xii_board' => '0',
            'x_passmonth' => '0',
            'x_passyear' => '0',
            'x_marktype' => '0',
            'x_mark' => '0',
            'x_school' => '0',
            'x_board' => '0',
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s')   ]
        );
        
        
        // $create = Qualification::create([
        //     'qualification'  => $data['qualification'],
        //     'branch'         => $data['branch'],
        //     //'user_type'     => 'user',
        //     'passed_out'     => $data['passed_out'],
        //     'percentage'     => $data['percentage'],
        //     'college_location' => $data['college_location'],
        //     'institute'     => $data['institute'],
        //     'university'     => $data['university'],
        //     //'country_name'  => $country->country_name,
        //     'state_name'  => $state_name,
        //     'password'      => Hash::make($data['password']),
        //     'active_status' => 1,
        // ]);

        
        //echo $create->id;
        //exit;

        return redirect(route('login'))->with('success', __('app.registration_successful'));
    }

    function get_random_number($length=0)
    {
        if(!$length){
            $length = 5;
        }
        $alphabet    = '1234567890';
        $pass        = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $n      = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }


    public function registerEmployer(){
        $title = __('app.employer_register');
        $countries = Country::all();
        $designations = Designation::all();
        $old_country = false;
        if (old('country')){
            $old_country = Country::find(old('country'));
        }
      
        return view('employer-register', compact('title', 'countries', 'old_country','designations'));
    }

    public function registerEmployerPost(Request $request){

        
        $rules = [
            'name'      => ['required', 'string', 'max:190'],
            'company'   => 'required',
            'email'     => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
            'phone'     => 'required',
            'address'   => 'required',
            'country'   => 'required',
            'state'     => 'required',
            'account_type_id'     => 'required',
            'designation_id'     => 'required',
            'no_of_employee'     => 'required', 
        ];

        $random_number = $this->get_random_number();
        $this->validate($request, $rules);

        //echo "1238";
        //exit;
        $company = $request->company;
        $company_slug = unique_slug($company, 'User', 'company_slug');

        $country = Country::find($request->country);
        $state_name = null;
        if ($request->state){
            $state = State::find($request->state);
            $state_name = $state->state_name;
        }

        $create =  User::create([
            'name'          => $request->name,
            'company'       => $company,
            'reg_id'        => $random_number,
            'company_slug'  => $company_slug,
            'email'         => $request->email,
            'user_type'     => 'employer',
            'password'      => Hash::make($request->password),
            'phone'         => $request->phone,
            'address'       => $request->address,
            'address_2'     => $request->address_2,
            'country_id'    => $request->country,
            'country_name'  => $country->country_name,
            'state_id'      => $request->state,
            'state_name'    => $state_name,
            'resume'        => '0',
            'city'          => $request->city,
            'active_status' => 1,
            
        ]);

         $user_id = $create->id;

        DB::table('employer')->insert(
            ['account_type_id' => $request['account_type_id'] ,
            'designation_id' => $request['designation_id'] ,
            'no_of_employee' => $request['no_of_employee'] ,
            'requirement' => $request['requirement'] ,
            'user_id' =>    $user_id ,
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s')   ]
        );

        return redirect(route('login'))->with('success', __('app.registration_successful'));
    }


    public function registerAgent(){
        $title = __('app.agent_register');
        $countries = Country::all();
        $old_country = false;
        if (old('country')){
            $old_country = Country::find(old('country'));
        }
        return view('agent-register', compact('title', 'countries', 'old_country'));
    }

    public function registerAgentPost(Request $request){
        $rules = [
            'name'      => ['required', 'string', 'max:190'],
            'company'   => 'required',
            'email'     => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
            'phone'     => 'required',
            'address'   => 'required',
            'country'   => 'required',
            'state'     => 'required',
        ];
        $this->validate($request, $rules);

        $company = $request->company;
        $company_slug = unique_slug($company, 'User', 'company_slug');

        $country = Country::find($request->country);
        $state_name = null;
        if ($request->state){
            $state = State::find($request->state);
            $state_name = $state->state_name;
        }

        User::create([
            'name'          => $request->name,
            'company'       => $company,
            'company_slug'  => $company_slug,
            'email'         => $request->email,
            'user_type'     => 'agent',
            'password'      => Hash::make($request->password),

            'phone'         => $request->phone,
            'address'       => $request->address,
            'address_2'     => $request->address_2,
            'country_id'    => $request->country,
            'country_name'  => $country->country_name,
            'state_id'      => $request->state,
            'state_name'    => $state_name,
            'city'          => $request->city,
            'active_status' => 1,
        ]);

        return redirect(route('login'))->with('success', __('app.registration_successful'));
    }


    public function employerProfile(){
        $title = __('app.employer_profile');
        $user = Auth::user();


        $countries = Country::all();
        $old_country = false;
        if ($user->country_id){
            $old_country = Country::find($user->country_id);
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
    $logo = $users[0]->logo;

        return view('admin.employer-profile', compact('title', 'user', 'countries', 'old_country','applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id','logo'));
    }

    public function employerProfilePost(Request $request){
        $user = Auth::user();

        $rules = [
            'company_size'   => 'required',
            'phone'     => 'required',
            'address'   => 'required',
            'country'   => 'required',
            'state'     => 'required',
        ];

        $this->validate($request, $rules);


        $logo = null;
        if ($request->hasFile('logo')){
            $image = $request->file('logo');

            $valid_extensions = ['jpg','jpeg','png'];
            if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
                return redirect()->back()->withInput($request->input())->with('error', 'Only .jpg, .jpeg and .png is allowed extension') ;
            }
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            $resized_thumb = Image::make($image)->resize(256, 256)->stream();

            $logo = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $logoPath = 'uploads/logos/'.$logo;

            try{
                move_uploaded_file($_FILES["logo"]["tmp_name"], $logoPath);
            } catch (\Exception $e){
                return redirect()->back()->withInput($request->input())->with('error', $e->getMessage()) ;
            }
        }

        $country = Country::find($request->country);
        $state_name = null;
        if ($request->state){
            $state = State::find($request->state);
            $state_name = $state->state_name;
        }

        $data = [
            'company_size'  => $request->company_size,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'address_2'     => $request->address_2,
            'country_id'    => $request->country,
            'country_name'  => $country->country_name,
            'state_id'      => $request->state,
            'state_name'    => $state_name,
            'city'          => $request->city,
            'about_company' => $request->about_company,
            'website'       => $request->website,
        ];

        if ($logo){
            $data['logo'] = $logo;
        }

        $user->update($data);

        return back()->with('success', __('app.updated'));
    }

    public function upload_resume()
    {
        $user = Auth::user();
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
        $logo = $users[0]->logo;
        $resume = $users[0]->resume;


        return view('admin.upload_resume', compact('user','applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id','logo','resume'));
    }


    public function upload_resume_post($id=null, Request $request)
    {
        
        if(config('app.is_demo')){
            return redirect()->back()->with('error', 'This feature has been disable for demo');
        }

        $user = Auth::user();
        if ($id){
            $user = User::find($id);
        }
        //Validating
        // $rules = [
        //     'email'    => 'required|email|unique:users,email,'.$user->id,
        // ];
        // $this->validate($request, $rules);

        $inputs = array_except($request->input(), ['_token', 'photo']);
        $user->update($inputs);

        $logo = null;
        if ($request->hasFile('resume')){
            $image = $request->file('resume');

            $valid_extensions = ['pdf','docx','doc'];
            if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
                return redirect()->back()->withInput($request->input())->with('error', 'Only .pdf, .docx and .doc is allowed extension') ;
            }
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            //$resized_thumb = Image::make($image)->resize(256, 256)->stream();

            $resume = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $resumePath = 'uploads/resume/'.$resume;

            try{
                move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath);
                $data['resume'] = $resume;
                $user->update($data);
            } catch (\Exception $e){
                return redirect()->back()->withInput($request->input())->with('error', $e->getMessage()) ;
            }
        }

        return back()->with('success', trans('app.resume_success_msg'));

    }




    public function employerApplicant(){
        $title = __('app.applicant');
        $employer_id = Auth::user()->id;
        $applications = JobApplication::whereEmployerId($employer_id)->orderBy('id', 'desc')->paginate(20);

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
       
        // echo "<pre>";
        // print_r($users);
        // exit;
       
        $name = $users[0]->name;
        $email = $users[0]->email;
        $phone = $users[0]->phone;
        $city = $users[0]->city;
        $country = $users[0]->country_name;
        $passedout = $users[0]->hq_passyear;
        $course = $users[0]->course;
        $reg_id = $users[0]->reg_id;

        return view('admin.applicants', compact('title', 'applications','applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id'));
    }

    public function makeShortList($application_id){
        $applicant = JobApplication::find($application_id);
        $applicant->is_shortlisted = 1;
        $applicant->save();
        return back()->with('success', __('app.success'));
    }

    public function shortlistedApplicant(){
        $title = __('app.shortlisted');
        $employer_id = Auth::user()->id;
        $applications = JobApplication::whereEmployerId($employer_id)->whereIsShortlisted(1)->orderBy('id', 'desc')->paginate(20);

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

// echo "<pre>";
// print_r($users);
// exit;

        $name = $users[0]->name;
        $email = $users[0]->email;
        $phone = $users[0]->phone;
        $city = $users[0]->city;
        $country = $users[0]->country_name;
        $passedout = $users[0]->hq_passyear;
        $course = $users[0]->course;
        $reg_id = $users[0]->reg_id;

        return view('admin.applicants', compact('title', 'applications','applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id'));
    }


    public function profile(){

        $title = trans('app.profile');
        $user = Auth::user();
        return view('admin.profile', compact('title', 'user'));
    }

    public function profileEdit($id = null){
        $title = trans('app.profile_edit');
        $user = Auth::user();

        if ($id){
            $user = User::find($id);
        }

        $countries = Country::all();

        $qualifications = Qualification::all();

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
        $logo = $users[0]->logo;

        return view('admin.profile_edit', compact('title', 'user', 'countries', 'qualifications','applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id','logo'));
    }

    public function educationEdit($id = null){
        $title = trans('app.profile_edit');
        $user = Auth::user();

        if ($id){
            $user = User::find($id);
        }

        $countries = Country::all();

        $qualifications = Qualification::where('status', 1)->get();
        $states = State::all();

        return view('admin.education_edit', compact('title', 'user', 'countries', 'qualifications', 'states'));
    }

    public function profileEditPost($id = null, Request $request){
        if(config('app.is_demo')){
            return redirect()->back()->with('error', 'This feature has been disable for demo');
        }

        $user = Auth::user();
        if ($id){
            $user = User::find($id);
        }
        //Validating
        $rules = [
            'email'    => 'required|email|unique:users,email,'.$user->id,
        ];
        $this->validate($request, $rules);

        $inputs = array_except($request->input(), ['_token', 'photo']);
        $user->update($inputs);

        $logo = null;
        if ($request->hasFile('logo')){
            $image = $request->file('logo');

            $valid_extensions = ['jpg','jpeg','png'];
            if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
                return redirect()->back()->withInput($request->input())->with('error', 'Only .jpg, .jpeg and .png is allowed extension') ;
            }
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            $resized_thumb = Image::make($image)->resize(256, 256)->stream();

            $logo = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $logoPath = 'uploads/logos/'.$logo;

            try{
                move_uploaded_file($_FILES["logo"]["tmp_name"], $logoPath);
                $data['logo'] = $logo;
                $user->update($data);
            } catch (\Exception $e){
                return redirect()->back()->withInput($request->input())->with('error', $e->getMessage()) ;
            }
        }



        return back()->with('success', trans('app.profile_edit_success_msg'));
    }


    public function changePassword()
    {
        $title = trans('app.change_password');

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

        return view('admin.change_password', compact('title','applied_job_count','name','email','phone','city','country_name','passedout','course','reg_id'));
    }

    public function changePasswordPost(Request $request)
    {
        if(config('app.is_demo')){
            return redirect()->back()->with('error', 'This feature has been disable for demo');
        }
        $rules = [
            'old_password'  => 'required',
            'new_password'  => 'required|confirmed',
            'new_password_confirmation'  => 'required',
        ];
        $this->validate($request, $rules);

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        //$new_password_confirmation = $request->new_password_confirmation;

        if(Auth::check())
        {
            $logged_user = Auth::user();

            if(Hash::check($old_password, $logged_user->password))
            {
                $logged_user->password = Hash::make($new_password);
                $logged_user->save();
                return redirect()->back()->with('success', trans('app.password_changed_msg'));
            }
            return redirect()->back()->with('error', trans('app.wrong_old_password'));
        }
    }


    public function edit_edu_profile()
    {
        echo "123456";
        exit;
    }

}
