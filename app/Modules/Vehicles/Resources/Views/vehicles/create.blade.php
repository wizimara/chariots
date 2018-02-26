@extends('shared::layouts.app')
@section('title','Vehicles')
@section('content')

<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Vehicles
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Create a new Vehicle
								</small> |
							<a href="{{ url('/admin/vehicles/vehicles') }}" class="btn btn-primary btn-xs ">Back</a>

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
                   {{ Form::open(array('route' => 'vehicles.store')) }}
                    <div class="row">

                      <div class="form-group col-sm-12 {{ $errors->has('vehicle_name') ? ' has-error' : '' }} ">
                        {{ Form::label('vehicle_name', trans('Name')) }}
                         {{ Form::text('vehicle_name',null, array('class' => 'form-control')) }}

                                @if ($errors->has('vehicle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicle_name') }}</strong>
                                    </span>
                                @endif
                      </div>
 </div>

 <div class="row">

                     <div class="form-group col-sm-4 {{ $errors->has('model_id') ? ' has-error' : '' }} ">

                    {{ Form::label('model_id', trans('Select  Vehicle model')) }}

                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Vehicle model."  name="model_id">
     <option value="">  </option>
     @foreach($models as $user)

     <option value="{{ $user->id }}"  >{{ $user->make_name.' ' .$user->model_name  }}</option>
     @endforeach
</select>

 @if ($errors->has('model_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model_id') }}</strong>
                                    </span>
                                @endif

            </div>




            <div class="form-group col-sm-4 {{ $errors->has('category_id') ? ' has-error' : '' }} ">

                    {{ Form::label('category_id', trans('Select  Vehicle category')) }}

                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Vehicle category."  name="category_id">
     <option value="">  </option>
     @foreach($categories as $user)

     <option value="{{ $user->id }}"  >{{ $user->cat_name  }}</option>
     @endforeach
</select>

 @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif

            </div>
            </div>

 <div class="row">

                      <div class="form-group col-sm-3 {{ $errors->has('year_model') ? ' has-error' : '' }} ">
                        {{ Form::label('year_model', trans('Year of manufature/model')) }}
                         {{ Form::text('year_model',null, array('class' => 'form-control')) }}

                                @if ($errors->has('year_model'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year_model') }}</strong>
                                    </span>
                                @endif
                      </div>

        <div class="form-group col-sm-2 {{ $errors->has('no_plate') ? ' has-error' : '' }} ">
                        {{ Form::label('no_plate', trans('Car number plate')) }}
                         {{ Form::text('no_plate',null, array('class' => 'form-control')) }}

                                @if ($errors->has('no_plate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_plate') }}</strong>
                                    </span>
                                @endif
                      </div>
     <div class="form-group col-sm-2 {{ $errors->has('color') ? ' has-error' : '' }} ">
                        {{ Form::label('color', trans('Color')) }}
                         {{ Form::text('color',null, array('class' => 'form-control')) }}

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                      </div>
                   <div class="form-group col-sm-3 {{ $errors->has('passengers') ? ' has-error' : '' }} ">
                        {{ Form::label('passengers', trans('Number of passengers')) }}
                         {{ Form::text('passengers',null, array('class' => 'form-control')) }}

                                @if ($errors->has('passengers'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passengers') }}</strong>
                                    </span>
                                @endif
                      </div>

                  <div class="form-group col-sm-2 {{ $errors->has('tracker') ? ' has-error' : '' }} ">

                    {{ Form::label('tracker', trans(' Tracker Status')) }}
                    <br>
                      <label class="radio-inline">
    <input type="radio" id="No" name="tracker" value="0">No</label>

    <label class="radio-inline">
    <input type="radio" id="Yes" name="tracker" value="1">Yes</label>


 @if ($errors->has('tracker'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tracker') }}</strong>
                                    </span>
                                @endif

            </div>

 </div>


  <div class="row">

                      <div class="form-group col-sm-2 {{ $errors->has('transimition') ? ' has-error' : '' }} ">

                    {{ Form::label('transimition', trans('Transmission')) }}


                     <br>
                      <label class="radio-inline">
    <input type="radio" id="Auto" name="transimition" value="Auto">Auto</label>

    <label class="radio-inline">
    <input type="radio" id="Manual" name="transimition" value="Manual">Manual</label>

 @if ($errors->has('transimition'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transimition') }}</strong>
                                    </span>
                                @endif

            </div>


       <div class="form-group col-sm-3 {{ $errors->has('insurance_type') ? ' has-error' : '' }} ">

                    {{ Form::label('insurance_type', trans('Insurance')) }}


                    <br>
                      <label class="radio-inline">
    <input type="radio" id="Comprehensive" name="insurance_type" value="Comprehensive">Comprehensive</label>

    <label class="radio-inline">
    <input type="radio" id="Third party" name="insurance_type" value="Third party">Third party</label>




 @if ($errors->has('insurance_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('insurance_type') }}</strong>
                                    </span>
                                @endif

            </div>

            <div class="form-group col-sm-3 {{ $errors->has('insurance_expiry') ? ' has-error' : '' }} ">
                        {{ Form::label('insurance_expiry', trans('Insurance Expiry Date')) }}
                         {{ Form::text('insurance_expiry',null, array('class' => 'form-control datepicker')) }}

                                @if ($errors->has('insurance_expiry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('insurance_expiry') }}</strong>
                                    </span>
                                @endif
                      </div>
                <div class="form-group col-sm-3 {{ $errors->has('location') ? ' has-error' : '' }} ">

                    {{ Form::label('location', trans('Select  Vehicle Location')) }}

                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Vehicle category."  name="location">
     <option value="">  </option>
     @foreach($locations as $record)

     <option value="{{ $record->id }}"  >{{ $record->location_name  }}</option>
     @endforeach
</select>

 @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif

            </div>


 </div>

 <div class="row">






            <div class="form-group col-sm-12 {{ $errors->has('category_id') ? ' has-error' : '' }} ">

                    {{ Form::label('category_id', trans('Vehicle Features')) }}

                     <select multiple class="chosen-select form-control " name="features[]">

                     @foreach($features as $user)

     <option value="{{ $user->id }}" >{{ $user->feature_name  }}</option>
     @endforeach
                 </select>

 @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif

            </div>
            </div>


 <div class="row">

                      <div class="form-group col-sm-12 {{ $errors->has('vehicle_desc') ? ' has-error' : '' }} ">
                        {{ Form::label('vehicle_desc', trans('Description')) }}
                         {{ Form::textarea('vehicle_desc',null, array('class' => 'form-control')) }}

                                @if ($errors->has('vehicle_desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicle_desc') }}</strong>
                                    </span>
                                @endif
                      </div>
 </div>




                 <div class="form-group ">
                        <div class=" col-sm-12">
                         {{ Form::submit(trans('Save'), array('class' => 'btn btn-primary')) }}

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
	$(document).ready(function() {
	  //Date picker
	  $('.datepicker').datepicker({
	    autoclose: true,
			format: 'yyyy-mm-dd',
	  });

	});

	</script>
@endsection
