

@extends('shared::layouts.app')
@section('title','Locations')
@section('content')


  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Location
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->location_name}}
								</small> |
							<a href="{{ url('/admin/vehicles/locations') }}" class="btn btn-primary btn-xs ">Back</a>

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

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('locations.update', $item->id))) }}


<div class="row">

                      <div class="form-group col-sm-12 {{ $errors->has('location_name') ? ' has-error' : '' }} ">
                        {{ Form::label('location_name', trans('Name')) }}
                         {{ Form::text('location_name',null, array('class' => 'form-control')) }}

                                @if ($errors->has('location_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location_name') }}</strong>
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
