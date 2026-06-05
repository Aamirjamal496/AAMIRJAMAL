<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(){
        $experience=Experience::get();
        return view('admin.exptab',['experiences'=>$experience]);
    }
    public function AddExperience(Request $request){
        // $validated=$request->validate([
        //     'title'=>'string|required',
        //     'company_name'=>'required',
        //     'starting_date'=>'required|date',
        //     'completion_date'=>'date|nullable',
        //     'responsibilities'=>'required',
        // ]);
        // Experience::create($validated);
        //    if($experience){
            //     }else{
    //        $request->session()->flash('failed','Failed to Add New Experience');
    //        return redirect()->back();
    //    }
    $experience = new Experience();
    $experience->title=$request->Title;
    $experience->company_name=$request->CompanyName;
    $experience->starting_date=$request->startdate;
    $experience->completion_date=$request->enddate;
    $experience->responsibilities=$request->responsibilities;
    if($experience->save()){
        $request->session()->flash('success','New Experience Added');
        return redirect()->back();
    }else{
        $request->session()->flash('failed','Failed to Add New Experience');
        return redirect()->back();
    }
        // return $request->all();
        }
    public function showExperience(){
        $experience=Experience::get();
        return view('partials.experience',['experiences'=>$experience]);
    }
    public function deleteExp(Request $request, $id){
        $experience=Experience::destroy($id);
        // return $experience;
        // $experience->destroy();
        if($experience){
            $request->session()->flash('success','Experience Deleted');
            return redirect()->back();
        }
    }
}
