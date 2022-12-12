@extends('admin.admin_master')
@section('admin')

<div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <div class="card">
                  
            

<div class="card-header">All Brand</div>

                   

         
    <table class="table">
  <thead>
    <tr>
      <th scope="col" >SL</th>
      <th scope="col" >Brand Name</th>
      <th scope="col" >Brand Image </th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <!-- @php($i=1)-->
   @foreach($brands as $brand)
    <tr>
    <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
      <td>{{$brand->brand_name}}</td>
      <td> <img src="{{asset($brand->brand_image)}}"  style="height:40px; width:70px"> </td>
       <td>@if($brand->created_at==null)
           <span class="text-danger">No Date set</span>
           @else
           {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
           @endif
        </td>
       <td>
         <a href="{{url('edit/brand/'.$brand->id)}}" class="btn btn-info">Edit</a>
      
         <a href="{{url('delete/brand/'.$brand->id)}}" onclick="return confirm('Are You Sure Want To Delete')" class="btn btn-danger">Delete</a>
       </td>
      
    </tr>
  @endforeach
  </tbody>
</table>
          
{{ $brands->links() }}


</div>

</div>

        <div class="col-md-4">
            
         <div class="card">
           
            <div class="card-header">Add Brand</div>
            <div class="card-body">
        <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
            @csrf
       <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name">
    @error('brand_name')
    <span class="text-danger">{{ $message }}</span>

    @enderror
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Brand Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="brand_image">
    @error('brand_image')
    <span class="text-danger">{{ $message }}</span>

    @enderror
    
    </div>
 
  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>
                    </div>
                    
                </div>
              </div>

        </div>






       

</div>


    </div>
@endsection
