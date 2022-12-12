@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
    
            <div class="col-md-8">
            
         <div class="card">
           
                <div class="card-header">Edit About</div>
            <div class="card-body">
        <form action="{{url('update/about/'.$about->id)}}" method="post" >
            @csrf
            <div class="form-group">
								<label for="exampleFormControlInput1">About Title</label>
		<input type="text" class="form-control" name="title" id="exampleFormControlInput1" value="{{$about->title}}" placeholder="Enter Title">
													
							</div>
												
												
												
									<div class="form-group">
											<label for="exampleFormControlTextarea1">Short Description</label>
											<textarea class="form-control" id="exampleFormControlTextarea1" name="short_des"  rows="3">{{$about->short_des}}</textarea>
										</div>
                                     <div class="form-group">
											<label for="exampleFormControlTextarea1">Long Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="long_des"  rows="5">{{$about->long_des}}</textarea>
										</div>
 
                                 <button type="submit" class="btn btn-primary">Update About</button>
</form>
                    </div>
                    
                </div>
              </div>

        </div>

        </div>
    </div>
    @endsection