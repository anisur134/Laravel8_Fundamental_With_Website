<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About(){
        $abouts=About::latest()->get();
        return view('admin.about.index',compact('abouts'));
     }
     public function AboutAdd(){
      
        return view('admin.about.create');
     }
     public function AboutStore(Request $request){
      
    
     About::insert([

        'title'=>$request->title,
        'short_des'=>$request->short_des,
        'long_des'=>$request->long_des,
       
        'created_at'=>Carbon::now()
         
    ]);
    return redirect()->route('all.about')->with('message','About Details Insert success');
     }

     public function Edit($id){
      $about=About::find($id);
      return view('admin.about.edit',compact('about'));

     }
     public function Delete($id){
      $delete=About::find($id)->delete();
      return redirect()->back()->with('message','About  delete success');

     }
     public function UpdateAbout(Request $request,$id){
      $Update=About::find($id)->update([

         'title'=>$request->title,
         'short_des'=>$request->short_des,
         'long_des'=>$request->long_des,
        
         'created_at'=>Carbon::now()
          
     ]);
     return redirect()->route('all.about')->with('message','About Details Update success');
     }
     public function Portfoilo(){
        $imgs=Multipic::all();
        return view('pages.portfoilo',compact('imgs'));
     }
}
