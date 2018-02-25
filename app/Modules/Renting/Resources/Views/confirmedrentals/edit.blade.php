

@extends('shared::layouts.app')
@section('title','Bookings')
@section('content')


  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Confirmed Booking
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->model_name}}
								</small> |
							<a href="{{ url('/admin/renting/confirmedrentals') }}" class="btn btn-primary btn-xs ">Back</a>

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

							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
  <div class=" page box">
            <div class="tile-body">

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('confirmedrentals.update', $item->id))) }}


<div class="row">

  <div class="form-group col-sm-6 {{ $errors->has('booking_id') ? ' has-error' : '' }} ">

   {{ Form::label('booking_id', trans('Select  Bookings')) }}

<select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="booking_id">
<option value="">  </option>
@foreach($bookings as $record)

<option value="{{ $record->id }}" @if ($record->id == $item->booking_id) selected="selected" @endif >{{ $record->make_name.' '.$record->model_name .' '.$record->cat_name .'  '.$record->name}}</option>
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
<input type="radio" id="1" name="payment_status" value="1">
{!! Form ::radio('payment_status','1',($item->payment_status == '1' ? true : false)) !!}
Paid</label>

<label class="radio-inline">
{!! Form ::radio('payment_status','0',($item->payment_status == '0' ? true : false)) !!}Not Paid</label>


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
{!! Form ::radio('car_pickup_status','1',($item->car_pickup_status == '1' ? true : false)) !!}Picked</label>

<label class="radio-inline">
{!! Form ::radio('car_pickup_status','0',($item->car_pickup_status == '0' ? true : false)) !!}Not yet Picked</label>


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
{!! Form ::radio('owner_pickup_confirmation','1',($item->owner_pickup_confirmation == '1' ? true : false)) !!}Yes</label>

<label class="radio-inline">
{!! Form ::radio('owner_pickup_confirmation','0',($item->owner_pickup_confirmation == '0' ? true : false)) !!}No</label>


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
<input type="text" class="form-control pull-right" id="datepicker" name="pick_up_date" value="{{ $item->pick_up_date }}">
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
  {{ Form::text('pick_up_time',$item->pick_up_time, array('class' => 'form-control pull-right timepicker')) }}

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
                         {{ Form::submit(trans('Edit'), array('class' => 'btn btn-primary')) }}

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
