<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function index()
    {
        $title = trans('app.branches');
        $branches = Branch::orderBy('id', 'desc')->get();

        return view('admin.branches.index', compact('title', 'branches'));
    }



    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'qualification_id' => 'required',
            'status' => 'required',
        ];
        
        $this->validate($request, $rules);

        $name = $request->name;
        $duplicate = Branch::where('name', $name)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.qualification_exists_in_db'));
        }

        $data = [
            'name' => $request->name,
            'qualification_id' => $request->qualification_id,
            'status' => $request->status,
        ];

        Branch::create($data);
        return back()->with('success', trans('app.qualification_created'));
    }


    public function edit($id)
    {
        $title = trans('app.edit_branch');
        $branch = Branch::find($id);

        return view('admin.branches.edit', compact('title', 'branch'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'qualification_id' => 'required',
            'status' => 'required',
        ];
        $this->validate($request, $rules);

        $name = $request->name;

        $duplicate = Branch::where('name', $name)->where('id', '!=', $id)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.branch_exists_in_db'));
        }

         $data = [
            'name' => $request->name,
            'qualification_id' => $request->qualification_id,
            'status' => $request->status,
        ];
        Branch::where('id', $id)->update($data);
        return back()->with('success', trans('app.branch_updated'));
    }


    public function destroy(Request $request)
    {
        $id = $request->data_id;

        $delete = Branch::where('id', $id)->delete();
        if ($delete){
            return ['success' => 1, 'msg' => trans('app.qualification_deleted_success')];
        }
        return ['success' => 0, 'msg' => trans('app.error_msg')];
    }



}
