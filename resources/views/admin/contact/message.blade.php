@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">
<h3> Home Message</h3><br>

<br>
    <div class="col-md-12">
     <div class="card">

   


          <div class="card-header"> All Contacts </div>
    
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
      <th scope="col">Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
          @php($i = 1) 
        @foreach($contactmess as $contact) 
    <tr>
      <th scope="row"> {{ $i++ }} </th>
      <td> {{ $contact->name }} </td>
      <td> {{ $contact->email }} </td>
      <td>  {{ $contact->subject }}</td> 
      <td>  {{ $contact->message }}</td> 
     
      
       <td> 
       
       <a href="{{ url('contacts/delete/'.$contact->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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
