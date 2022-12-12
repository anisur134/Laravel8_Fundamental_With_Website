@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">
<h3> Home Slider</h3><br>
<a href="{{route('add.slider')}}"><button class="btn btn-info">Add Slider</button></a>
<br>
    <div class="col-md-12">
     <div class="card">

   


          <div class="card-header"> All Slider </div>
    
          @if(session('message'))
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('message')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
   </button>

</div>
@endif

    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Slider Title</th>
      <th scope="col">Slider Description</th>
      <th scope="col">Slider Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
          @php($i = 1) 
        @foreach($sliders as $slider) 
    <tr>
      <th scope="row"> {{ $i++ }} </th>
      <td> {{ $slider->title }} </td>
      <td> {{ $slider->description }} </td>
      <td> <img src="{{asset($slider->image) }}" style="height:40px; width:70px;" > </td> 
      <td> 
         
       </td>
       <td> 
       <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
       <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>

  
       </div>
    </div>


   
  </div> 
 


    </div>
  </div> 

 


    
 @endsection
