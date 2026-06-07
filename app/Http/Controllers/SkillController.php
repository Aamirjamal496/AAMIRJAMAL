<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function addSkill(Request $request)
    {
        $skill = new Skills();
        $skill->name = $request->skillname;
        $skill->percentage = $request->skillproficiency;
        $skill->iconclass = $request->iconclass;
        if ($skill->save()) {
            $request->session()->flash("success", "New Skill Added");
            return redirect()->route("Skills");
        }
    }
    public function showSkills()
    {
        $skill = Skills::all();
        return view("partials.skills", ["skills" => $skill]);
    }
    public function indexSkills()
    {
        $skill = Skills::all();
        return view("admin.skillstab", ["skills" => $skill]);
    }
    public function deleteskill(Request $request, $id)
    {
        // return $id;
        $delete_skill = Skills::destroy($id);
        if ($delete_skill) {
            $request->session()->flash('success', 'Skill Deleted Successfully');
            return redirect()->back();
        } else {
            $request->session()->flash('failed', 'Skill Deletion Failed');
            return redirect()->back();
        }
    }
    public function EditSkill(Request $request, $id)
    {
        $skill = Skills::find($id)->first();
        return $skill;
        $skill->name = $request->skillname;
        $skill->percentage = $request->skillproficiency;
        $skill->iconclass = $request->iconclass;
        if ($skill->save()) {
            $request->session()->flash('success', 'Skill Updated');
            return redirect()->back();
        }
        $request->session()->flash('failed', 'Skill Updation Failed');
        return redirect()->back();
    }
}
