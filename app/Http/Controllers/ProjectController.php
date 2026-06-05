<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function Store(Request $req)
    {
        // dd($req->file("images"));
        $project = new Project();
        $project->project_name = $req->Pname;
        $project->project_link = $req->Plink;
        $project->description = $req->Pdescription;
        $project->technologies = $req->Ptechnologies;
        $project->save();
        if ($req->hasFile("images")) {
            foreach ($req->file("images") as $image) {
                $path = $image->store("Project_Images", "public");
                ProjectImage::create([
                    "project_id" => $project->id,
                    "images" => $path,
                ]);
            }
            $req->session()->flash("success", "New Project Added");
        } else {
            $req->session()->flash("success", "New Project Added Without Images");
        }
        return redirect()->to("/dashboard/projects");
    }
    public function show()
    {
        $project = Project::with("projectimages")->get();
        // return  $project;
        return view("admin.projectstab", ["projects" => $project]);
    }
    public function index()
    {
        $projects = Project::with("projectimages")->get();
        // return $projects;
        return view("partials.projects", ["projects" => $projects]);
    }
    public function delete(Request $req, $id)
    {
        $delete_pr = Project::destroy($id);
        if ($delete_pr) {
            $req->session()->flash('success', 'Project Deleted');
            return redirect()->back();
        }
    }
}
