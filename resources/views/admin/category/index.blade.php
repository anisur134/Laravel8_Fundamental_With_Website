<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         <b></b>
         <b style="float:right"><span class="badge badge-danger"></span> </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <div class="card">
                @if(session('message'))
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('message')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
   </button>

</div>
@endif
<div class="card-header">All Category</div>

                   

            
    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Category Name</th>
      <th scope="col">User Id</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <!-- @php($i=1)-->
   @foreach($categories as $category)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$category->category_name}}</td>
      <td>{{$category->user->name}}</td>
      <td>
        @if($category->created_at==null)
           <span class="text-danger">No Date set</span>
           @else
           {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
           @endif
    </td>
    <td>
        <a href="{{url('edit/category/'.$category->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('delete/category/'.$category->id)}}" class="btn btn-danger">Delete</a>
    </td>
      
    </tr>
   @endforeach
    
  </tbody>
</table>
{{ $categories->links() }}
        
</div>
</div>
            <div class="col-md-4">
            
         <div class="card">
           
                <div class="card-header">Add Category</div>
            <div class="card-body">
        <form action="{{route('store.category')}}" method="post">
            @csrf
       <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name">
    @error('category_name')
    <span class="text-danger">{{$message}}</span>

    @enderror
    
  </div>
 
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
                    </div>
                    
                </div>
              </div>

        </div>


<br>
<br>

<!--trash lish-->

        <div class="row">
                <div class="col-md-8">
                <div class="card">
               
<div class="card-header">Trash list</div>

                   

            
    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Category Name</th>
      <th scope="col">User Id</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <!-- @php($i=1)-->
   @foreach( $trachat as $category)
    <tr>
           <th scope="row">{{$trachat->firstItem()+$loop->index}}</th>
      <td>{{$category->category_name}}</td>
      <td>{{$category->user->name}}</td>
      <td>
        @if($category->created_at==null)
           <span class="text-danger">No Date set</span>
           @else
           {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
           @endif
    </td>
    <td>
        <a href="{{url('restore/category/'.$category->id)}}" class="btn btn-info">Restore</a>
        <a href="{{url('pdelete/category/'.$category->id)}}" class="btn btn-danger">PDelete</a>
    </td>
      
    </tr>
   @endforeach
    
  </tbody>
</table>
{{  $trachat->links() }}
        
</div>
</div>
            <div class="col-md-4">
            
         
                    
                </div>
              </div>

        </div>































        </div>
    </div>
</x-app-layout>
