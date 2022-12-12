<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function ContactInfo(){
            $contacts=Contacts::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function ContactAdd(){
       
    return view('admin.contact.create');
}
public function ContactStore(Request $request){
      
    
    Contacts::insert([

       'address'=>$request->address,
       'email'=>$request->email,
       'phone'=>$request->phone,
      
       'created_at'=>Carbon::now()
        
   ]);
   return redirect()->route('all.contact')->with('message','Contact Info Insert success');
    }


    public function ContactInpo(){
       $contac=DB::table('contacts')->first();
        return view('pages.contact',compact('contac'));
    }

    public function ContactInf(Request $request){
      
    
        ContactForm::insert([
    
           'name'=>$request->name,
           'email'=>$request->email,
           'subject'=>$request->subject,
           'message'=>$request->message,
          
           'created_at'=>Carbon::now()
            
       ]);
       return redirect()->route('all.con')->with('message','Contact Info Insert success');
        }
    

        public function ContactMess(){
            $contactmess=ContactForm::all();
             return view('admin.contact.message',compact('contactmess'));
         }

}
