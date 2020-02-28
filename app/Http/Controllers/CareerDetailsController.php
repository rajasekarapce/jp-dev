<?php

namespace App\Http\Controllers;

use App\CareerDetail;
use App\Skill;
use Illuminate\Http\Request;
use Auth;

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
        $skills = $request->skills;
        $input = $request->except(['academic_proj', 'skills']);
        $i=1;
        foreach ($academic_projs as $key => $value) {
            $input['academic_projtype'.$i] = $value['academic_projtype'];
            $input['academic_projname'.$i] = $value['academic_projname'];
            $input['academic_projdesc'.$i] = $value['academic_projdesc'];
            $i++;
        }
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

        $careerDetail = CareerDetail::where('user_id',Auth::user()->id)->first();    
        $view  = 'career.create';
        $skills = Skill::get();    
         if(!empty($careerDetail->id))
        {
            $view  = 'career.edit';
        }   
        return view('admin.'.$view, compact('title', 'user', 'careerDetail', 'skills'));
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
