

@extends('shared::layouts.app')
@section('title','Bookings')
@section('content')


  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Payments
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->model_name}}
								</small> |
							<a href="{{ url('/admin/renting/payments') }}" class="btn btn-primary btn-xs ">Back</a>

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

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('payments.update', $item->id))) }}


<div class="row">

  <div class="form-group col-sm-6 {{ $errors->has('confirmed_rentals_id') ? ' has-error' : '' }} ">

   {{ Form::label('confirmed_rentals_id', trans('Select  Confirmed Booking')) }}

<select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="confirmed_rentals_id">
<option value="">  </option>
@foreach($bookings as $record)

<option value="{{ $record->id }}" @if ($record->id == $item->confirmed_rentals_id) selected="selected" @endif >{{ $record->make_name.' '.$record->model_name .' '.$record->cat_name .'  '.$record->name}}</option>
@endforeach
</select>

@if ($errors->has('confirmed_rentals_id'))
                   <span class="help-block">
                       <strong>{{ $errors->first('confirmed_rentals_id') }}</strong>
                   </span>
               @endif

</div>


</div>

<div class="row">
<div class="form-group col-sm-3 {{ $errors->has('amount_paid') ? ' has-error' : '' }} ">
{{ Form::label('amount_paid', trans('Amount Paid')) }}
{{ Form::text('amount_paid',null, array('class' => 'form-control ')) }}

@if ($errors->has('amount_paid'))
   <span class="help-block">
       <strong>{{ $errors->first('amount_paid') }}</strong>
   </span>
@endif
</div>
<div class="form-group col-sm-3 {{ $errors->has('balance') ? ' has-error' : '' }} ">
{{ Form::label('balance', trans('Balance')) }}
{{ Form::text('balance',null, array('class' => 'form-control ')) }}

@if ($errors->has('balance'))
 <span class="help-block">
     <strong>{{ $errors->first('balance') }}</strong>
 </span>
@endif
</div>

</div>

<div class="row">

<div class="form-group col-sm-3 {{ $errors->has('payment_gateway') ? ' has-error' : '' }} ">

{{ Form::label('payment_gateway', trans(' Payment Gateway')) }}
<br>
<label class="radio-inline">
{!! Form ::radio('payment_gateway','Paypal',($item->payment_gateway == 'Paypal' ? true : false)) !!}Paypal</label>

<label class="radio-inline">
{!! Form ::radio('payment_gateway','Mobile Money',($item->payment_gateway == 'Mobile Money' ? true : false)) !!}Mobile Money</label>


@if ($errors->has('payment_gateway'))
   <span class="help-block">
       <strong>{{ $errors->first('payment_gateway') }}</strong>
   </span>
@endif

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
