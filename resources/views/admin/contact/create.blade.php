@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Basic Form Controls</h2>
										</div>
										<div class="card-body">
											<form action="{{route('store.contact')}}" method="POST" >
                                                @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Address</label>

													<input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="Enter Title">
													
												</div>
												
												
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Contact Email</label>
													<input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Enter email">
												</div>

												<div class="form-group">
													<label for="exampleFormControlTextarea1">Contact Phone</label>
													<input type="number" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Enter email">
												</div>
												
												<div class="form-footer  pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>


									
								</div>
                                @endsection