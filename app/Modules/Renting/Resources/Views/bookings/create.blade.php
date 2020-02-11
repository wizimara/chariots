@extends('shared::layouts.app')
@section('title', 'Bookings')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><small><a href="{{route('bookings.index')}}" class="btn btn-info">Back</a></small> Bookings</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">bookings</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
          </ul>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Add Bookings</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form role="form" action="{{route('bookings.store')}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
										<div class="form-group col-md-6">
								        <label> Select Vehicle</label><br>
												<select class="form-control select2 {{ $errors->has('vehicle_id') ? ' is-invalid' : '' }}" name="vehicle_id"  placeholder="Select Client" style="width:100%">
													<option value="">Select Vehicle</option>
													@foreach($vehicles as $vehicle)
															<option value="{{$vehicle->id}}" @php echo old('vehicle_id') == $vehicle->id ? 'selected' :  "" @endphp>{{$vehicle->car->no_plate}} / {{$vehicle->car->car_model->model_name}} / {{$vehicle->car->car_model->car_make->make_name}} / {{$vehicle->car->car_category->cat_name}} </option>
													@endforeach
												</select>
												@if ($errors->has('vehicle_id'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('vehicle_id') }}</strong>
														</span>
												@endif
					          </div>
										<div class="form-group col-md-6">
												<label> Select Car Owner</label><br>
												<select class="form-control select2 {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id"  placeholder="Select Client" style="width:100%">
													<option value="">Select User</option>
													@foreach($users as $user)
															<option value="{{$user->id}}" @php echo old('user_id') == $user->id ? 'selected' :  "" @endphp>{{$user->name}} </option>
													@endforeach
												</select>
												@if ($errors->has('user_id'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('user_id') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Date of Booking</label>
                        <input type="date" name="date_of_booking" value="{{old('date_of_booking')}}"  class="form-control {{ $errors->has('date_of_booking') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Date of Booking">
                        @if ($errors->has('date_of_booking'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('date_of_booking') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Starting Date of Use</label>
                        <input type="date" name="starting_date_of_use" value="{{old('starting_date_of_use')}}"  class="form-control {{ $errors->has('starting_date_of_use') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Starting Date of Use">
                        @if ($errors->has('starting_date_of_use'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('starting_date_of_use') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">End Date of Use</label>
                        <input type="date" name="end_date_of_use" value="{{old('end_date_of_use')}}"  class="form-control {{ $errors->has('end_date_of_use') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="End Date of Use">
                        @if ($errors->has('end_date_of_use'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('end_date_of_use') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
												<label for="exampleInputEmail1">Drive Option</label><br>
												<label class="radio-inline"><input type="radio"  name="driver_option" value="0" checked> Driver</label>
												<label class="radio-inline"><input type="radio"  name="driver_option" value="1"> Self Drive</label>
												@if ($errors->has('driver_option'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('driver_option') }}</strong>
														</span>
												@endif
										</div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Booking Discount</label>
                        <input type="text"  name="booking_discount" value="{{old('booking_discount')??0}}" class="form-control {{ $errors->has('booking_discount') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Booking Discount" >
                        @if ($errors->has('booking_discount'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('booking_discount') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-6">
												<label> Select  Booked By</label><br>
												<select class="form-control select2 {{ $errors->has('booked_by') ? ' is-invalid' : '' }}" name="booked_by"  placeholder="Select Client" style="width:100%">
													<option value="">Select  Booked By</option>
													@foreach($users as $user)
															<option value="{{$user->id}}" @php echo old('booked_by') == $user->id ? 'selected' :  "" @endphp>{{$user->name}} </option>
													@endforeach
												</select>
												@if ($errors->has('booked_by'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('booked_by') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-4 ">
												<label for="exampleInputEmail1">Booked Status</label><br>
												<label class="radio-inline"><input type="radio"  name="booking_status" value="Booked" checked> Booked</label>
												<label class="radio-inline"><input type="radio"  name="booking_status" value="cancelled"> Cancelled</label>
												@if ($errors->has('booking_status'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('booking_status') }}</strong>
														</span>
												@endif
										</div>

                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </div>
            </form>
            </div>

            <!-- /.row -->
            </div>
            <!-- ./card-body -->

            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
   @parent
   <script>
       $(function () {
            $('.select2').select2();
       })
</script>
@stop
