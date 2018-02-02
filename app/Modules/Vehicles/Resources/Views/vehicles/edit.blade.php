

@extends('shared::layouts.app')
@section('title','Vehicles')
@section('content')

  
  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Vehicle
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->vehicle_name}}
								</small> | 
							<a href="{{ url('/admin/vehicles/vehicles') }}" class="btn btn-primary btn-xs ">Back</a>

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
								
            <div class="tile-body">

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('vehicles.update', $item->id))) }}


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
    
     <option value="{{ $user->id }}"  <?php if ($user->id == $item->model_id) echo ' selected="selected"'; ?>>{{ $user->model_name  }}</option>
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
    
     <option value="{{ $user->id }}" <?php if ($user->id == $item->make_id) echo ' selected="selected"'; ?> >{{ $user->make_name  }}</option>
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
    
     <option value="{{ $user->id }}" <?php if ($user->id == $item->category_id) echo ' selected="selected"'; ?> >{{ $user->cat_name  }}</option>
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
                         {{ Form::submit(trans('Edit'), array('class' => 'btn btn-primary')) }}
                  
                        </div>
                       
                        <br><br>
                      </div>



      
{{ Form::close() }}

<hr>
<h4> Car Images</h4>
 {{ Form::open(array('route' => 'carimages.store','files'=>'true')) }}
 {{ Form::hidden('vehicle_id',$item->id, array('class' => 'form-control')) }}
{{ Form::hidden('vehicle_name',$item->vehicle_name, array('class' => 'form-control')) }}
 <div class="row">

                      <div class="form-group col-sm-6 {{ $errors->has('url') ? ' has-error' : '' }} ">
                      {{ Form::label('url', trans('Select Image')) }}
   {{Form::file('url')}} 
   
    @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif

</div>

<div class="form-group col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }} ">
                        {{ Form::label('title', trans('Title')) }}
                         {{ Form::text('title',null, array('class' => 'form-control')) }}
                         
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                      </div>

</div>
 {{ Form::submit(trans('Upload Image'), array('class' => 'btn btn-primary')) }}
 {{ Form::close() }}

<style>
 .img{ width:100%; height:auto; box-shadow:0px 0px 3px #ccc}
 
 </style>
 <hr>
  <div class="row" style="margin-top:20px">
  @if ($images->count())
  
  @foreach ($images as $record)
    <div class=" col-sm-3 col " style="height:260px">
    <img src="{{asset('/')}}/storage/app/{{$record->url }}" class="img" >
    {{ $record->title }}
    
    
															@if($record->featured=="1")

<span class="label label-sm label-success"><i class="ace-icon glyphicon glyphicon-ok"></i>&nbsp;Featured</span>



@else
<a href="{{ url('/admin/vehicles/carimages/'.$record->id.'/published') }}"><span class="label label-sm label-danger"><i class="ace-icon glyphicon glyphicon-ok"></i> &nbsp;Feature</span></a>

@endif
<br>
  {{Form::open(array( 
    'route' => array( 'carimages.destroy', $record->id ), 
    'method' => 'delete', 
    'style' => 'display:inline',
    'onsubmit' => "return confirm('Are you sure you want to delete this Image? ')",
))}}

<button class="btn btn-danger btn-xs " style="float:right">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</button>

{{Form::close()}}   


    
    </div>
  
   @endforeach 
 
  @else
    @lang('No Images Uploaded')
@endif
  
  
  </div>

</div>
	
    
    
    	

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
  



































@stop














