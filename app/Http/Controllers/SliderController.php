<?php

namespace App\Http\Controllers;

use App\Models\Slider;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class SliderController extends Controller
{
    public function Slider(){
        $sliders=Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
     }
     public function SliderAdd(){
      
        return view('admin.slider.create');
     }
     public function SliderStore(Request $request){
      
    $image=$request->file('image');
     
     $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
     Image::make($image)->resize(300,200)->save('image/slider/'.$name_gen);
     $last_img='image/slider/'.$name_gen;

     Slider::insert([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$last_img,
        'created_at'=>Carbon::now()
         
    ]);
    return redirect()->route('all.slider')->with('message','Slide Details Insert success');
     }
}
