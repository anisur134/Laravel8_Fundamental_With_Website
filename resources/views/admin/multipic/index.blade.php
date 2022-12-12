@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <div class="card-group">
                    
                        @foreach($images as $multiimg)
                        <div class="col-md-4 mt-5">
                        <div class="card">
                            <img src="{{asset($multiimg->image)}}" alt="">
                        </div>
                     
                    </div>
                    @endforeach



                   

</div>
</div>
        <div class="col-md-4">
            
         <div class="card">
           
            <div class="card-header">Add Image</div>
            <div class="card-body">
        <form action="{{route('image.brand')}}" method="post" enctype="multipart/form-data">
            @csrf
     

    <div class="form-group">
    <label for="exampleInputEmail1">Multi Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image[]" multiple="">
    @error('image')
    <span class="text-danger">{{ $message }}</span>

    @enderror
    
    </div>
 
  <button type="submit" class="btn btn-primary">Add Image</button>
  </form>
                    </div>
                    
                </div>
              </div>

        </div>




<!--trash lish-->

       

</div>


    </div>
@endsection
