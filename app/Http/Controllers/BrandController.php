<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
     public function AllBrand(){
        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
     }
     public function AddBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,png',
            
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Name Greater than 4 Character',
            
        ]);
        
     $brand_image=$request->file('brand_image');
     //$name_gen=hexdec(uniqid());
     //$img_ext=strtolower($brand_image->getClientOriginalExtension());
     //$img_name=$name_gen.'.'.$img_ext;
   // $up_location='image/brand/';
    // $last_img=$up_location.$img_name;
    //$brand_image->move($up_location,$img_name);
     $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
     Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
     $last_img='image/brand/'.$name_gen;

     Brand::insert([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_img,
        'created_at'=>Carbon::now()
         
    ]);
    $notification=array(
        'message' =>'Brand Insert success',
        'alert-type' =>'success',
    );
    return redirect()->back()->with($notification);
}
   public function Edit($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
   }

   public function Update(Request $request,$id){

    $validated = $request->validate([
        'brand_name' => 'required|min:4',
        
    ],
    [
        'brand_name.required' => 'Please Input Brand Name',
        'brand_name.min' => 'Brand Name Greater than 4 Character',
        
    ]);

    $oldImage=$request->old_image;
    $brand_image=$request->file('brand_image');
    if($brand_image){
        
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/brand/';
        $last_img=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);
        unlink($oldImage);
        Brand::find($id)->update([
           'brand_name'=>$request->brand_name,
           'brand_image'=>$last_img,
           'created_at'=>Carbon::now()
            
       ]);
       $notification=array(
        'message' =>'Image Update success',
        'alert-type' =>'info',
    );
       return redirect()->route('all.brand')->with($notification);
    }
    else{
        Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
           
            'created_at'=>Carbon::now()
             
        ]);
        $notification=array(
            'message' =>'Image Update success',
            'alert-type' =>'warning',
        );
        return redirect()->route('all.brand')->with($notification);
    }
    
 
    
   
}
public function Delete($id){
    $image=Brand::find($id);
         $old_image=$image->brand_image;
         unlink($old_image);
        Brand::find($id)->delete();
         return Redirect()->back()->with('message','Image Delete successfully');
}
  
    public function Multipic(){
       $images=Multipic::all();
        return view('admin.multipic.index',compact('images'));
    }

    public function Multiimage(Request $request){

        $images=$request->file('image');
        foreach($images as $multiimg){
       
        $name_gen=hexdec(uniqid()).'.'. $multiimg->getClientOriginalExtension();
        Image::make($multiimg)->resize(300,200)->save('image/multi/'.$name_gen);
        $last_img='image/multi/'.$name_gen;
   
        Multipic::insert([
          
           'image'=>$last_img,
           'created_at'=>Carbon::now()
            
       ]);
    } //endforeach

       return redirect()->back()->with('message','MultiImage Insert success');
    }



    public function Logout(){
        Auth::logout();
        return redirect()->route('login')->with('message','Logout success');
    }
}
