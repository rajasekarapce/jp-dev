<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        //'deleted_at',
       // 'email_verified_at',
    ];

    const PASSOUT_RADIO = [
        1 => 'JAN',
        2 => 'FEB',
        3 => 'MAR',
        4 => 'APR',
        5 => 'MAY',
        6 => 'JUN',
        7 => 'JUL',
        8 => 'AUG',
        9 => 'SEP',
        10 => 'OCT',
        11 => 'NOV',
        12 => 'DEC',
    ];

    const PREFERENCE_CHECKBOX = [
        1 => 'Full Time',
        2 => 'Part-Time',
        3 => 'Internship',
        4 => 'Apprenticeship',
    ];

    const SALARY_EXP_SELECT = [
        0 => 'ANY',
        1 => 'Above 0.6 Lakhs',
        2 => 'Above 1.2 Lakhs',
        3 => 'Above 1.8 Lakhs',
        4 => 'Above 2.4 Lakhs',
        5 => 'Above 3.0 Lakhs',
        6 => 'Above 4.0 Lakhs',
        7 => 'Above 5.0 Lakhs',
        8 => 'Above 6.0 Lakhs',
        9 => 'Above 7.0 Lakhs',
    ];

    const PREFERED_JOB_ROLE_SELECT = [
        1 => 'Accountant',
        2 => 'BPO / Telecaller',
        3 => 'Customer Service / Tech Support',
        4 => 'Engineer (Core, Non-IT)',
        5 => 'Sales / Marketing Executive',
        6 => 'IT - Mobile Developer',
        7 => 'IT Software-Engineer',
        8 => 'Management Trainee',
        9 => 'Mechanic / Fitter / Production',
        10 => 'Retail / Store Executive',
        11 => 'Architect',
        12 => 'Content Writer',
        13 => 'Data Entry /Back Office',
        14 => 'Doctor / Physician',
        15 => 'HR / Admin',
        16 => 'IT Hardware Engineer',
        17 => 'Design / Animation',
        18 => 'Pharmacist / Medical Rep',
        19 => 'Nurse / Healthcare',
        20 => 'Receptionist/Front Office',
        21 => 'SEO / Social Media',
        22 => 'Research/JRF/SRF',
        23 => 'Teacher / Trainer',
        24 => 'Steward / Hospitality',
        25 => 'Delivery Executive',
        26 => 'Chef / Cook',
        27 => 'Beautician / Spa',
        28 => 'Counsellor',
        29 => 'Fashion designer',
        30 => 'Media / Journalism / Events',
        31 => 'Others'
    ];

    const TRAINING_CATEGORY_CHECKBOX = [
        1   => 'Bank Exams / IBPS',
        2   => 'CA',
        3   => 'CAT / MAT',
        4   => 'Civil Services - IAS / IPS',
        5   => 'CSIR NET',
        6   => 'Defence / SSB',
        7   => 'GATE',
        8   => 'GMAT',
        9   => 'GRE',
        10  => 'IELTS',
        11  => 'IES',
        12  => 'PSU / Public Sector',
        13  => 'Railway Recruitment Board-RRB',
        14  => 'SSC CGL',
        15  => 'UPSC',
        16  => 'TOEFL',
        17  => 'Angular JS / Node JS',
        18  => 'Animation / Multimedia',
        19  => 'App Development (Android / iOS/ Windows)',
        20  => 'Big Data / Hadoop',
        21  => 'C / C++',
        22  => 'C#',
        23  => 'Networking / CCNA',
        24  => 'Cloud Computing',
        25  => 'Computer Hardware',
        26  => 'Data Analytics/Data Science/Machine Learning',
        27  => 'Data Warehousing',
        28  => 'Django',
        29  => 'Embedded Systems',
        30  => 'Ethical Hacking',
        31  => 'Java / J2EE',
        32  => 'Linux / Unix',
        33  => 'MongoDB',
        34  => 'MySQL / Database',
        35  => 'Oracle',
        36  => 'PHP',
        37  => 'PLC/Automation/SCADA',
        38  => 'Python',
        39  => 'Red Hat',
        40  => 'Ruby on Rails',
        41  => 'SAP/SAS/ERP',
        42  => 'Software Testing',
        43  => 'Solaris',
        44  => 'System Admin',
        45  => 'Web Designing',
        46  => 'PCB Design',
        47  => 'Mainframe',
        48  => '.Net',
        49  => 'IOT',
        50  => 'VLSI',
        51  => 'DevOps',
        52  => 'UI/UX Designing',
        53  => 'Accounting &amp; Finance',
        54  => 'Autocad / CAD',
        55  => 'Aviation &amp; Airhostess/Hospitality',
        56  => 'BPO - Call centre',
        57  => 'Business Analyst',
        58  => 'Digital Marketing',
        59  => 'HR / Admin',
        60  => 'Industrial Training',
        61  => 'Interior Designing',
        62  => 'Microsoft Office',
        63  => 'Ship Building / Marine Engg.',
        64  => 'Soft Skills /Personality Development',
        65  => 'Spoken English',
        66  => 'Tally',
        67  => 'Teacher Training',
        68  => 'Technical /Content Writing',
        69  => 'Fashion Designing',
        70  => 'Graphic Design',
        71  => 'Six sigma green and black belt',
        72  => 'LLM',
        73  => 'MBA/PGDM',
        74  => 'M.Arch',
        75  => 'M.Com',
        76  => 'M.E/M.Tech',
        77  => 'MA',
        78  => 'MCA',
        79  => 'MDS',
        80  => 'MEd',
        81  => 'MPhil',
        82  => 'MSc',
        83  => 'Distance MBA',
        84  => 'Study - Australia',
        85  => 'Study - Canada',
        86  => 'Study - China',
        87  => 'Study - France',
        88  => 'Study - Georgia',
        89  => 'Study - Germany',
        90  => 'Study - Ireland',
        91  => 'Study - Italy',
        92  => 'Study - Netherlands',
        93  => 'Study - New Zealand',
        94  => 'Study - Russia',
        95  => 'Study - Singapore',
        96  => 'Study - Sweden',
        97  => 'Study - UK',
        98  => 'Study - USA',
    ];
    const COURSE_TYPE_RADIO = [
        1 => 'Classroom',
        2 => 'Online',
        3 => 'Both',
    ];

    const ASPIRANTS_RADIO = [
        1 => 'Only Government Jobs',
        2 => 'Only Private Jobs',
        3 => 'Both',
    ];    

    public function education_detail(){
        return $this->hasOne(EducationDetail::class, 'user_id');
    }     
    public function jobs(){
        return $this->hasMany(Job::class)->orderBy('id', 'desc');
    }
    public function is_user(){
        return $this->user_type === 'user';
    }
    public function is_admin(){
        return $this->user_type === 'admin';
    }
    public function is_employer(){
        return $this->user_type === 'employer';
    }
    public function is_agent(){
        return $this->user_type === 'agent';
    }

    public function scopeEmployer($query){
        return $query->whereUserType('employer');
    }
    public function scopeAgent($query){
        return $query->whereUserType('agent');
    }
    public function isEmployerFollowed($employer_id = null){
        if ( ! $employer_id || ! Auth::check()){
            return false;
        }

        $user = Auth::user();
        $isFollowed = UserFollowingEmployer::whereUserId($user->id)->whereEmployerId($employer_id)->first();

        if($isFollowed){
            return true;
        }
        return false;
    }

    public function getFollowersAttribute(){
        $followersCount = UserFollowingEmployer::whereEmployerId($this->id)->count();
        if ($followersCount){
            return number_format($followersCount);
        }
        return 0;
    }

    public function getFollowableAttribute(){
        if ( ! Auth::check()){
            return true;
        }

        $user = Auth::user();
        return $this->id !== $user->id;
    }

    public function getLogoUrlAttribute(){
        if ($this->logo){
            return asset('storage/uploads/images/logos/'.$this->logo);
        }
        return asset('assets/images/company.png');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function getPremiumJobsBalanceAttribute($value){
        return $value;
    }

    public function checkJobBalace(){
        $totalPremiumJobsPaid = $this->payments()->success()->sum('premium_job');
        $totalPosted = $this->jobs()->whereIsPremium(1)->count();
        $balance = $totalPremiumJobsPaid - $totalPosted;

        $this->premium_jobs_balance = $balance;
        $this->save();
    }

    public function signed_up_datetime(){
        $created_date_time = $this->created_at->timezone(get_option('default_timezone'))->format(get_option('date_format_custom').' '.get_option('time_format_custom'));
        return $created_date_time;
    }
    public function status_context(){
        $status = $this->active_status;

        $context = '';
        switch ($status){
            case '0':
                $context = 'Pending';
                break;
            case '1':
                $context = 'Active';
                break;
            case '2':
                $context = 'Block';
                break;
        }
        return $context;
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill', 'skill_user', 'user_id', 'skill_id')->withTimestamps();
    }

    public function settings()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by']);
    }
    public function savedjobs()
    {
        return $this->belongsToMany('App\Job', 'job_user', 'user_id', 'job_id');
    }
    public function workpreference()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'WorkPreference');
    }
    public function minsalexpperyear()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'MinSalExpPerYear');
    }

    public function preferredjobrole1()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'PreferredJobRole1');
    }
    public function preferredjobrole2()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'PreferredJobRole2');
    }
    public function preferredjobrole3()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'PreferredJobRole3');
    }
    public function trainingstudycat()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'TrainingStudyCat');
    }
    public function coursetype()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'CourseType');
    }
    public function queryexpectation()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'QueryExpectation');
    }

    public function aspirants()
    {
        return $this->belongsToMany('App\Setting', 'setting_user', 'user_id', 'setting_id')->withPivot(['value', 'created_by'])->where('name', 'Aspirants');
    }

    public static function profileCompleteness()
    {

        $profile_completeness = 0;
        $academic = \App\AcademicProject::where('user_id', Auth::user()->id)->count();
        if($academic > 0)
            $profile_completeness = $profile_completeness + 33;
        $edudetail = \App\EducationDetail::where('user_id', Auth::user()->id)->count();
        if($edudetail > 0)
            $profile_completeness = $profile_completeness + 33;
        $careerdetail = \App\CareerDetail::where('user_id', Auth::user()->id)->count();
        if($careerdetail > 0)
            $profile_completeness = $profile_completeness + 34;
        return $profile_completeness;
    }    

}
