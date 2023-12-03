<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $user = User::get();
        $project = Project::Paginate(4);

        return view('admin.Project.index', compact('user', 'project'));
    }

    public function add() {
        $user = User::get();

        return view('admin.Project.add', compact('user'));
    }

    public function addProject(Request $request) {
        try{
            $file = $request->file('project_image');
            if ($file) {
                $randomString = Str::random(6, '0123456789');
                $extension = $file->getClientOriginalExtension();
                $fileName = $randomString . '_' . time() . '.' . $extension;
                $file->move(public_path('ProjectImage'), $fileName);
            }

                $data = [
                    'project_name' => $request->input('project_name'),
                    'start_date' => $request->input('start_date'),
                    'end_date' => $request->input('end_date'),
                    'description' => $request->input('description'),
                    'project_image' => $fileName
                ];

                Project::create($data);

                return redirect()->route('admin.project')->with('success', 'Project Added successfully');
        } catch(\Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function edit($id) {
        $user = User::get();
        $project = Project::find($id);

        return view('admin.Project.edit', compact('user', 'project'));
    }

    public function update(Request $request,$id) {
        Project::find($id)->update([
            'project_name' => $request->input('project_name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
        ]);

        $file = $request->file('project_image');
        if ($file) {
            $randomString = Str::random(6, '0123456789');
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;
            $file->move(public_path('ProjectImage'), $fileName);

            Project::find($id)->update([
                'project_image' => $fileName
            ]);
    }

    return redirect()->route('admin.project')->with('success', 'Project updated successfully');
    }

    public function view($id) {
        $user = User::get();
        $project = Project::find($id);

        return view('admin.Project.view', compact('user', 'project'));
    }

    public function destroy($id) {

        try {
            Project::find($id)->delete();
            return redirect()->route('admin.project')->with('success', 'Project deleted successfully.');
        } catch(\Exception $e){
            echo $e->getMessage();
            die();
        }

    }
}
