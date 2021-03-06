

@extends('shared::layouts.app')
@section('title','Makes')
@section('content')


  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Feature
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->feature_name}}
								</small> |
							<a href="{{ url('/admin/vehicles/features') }}" class="btn btn-primary btn-xs ">Back</a>

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

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('features.update', $item->id))) }}


<div class="row">

                      <div class="form-group col-sm-12 {{ $errors->has('feature_name') ? ' has-error' : '' }} ">
                        {{ Form::label('feature_name', trans('Name')) }}
                         {{ Form::text('feature_name',null, array('class' => 'form-control')) }}

                                @if ($errors->has('feature_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feature_name') }}</strong>
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
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>




































@stop
