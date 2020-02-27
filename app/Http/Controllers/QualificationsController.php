<?php

namespace App\Http\Controllers;

use App\Qualification;
use Illuminate\Http\Request;

class QualificationsController extends Controller
{
    public function index()
    {
        $title = trans('app.qualifications');
        $qualifications = Qualification::orderBy('id', 'desc')->get();

        return view('admin.qualifications.index', compact('title', 'qualifications'));
    }



    public function store(Request $request){
        $rules = [
            'course' => 'required',
            'qual_type' => 'required',
            'status' => 'required',
            'popular' => 'required',
        ];
        
        $this->validate($request, $rules);

        $course = $request->course;
        $duplicate = Qualification::where('course', $course)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.qualification_exists_in_db'));
        }

        $data = [
            'course' => $request->course,
            'qual_type' => $request->qual_type,
            'status' => $request->status,
            'popular' => $request->popular,
        ];

        Qualification::create($data);
        return back()->with('success', trans('app.qualification_created'));
    }


    public function edit($id)
    {
        $title = trans('app.edit_qualification');
        $qualification = Qualification::find($id);

        return view('admin.qualifications.edit', compact('title', 'qualification'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'course' => 'required',
            'qual_type' => 'required',
            'status' => 'required',
            'popular' => 'required',
        ];
        $this->validate($request, $rules);

        $course = $request->course;

        $duplicate = Qualification::where('course', $course)->where('id', '!=', $id)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.qualification_exists_in_db'));
        }

        $data = [
            'course' => $request->course,
            'qual_type' => $request->qual_type,
            'status' => $request->status,
            'popular' => $request->popular,
        ];
        Qualification::where('id', $id)->update($data);
        return back()->with('success', trans('app.qualification_updated'));
    }


    public function destroy(Request $request)
    {
        $id = $request->data_id;

        $delete = Qualification::where('id', $id)->delete();
        if ($delete){
            return ['success' => 1, 'msg' => trans('app.qualification_deleted_success')];
        }
        return ['success' => 0, 'msg' => trans('app.error_msg')];
    }



}
