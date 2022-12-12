@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
@if(session('message'))
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('message')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
   </button>

</div>
@endif
<div class="card-header card-header-border-bottom">
     <h2>User Profile</h2>
</div>
<div class="card-body">
     <form method="POST" action="{{ route('user.update') }}" class="form-pill">
          @csrf

          <div class="form-group">
               <label for="exampleFormControlInput3">UserName</label>
               <input type="text" name="name" class="form-control" id="" value="{{ $user['name'] }}">

              
          </div>

          <div class="form-group">
               <label for="exampleFormControlInput3">User Email</label>
               <input type="email" name="email" class="form-control" id="" value="{{ $user['email'] }}">

              
          </div>

          

          <button type="submit" class="btn btn-primary btn-default"> Save</button>
           
     </form>
</div>
									</div>



@endsection