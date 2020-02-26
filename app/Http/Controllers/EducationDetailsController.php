<?php

namespace App\Http\Controllers;

use App\EducationDetail;
use App\Country;
use App\Qualification;
use App\Institution;
use App\University;
use App\State;
use Illuminate\Http\Request;
use Auth;

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
        $states = State::all();
        $qualifications = Qualification::where('status', 1)->get();
        $institutions = $universities = [];
        if(isset($educationDetail->id))
        {

            $universities = University::where('state_id', $educationDetail->hq_university)->get();
            $institutions = Institution::where('state_id', $educationDetail->hq_state)->get();

        }    
        return view('admin.education_edit', compact('title', 'user', 'countries', 'qualifications', 'states', 'educationDetail', 'institutions', 'universities'));
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
