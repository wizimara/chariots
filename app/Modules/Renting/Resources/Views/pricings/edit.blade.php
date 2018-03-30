

@extends('shared::layouts.app')
@section('title','Pricings')
@section('content')


  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Pricings
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->model_name}}
								</small> |
							<a href="{{ url('/admin/renting/pricings') }}" class="btn btn-primary btn-xs ">Back</a>

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
                <div class=" page box">
								<!-- PAGE CONTENT BEGINS -->

            <div class=" tile-body">

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('pricings.update', $item->id))) }}


<div class="row">

  <div class="form-group col-sm-6 {{ $errors->has('vehicle_id') ? ' has-error' : '' }} ">

   {{ Form::label('vehicle_id', trans('Select  VEHICLES')) }}

       <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="vehicle_id">
<option value="">  </option>
@foreach($vehicles as $record)

<option value="{{ $record->id }}" @if ($record->id==$item->vehicle_id)
  selected
@endif >{{'00'.$record->id.' '. $record->make_name.' '.$record->model_name .' '.$record->cat_name }}</option>
@endforeach
</select>

@if ($errors->has('vehicle_id'))
                   <span class="help-block">
                       <strong>{{ $errors->first('vehicle_id') }}</strong>
                   </span>
               @endif

</div>






</div>

<div class="row">

<div class="form-group col-sm-3 {{ $errors->has('dailyrate') ? ' has-error' : '' }} ">

{{ Form::label('dailyrate', trans(' Daily Rate')) }}
{{ Form::text('dailyrate',null, array('class' => 'form-control ')) }}


@if ($errors->has('dailyrate'))
   <span class="help-block">
       <strong>{{ $errors->first('dailyrate') }}</strong>
   </span>
@endif

</div>



<div class="form-group col-sm-3 {{ $errors->has('dailydriverrate') ? ' has-error' : '' }} ">
{{ Form::label('dailydriverrate', trans('Daily Driver Rate')) }}
{{ Form::text('dailydriverrate',null, array('class' => 'form-control')) }}

@if ($errors->has('dailydriverrate'))
<span class="help-block">
   <strong>{{ $errors->first('dailydriverrate') }}</strong>
</span>
@endif
</div>

<div class="form-group col-sm-3 {{ $errors->has('discount') ? ' has-error' : '' }} ">
{{ Form::label('discount', trans('Discount')) }}
{{ Form::text('discount',null, array('class' => 'form-control ')) }}

@if ($errors->has('discount'))
<span class="help-block">
   <strong>{{ $errors->first('discount') }}</strong>
</span>
@endif
</div>
<div class="form-group col-sm-3 {{ $errors->has('costofdelivery') ? ' has-error' : '' }} ">
{{ Form::label('costofdelivery', trans('Cost of Delivery')) }}
{{ Form::text('costofdelivery',null, array('class' => 'form-control ')) }}

@if ($errors->has('costofdelivery'))
<span class="help-block">
   <strong>{{ $errors->first('costofdelivery') }}</strong>
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