<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validations = $request->validate([
            "email" => "required|email",
            "password" => "required|string"
        ]);
        if (Auth::attempt($validations)) {
            $request->session()->regenerateToken();
            //    return 'Logged In Successfull';
            return redirect()->route("Profile");
            // return view("admin.profile");
        }
        throw ValidationException::withMessages([
            "credentials" => "Sorry, Invalid Credentials",
        ]);
    }
    public function Profile()
    {
        return view('admin.profile');
    }
    public function UpdateProfile(Request $request)
    {
        return 'Update Profile';
    }
    public function AboutPage()
    {
        $user = User::get();
        return view('partials.about', ['users' => $user]);
    }
    public function index()
    {
        $user = User::get();
        return view('home', ['users' => $user]);
    }
    public function EditPassword(Request $request)
    {
        // $user = User::find($id)->first();
        $user = DB::table("users")->where("email", $request->email)->get();
        // update([
        //     "" => "",
        //     "" => "",
        //     "" => "",
        // ]);
        return $user;
        // return $id;
    }
}
