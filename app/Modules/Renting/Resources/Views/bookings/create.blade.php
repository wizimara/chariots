@extends('shared::layouts.app')
@section('title','Bookings')
@section('content')


  <script src="{{ asset('assets/admin/js/tinymce/tinymce.min.js') }}"></script>
<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>-->
  <script>tinymce.init({ selector:'textarea' ,
  plugins: "advlist"
  });</script>



<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Vehicle Bookings
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Add a new Booking
								</small> |
							<a href="{{ url('/admin/renting/bookings') }}" class="btn btn-primary btn-xs ">Back</a>

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
                   {{ Form::open(array('route' => 'bookings.store')) }}
                    <div class="row">

                      <div class="form-group col-sm-6 {{ $errors->has('vehicle_id') ? ' has-error' : '' }} ">

                       {{ Form::label('vehicle_id', trans('Select  VEHICLES')) }}

                           <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="vehicle_id">
               <option value="">  </option>
               @foreach($vehicles as $record)

               <option value="{{ $record->id }}"  >{{ $record->make_name.' '.$record->model_name .' '.$record->cat_name }}</option>
               @endforeach
               </select>

               @if ($errors->has('vehicle_id'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('vehicle_id') }}</strong>
                                       </span>
                                   @endif

               </div>






                   <div class="form-group col-sm-6 {{ $errors->has('user_id') ? ' has-error' : '' }} ">

                    {{ Form::label('user_id', trans('Select  Booking Client')) }}

                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="user_id">
     <option value="">  </option>
     @foreach($users as $record)

     <option value="{{ $record->id }}"  >{{ $record->name  }}</option>
     @endforeach
</select>

 @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif

            </div>
 </div>

   <div class="row">

     <div class="form-group col-sm-3 {{ $errors->has('booking_status') ? ' has-error' : '' }} ">

       {{ Form::label('booking_status', trans(' Booked Status')) }}
       <br>
         <label class="radio-inline">
   <input type="radio" id="No" name="booking_status" value="booked">Booked</label>

   <label class="radio-inline">
   <input type="radio" id="Yes" name="booking_status" value="cancelled">Cancelled</label>


   @if ($errors->has('booking_status'))
                       <span class="help-block">
                           <strong>{{ $errors->first('booking_status') }}</strong>
                       </span>
                   @endif

   </div>



     <div class="form-group col-sm-3 {{ $errors->has('date_of_booking') ? ' has-error' : '' }} ">
       {{ Form::label('date_of_booking', trans('Date of Booking')) }}
        {{ Form::text('date_of_booking',null, array('class' => 'form-control datepicker')) }}

               @if ($errors->has('date_of_booking'))
                   <span class="help-block">
                       <strong>{{ $errors->first('date_of_booking') }}</strong>
                   </span>
               @endif
     </div>

     <div class="form-group col-sm-3 {{ $errors->has('starting_date_of_use') ? ' has-error' : '' }} ">
       {{ Form::label('starting_date_of_use', trans('Starting Date of Use')) }}
        {{ Form::text('starting_date_of_use',null, array('class' => 'form-control datepicker')) }}

               @if ($errors->has('starting_date_of_use'))
                   <span class="help-block">
                       <strong>{{ $errors->first('starting_date_of_use') }}</strong>
                   </span>
               @endif
     </div>
     <div class="form-group col-sm-3 {{ $errors->has('end_date_of_use') ? ' has-error' : '' }} ">
       {{ Form::label('end_date_of_use', trans('End Date of Use')) }}
        {{ Form::text('end_date_of_use',null, array('class' => 'form-control datepicker')) }}

               @if ($errors->has('end_date_of_use'))
                   <span class="help-block">
                       <strong>{{ $errors->first('end_date_of_use') }}</strong>
                   </span>
               @endif
     </div>



   </div>
<div class="row">
  <div class="form-group col-sm-3 {{ $errors->has('driver_option') ? ' has-error' : '' }} ">

    {{ Form::label('driver_option', trans(' Drive Option')) }}
    <br>
      <label class="radio-inline">
<input type="radio" id="No" name="driver_option" value="0">Driver</label>

<label class="radio-inline">
<input type="radio" id="Yes" name="driver_option" value="1">Self Drive</label>


@if ($errors->has('driver_option'))
                    <span class="help-block">
                        <strong>{{ $errors->first('driver_option') }}</strong>
                    </span>
                @endif

</div>


                   <div class="form-group col-sm-6 {{ $errors->has('booked_by') ? ' has-error' : '' }} ">

                    {{ Form::label('booked_by', trans('Select  Booked By')) }}

                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="booked_by">
     <option value="">  </option>
     @foreach($users as $record)

     <option value="{{ $record->id }}"  >{{ $record->name  }}</option>
     @endforeach
</select>

 @if ($errors->has('booked_by'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booked_by') }}</strong>
                                    </span>
                                @endif

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
  $('.datepicker').datepicker({
    autoclose: true,
		format: 'yyyy-mm-dd',
  });

});

</script>



@endsection
