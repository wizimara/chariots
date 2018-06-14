@extends('shared::layouts.app')
@section('title','Bookings')
@section('content')



<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Confirmed Bookings
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Add a new Confirmation
								</small> |
							<a href="{{ url('/admin/renting/confirmedrentals') }}" class="btn btn-primary btn-xs ">Back</a>

							</h1>
						</div><!-- /.page-header -->

						<div class="row">



                        <div class=" col-sm-12">




@if ($errors->any())
<div class="alert alert-danger">

            @lang('Errors')
    </div>
@endif
</div>

							<div class="col-xs-12">
								  <div class=" page box">
								<!-- PAGE CONTENT BEGINS -->

            <div class="tile-body">
                   {{ Form::open(array('route' => 'confirmedrentals.store')) }}
                    <div class="row">

                      <div class="form-group col-sm-6 {{ $errors->has('booking_id') ? ' has-error' : '' }} ">

                       {{ Form::label('booking_id', trans('Select  Bookings')) }}

<select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="booking_id">
               <option value="">  </option>
               @foreach($bookings as $record)

               <option value="{{ $record->id }}"  >{{ $record->make_name.' '.$record->model_name .' '.$record->cat_name .'  '.$record->name}}</option>
               @endforeach
               </select>

               @if ($errors->has('booking_id'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('booking_id') }}</strong>
                                       </span>
                                   @endif

               </div>


 </div>

   <div class="row">

     <div class="form-group col-sm-3 {{ $errors->has('payment_status') ? ' has-error' : '' }} ">

       {{ Form::label('payment_status', trans(' Payment Status')) }}
       <br>
         <label class="radio-inline">
   <input type="radio" id="1" name="payment_status" value="1">Paid</label>

   <label class="radio-inline">
   <input type="radio" id="0" name="payment_status" value="0" checked>Not Paid</label>


   @if ($errors->has('payment_status'))
                       <span class="help-block">
                           <strong>{{ $errors->first('payment_status') }}</strong>
                       </span>
                   @endif

   </div>



     <div class="form-group col-sm-3 {{ $errors->has('car_pickup_status') ? ' has-error' : '' }} ">
       {{ Form::label('car_pickup_status', trans(' Car Pickup Status')) }}
       <br>
         <label class="radio-inline">
   <input type="radio" id="1" name="car_pickup_status" value="1">Picked</label>

   <label class="radio-inline">
   <input type="radio" id="0" name="car_pickup_status" value="0" checked>Not yet Picked</label>


   @if ($errors->has('car_pickup_status'))
                       <span class="help-block">
                           <strong>{{ $errors->first('car_pickup_status') }}</strong>
                       </span>
                   @endif

     </div>

     <div class="form-group col-sm-2 {{ $errors->has('owner_pickup_confirmation') ? ' has-error' : '' }} ">
       {{ Form::label('owner_pickup_confirmation', trans('Pickup Confirmation')) }}
       <br>

         <label class="radio-inline">
   <input type="radio" id="1" name="owner_pickup_confirmation" value="1">Yes</label>

   <label class="radio-inline">
   <input type="radio" id="0" name="owner_pickup_confirmation" value="0" checked>No</label>


   @if ($errors->has('car_pickup_status'))
                       <span class="help-block">
                           <strong>{{ $errors->first('car_pickup_status') }}</strong>
                       </span>
                   @endif
     </div>
     <div class="form-group col-sm-2 {{ $errors->has('pick_up_date') ? ' has-error' : '' }} ">


       <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="pick_up_date">
                </div>
                <!-- /.input group -->
              </div>

                     @if ($errors->has('pick_up_date'))
                         <span class="help-block">
                             <strong>{{ $errors->first('pick_up_date') }}</strong>
                         </span>
                     @endif

     </div>

		 <div class="form-group col-sm-2 {{ $errors->has('pick_up_time') ? ' has-error' : '' }} ">


			 {{ Form::label('pick_up_time', trans('Pickup Time')) }}
			 <div class="bootstrap-timepicker">
				<input type="text" class=" form-control pull-right timepicker" name="pick_up_time" >
										 @if ($errors->has('pick_up_time'))
												 <span class="help-block">
														 <strong>{{ $errors->first('pick_up_time') }}</strong>
												 </span>
										 @endif
		</div>
		 </div>

   </div>



                 <div class="form-group ">
                        <div class=" col-sm-12">
                         {{ Form::submit(trans('Submit'), array('class' => 'btn btn-primary')) }}

                        </div>
                        <br><br>
                      </div>



{{ Form::close() }}


                  </div>

</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>

@stop

@section('js')
  @parent
<script>
$( document ).ready(function() {
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
		format: 'yyyy-mm-dd',
  });
  $('.timepicker').timepicker({


	});

});

</script>



@endsection
