
@extends('shared::layouts.app')
@section('title', 'Bookings')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><small><a href="{{route('confirmedrentals.index')}}" class="btn btn-info">Back</a></small> Confirmed Bookings</h1>
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
            <h5 class="card-title">Edit Bookings</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form role="form" action="{{route('confirmedrentals.update',$item->id)}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
										<div class="form-group col-md-6">
								        <label> Select Booking</label><br>
												<select class="form-control select2 {{ $errors->has('booking_id') ? ' is-invalid' : '' }}" name="booking_id"  placeholder="Select a Booking" style="width:100%">
													<option value="">Select Booking</option>
													@foreach($bookings as $booking)
															<option value="{{$booking->id}}" @php echo $item->booking_id == $booking->id ? 'selected' :  "" @endphp>{{$booking->vehicle_pricing->car->no_plate??'NONE'}} - {{$booking->vehicle_pricing->car->car_model->model_name??'NONE'}} / {{$booking->client->name??'NONE'}}</option>
													@endforeach
												</select>
												@if ($errors->has('booking_id'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('booking_id') }}</strong>
														</span>
												@endif
					          </div>
										<div class="form-group col-md-12"></div>
										<div class="form-group col-md-3 ">
												<label for="exampleInputEmail1">Payment Status</label><br>
												<label class="radio-inline"><input type="radio"  name="payment_status" value="1" @php echo $item->payment_status == 1 ? 'checked' :  "" @endphp > Paid</label>
												<label class="radio-inline"><input type="radio"  name="payment_status" value="0" @php echo $item->payment_status == 0? 'checked' :  "" @endphp> Not Paid</label>
												@if ($errors->has('payment_status'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('payment_status') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-3 ">
												<label for="exampleInputEmail1">Car Pickup Status</label><br>
												<label class="radio-inline"><input type="radio"  name="car_pickup_status" value="1" @php echo $item->car_pickup_status == 1 ? 'checked' :  "" @endphp > Picked</label>
												<label class="radio-inline"><input type="radio"  name="car_pickup_status" value="0" @php echo $item->car_pickup_status == 0 ? 'checked' :  "" @endphp> Not yet Picked</label>
												@if ($errors->has('car_pickup_status'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('car_pickup_status') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-3 ">
												<label for="exampleInputEmail1">Pickup Confirmation</label><br>
												<label class="radio-inline"><input type="radio"  name="owner_pickup_confirmation" value="1" @php echo $item->owner_pickup_confirmation == 1 ? 'checked' :  "" @endphp> Yes</label>
												<label class="radio-inline"><input type="radio"  name="owner_pickup_confirmation" value="0" @php echo $item->owner_pickup_confirmation == 0 ? 'checked' :  "" @endphp> No</label>
												@if ($errors->has('owner_pickup_confirmation'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('owner_pickup_confirmation') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Pick Date:</label>
                        <input type="date" name="pick_up_date" value="{{$item->pick_up_date}}"  class="form-control {{ $errors->has('pick_up_date') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Pick Up Date">
                        @if ($errors->has('pick_up_date'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('pick_up_date') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Pick Up Time</label>
                        <input type="time" name="pick_up_time" value="{{$item->pick_up_time}}"  class="form-control {{ $errors->has('pick_up_time') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Pick Time">
                        @if ($errors->has('pick_up_time'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('pick_up_time') }}</strong>
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
