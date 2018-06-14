

@extends('shared::layouts.app')
@section('title','Bookings')
@section('content')


  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Booking
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->model_name}}
								</small> |
							<a href="{{ url('/admin/renting/bookings') }}" class="btn btn-primary btn-xs ">Back</a>

							</h1>
						</div><!-- /.page-header -->

						<div class="row">



                        <div class=" col-sm-12">

  @if(Session::has('flash_message'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i><em> {!! session('flash_message') !!}</em></div>
@endif



@if ($errors->any())

<div class="alert alert-danger">

            @lang('Errors')
    </div>
@endif
</div>

<!-- Box-->

							<div class="col-xs-12 ">
<div class="col-sm-8">
                <div class=" page box">
								<!-- PAGE CONTENT BEGINS -->
            <div class=" tile-body">

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('bookings.update', $item->id))) }}


<div class="row">

  <div class="form-group col-sm-6 {{ $errors->has('vehicle_id') ? ' has-error' : '' }} ">

   {{ Form::label('vehicle_id', trans('Select  VEHICLES')) }}

       <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="vehicle_id">
<option value="">  </option>
@foreach($vehicles as $record)

<option value="{{ $record->vehicle_id}}" @if ($record->vehicle_id == $item->vehicle_id) selected="selected" @endif >{{ $record->make_name.' '.$record->model_name .' '.$record->cat_name }}</option>
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

<option value="{{ $record->id }}" @if ($record->id == $item->user_id) selected="selected" @endif >{{ $record->name  }}</option>
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

<div class="form-group col-sm-5 {{ $errors->has('booking_status') ? ' has-error' : '' }} ">

{{ Form::label('booking_status', trans(' Booked Status')) }}
<br>

<label class="radio-inline">
{!! Form ::radio('booking_status','booked',($item->booking_status == 'booked' ? true : false)) !!}
Booked
</label>
<label class="radio-inline">
{!! Form ::radio('booking_status','cancelled',($item->booking_status == 'cancelled' ? true : false)) !!}
Cancelled
</label>




@if ($errors->has('booking_status'))
   <span class="help-block">
       <strong>{{ $errors->first('booking_status') }}</strong>
   </span>
@endif

</div>



<div class="form-group col-sm-4 {{ $errors->has('date_of_booking') ? ' has-error' : '' }} ">
{{ Form::label('date_of_booking', trans('Date of Booking')) }}
{{ Form::text('date_of_booking',null, array('class' => 'form-control datepicker')) }}

@if ($errors->has('date_of_booking'))
<span class="help-block">
   <strong>{{ $errors->first('date_of_booking') }}</strong>
</span>
@endif
</div>

<div class="form-group col-sm-4 {{ $errors->has('starting_date_of_use') ? ' has-error' : '' }} ">
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
{!! Form ::radio('driver_option','0',($item->driver_option == '0' ? true : false)) !!}
Driver
</label>
<label class="radio-inline">
{!! Form ::radio('driver_option','1',($item->driver_option == '1' ? true : false)) !!}
Self Drive
</label>



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

<option value="{{ $record->id }}" @if ($record->id == $item->booked_by) selected="selected" @endif>{{ $record->name  }}</option>
@endforeach
</select>

@if ($errors->has('booked_by'))
                <span class="help-block">
                    <strong>{{ $errors->first('booked_by') }}</strong>
                </span>
            @endif

</div>

<div class="form-group col-sm-5 {{ $errors->has('booking_discount') ? ' has-error' : '' }} ">
{{ Form::label('booking_discount', trans('Booking Discount')) }}
{{ Form::text('booking_discount',$booking->cost6, array('class' => 'form-control')) }}
{{ Form::hidden('booking_price',$booking->id, array('class' => 'form-control')) }}
@if ($errors->has('booking_discount'))
<span class="help-block">
   <strong>{{ $errors->first('booking_discount') }}</strong>
</span>
@endif
</div>

</div>



<div class="form-group ">

<div class=" col-sm-12">
                         {{ Form::submit(trans('Edit'), array('class' => 'btn btn-primary')) }}

                        </div>

                        <br><br>
                      </div>




{{ Form::close() }}

</div>

</div>
</div>
<?php

$datetime1 = date_create($item->end_date_of_use);
$datetime2 = date_create($item->starting_date_of_use);
$interval = date_diff($datetime1, $datetime2);
$days=0;
if($interval->format('%a')==0)
{
$days=1;
}else
{
$days =$interval->format('%a')+1;

}

?>
<div class="col-sm-4">
                <div class=" page box">
<table>
<tr><td><h4>No of Days:</h4></td> <td><h4>{{$days}}</h4></td></tr>
<tr><td><h4>Daily Rate:</h4></td> <td><h4>{{number_format($booking->cost1,0)}} @php $rate=$booking->cost1*$days; @endphp</h4></td></tr>
@if($item->driver_option==1)
<tr><td><h4>Daily Self Drive Rate:</h4></td> <td><h4>{{number_format($booking->cost3,0)}}@php $self=$booking->cost3*$days; @endphp </h4></td></tr>
@else
<tr><td><h4>Daily Driver Rate</h4></td> <td><h4>{{number_format($booking->cost2,0)}} @php $driver=$booking->cost2*$days; @endphp</h4></td></tr>
@endif

<tr><td><h4>Cost Of Dilivery</h4></td> <td><h4>{{number_format($booking->cost5,0)}}</h4></td></tr>
<tr><td><h4>Discount</h4></td> <td><h4>{{number_format($booking->cost4,0)}}</h4></td></tr>
<tr><td><h4>Booking Discount</h4></td> <td><h4>{{number_format($booking->cost6,0)}}</h4></td></tr>

@if($item->driver_option==1)
 @php $total=($rate+$self+$booking->cost5)-($booking->cost4+$booking->cost6) @endphp
@else
 @php $total=($rate+$driver+$booking->cost5)-($booking->cost4+$booking->cost6)@endphp
@endif
@php $feerate=$total*$setting->key_value @endphp
<tr><td><h4>Total Cost</h4></td> <td><h4>{{ number_format($total,0)}}</h4></td></tr>
<tr><td><h4>Trip Fee</h4></td> <td><h4>{{number_format( $feerate,0)}}</h4></td></tr>
<tr><td><h4>Total Amount</h4></td> <td><h4>{{number_format( $total+$feerate,0)}}</h4></td></tr>
</table>
                </div></div>

<!--box ends -->

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
