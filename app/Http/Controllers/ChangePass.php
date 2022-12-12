<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ChangePass extends Controller
{
    public function Cpassword (){
        
        return view('admin.body.change_password');

    }
    public function UpdatePassword (Request $request){
        
       $validateData=$request->validate([
                    'oldpassword'=>'required',
                    'password'=>'required|confirmed',
                       
       ]);
       $HashPassword=Auth::user()->password;
       if(Hash::check($request->oldpassword, $HashPassword)){
        $user=User::find(Auth::id());
        $user->password=Hash::make($request->password);
          $user->save();
           Auth::logout();
           return redirect()->route('login')->with('message','Password Change Successfully');
       }else{
        return redirect()->back()->with('error','Password is Invaid');
       }

    }

    public function UserProfile(){
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile',compact('user'));
            }
           
        }
       

    }
    public function UserUpdate(Request $request){
       
            $user=User::find(Auth::user()->id);
            if($user){
                $user->name=$request['name'];
                $user->email=$request['email'];
                $user->save();
                return redirect()->back()->with('message','User Profile Update Successfully');
            }
            else{
                return redirect()->back();
            }
           
        }
       

    
}
