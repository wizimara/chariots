@extends('shared::layouts.app')
@section('title','Settings')
@section('content')


<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Settings
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Create a new Setting
								</small> |
							<a href="{{ url('/admin/settings/settings') }}" class="btn btn-primary btn-xs ">Back</a>

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
<div class=" page box">
            <div class="tile-body">
                   {{ Form::open(array('route' => 'settings.store')) }}
                    <div class="row">
											  <div class="form-group col-sm-6 {{ $errors->has('key_name') ? ' has-error' : '' }} ">
                        {{ Form::label('key_name', trans('Key Name')) }}
                         {{ Form::text('key_name',null, array('class' => 'form-control')) }}

                                @if ($errors->has('key_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('key_name') }}</strong>
                                    </span>
                                @endif
                      </div>
 </div>

 <div class="row">
		 <div class="form-group col-sm-6 {{ $errors->has('key_value') ? ' has-error' : '' }} ">
		 {{ Form::label('key_value', trans('Key Value')) }}
			{{ Form::text('key_value',null, array('class' => 'form-control')) }}

						 @if ($errors->has('key_value'))
								 <span class="help-block">
										 <strong>{{ $errors->first('key_value') }}</strong>
								 </span>
						 @endif
	 </div>
</div>
<div class="row">
		<div class="form-group col-sm-6 {{ $errors->has('key_desc') ? ' has-error' : '' }} ">
		{{ Form::label('key_desc', trans('Key Description')) }}
		 {{ Form::text('key_desc',null, array('class' => 'form-control')) }}

						@if ($errors->has('key_value'))
								<span class="help-block">
										<strong>{{ $errors->first('key_desc') }}</strong>
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
