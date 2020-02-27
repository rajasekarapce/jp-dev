<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $title = trans('app.skills');
        $skills = Skill::orderBy('id', 'desc')->get();

        return view('admin.skills.index', compact('title', 'skills'));
    }



    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];
        
        $this->validate($request, $rules);

        $name = $request->name;
        $duplicate = Skill::where('name', $name)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.skill_exists_in_db'));
        }

        $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        Skill::create($data);
        return back()->with('success', trans('app.skill_created'));
    }


    public function edit($id)
    {
        $title = trans('app.edit_skill');
        $skill = Skill::find($id);

        return view('admin.skills.edit', compact('title', 'skill'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];
        $this->validate($request, $rules);

        $name = $request->name;

        $duplicate = Skill::where('name', $name)->where('id', '!=', $id)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.skill_exists_in_db'));
        }

         $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];
        Skill::where('id', $id)->update($data);
        return back()->with('success', trans('app.skill_updated'));
    }


    public function destroy(Request $request)
    {
        $id = $request->data_id;

        $delete = Skill::where('id', $id)->delete();
        if ($delete){
            return ['success' => 1, 'msg' => trans('app.skill_deleted_success')];
        }
        return ['success' => 0, 'msg' => trans('app.error_msg')];
    }



}
