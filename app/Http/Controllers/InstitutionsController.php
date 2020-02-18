<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    public function index()
    {
        $title = trans('app.institutions');
        $institutions = Institution::orderBy('id', 'desc')->get();

        return view('admin.institutions.index', compact('title', 'institutions'));
    }



    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'state_id' => 'required',
            'status' => 'required',
        ];
        
        $this->validate($request, $rules);

        $name = $request->name;
        $duplicate = Institution::where('name', $name)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.institution_exists_in_db'));
        }

        $data = [
            'name' => $request->name,
            'state_id' => $request->state_id,
            'status' => $request->status,
        ];

        Institution::create($data);
        return back()->with('success', trans('app.institution_created'));
    }


    public function edit($id)
    {
        $title = trans('app.edit_institution');
        $institution = Institution::find($id);

        return view('admin.institutions.edit', compact('title', 'institution'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'state_id' => 'required',
            'status' => 'required',
        ];
        $this->validate($request, $rules);

        $name = $request->name;

        $duplicate = Institution::where('name', $name)->where('id', '!=', $id)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.institution_exists_in_db'));
        }

         $data = [
            'name' => $request->name,
            'state_id' => $request->state_id,
            'status' => $request->status,
        ];
        Institution::where('id', $id)->update($data);
        return back()->with('success', trans('app.institution_updated'));
    }


    public function destroy(Request $request)
    {
        $id = $request->data_id;

        $delete = Institution::where('id', $id)->delete();
        if ($delete){
            return ['success' => 1, 'msg' => trans('app.institution_deleted_success')];
        }
        return ['success' => 0, 'msg' => trans('app.error_msg')];
    }



}
