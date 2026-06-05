<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
   public function send(Request $request){
    // return $request->all();
   $send= DB::table('contacts')->insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'message'=>$request->message,
        'created_at'=>now()
    ]);
    if($send){
        $request->session()->flash("success","Message Sent Successfully");
        return redirect()->route('Contact');
    }
   }
   public function showMessage(){
    $msg=Contacts::all();
    return view('admin.messages',['messages'=>$msg]);
   }
   public function delete(Request $request,$id){
    $msgdeleted = Contacts::destroy($id);
        // return "Message Deletion Failed";
        if($msgdeleted){
            $request->session()->flash("success","Message Deleted Successfully");
            return redirect()->route("Messages");
        }
    

    // return $msg;
    // $msg->destroy();
    // return redirect('Messages');
   }
}
