@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">
<h3> Home About</h3><br>
<a href="{{route('add.about')}}"><button class="btn btn-info">Add About</button></a>
<br>
    <div class="col-md-12">
     <div class="card">

   


          <div class="card-header"> About Details </div>
    
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
      <th scope="col" >SL No</th>
      <th scope="col">About Title</th>
      <th scope="col" >About Short_Des</th>
      <th scope="col" >About Long_Des</th>
      <th scope="col" >Created At</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>
  <tbody>
          @php($i = 1) 
        @foreach($abouts as $about) 
    <tr>
      <th scope="row"> {{ $i++ }} </th>
      <td> {{ $about->title }} </td>
      <td> {{ $about->short_des }} </td>
      <td> {{ $about->long_des }} </td> 
      
       <td> 
       <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info" >Edit</a>
       <a href="{{ url('about/delete/'.$about->id) }}" width="1opx" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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
