@extends('shared::layouts.app')
@section('title','Vehicles')
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
    
     <option value="{{ $user->id }}"  >{{ $user->model_name  }}</option>
     @endforeach
</select>

 @if ($errors->has('model_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model_id') }}</strong>
                                    </span>
                                @endif

            </div>
            
            
            <div class="form-group col-sm-4 {{ $errors->has('make_id') ? ' has-error' : '' }} ">
                   
                    {{ Form::label('make_id', trans('Select  Vehicle make')) }}
                    
                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Vehicle make."  name="make_id">
     <option value="">  </option>
     @foreach($makes as $user)
    
     <option value="{{ $user->id }}"  >{{ $user->make_name  }}</option>
     @endforeach
</select>

 @if ($errors->has('make_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('make_id') }}</strong>
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
                   
                    {{ Form::label('tracker', trans('Select  Tracker Status')) }}
                    
                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Vehicle make."  name="tracker">
     <option value="0">No  </option>
    
    
     <option value="1"  >Yes</option>
  
</select>

 @if ($errors->has('tracker'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tracker') }}</strong>
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
		

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>





@stop