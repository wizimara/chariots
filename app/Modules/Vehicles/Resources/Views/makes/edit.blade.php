

@extends('shared::layouts.app')
@section('title','Makes')
@section('content')

  
  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Make
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->make_name}}
								</small> | 
							<a href="{{ url('/admin/vehicles/makes') }}" class="btn btn-primary btn-xs ">Back</a>

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

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('makes.update', $item->id))) }}


<div class="row">

                      <div class="form-group col-sm-12 {{ $errors->has('make_name') ? ' has-error' : '' }} ">
                        {{ Form::label('make_name', trans('Name')) }}
                         {{ Form::text('make_name',null, array('class' => 'form-control')) }}
                         
                                @if ($errors->has('make_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('make_name') }}</strong>
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
		

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
  



































@stop














