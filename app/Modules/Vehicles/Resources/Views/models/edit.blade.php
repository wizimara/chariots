

@extends('shared::layouts.app')
@section('title','Models')
@section('content')


  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Model
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$item->model_name}}
								</small> |
							<a href="{{ url('/admin/vehicles/models') }}" class="btn btn-primary btn-xs ">Back</a>

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

{{ Form::model($item, array('method' => 'PATCH', 'route' => array('models.update', $item->id))) }}


<div class="row">

                      <div class="form-group col-sm-6 {{ $errors->has('model_name') ? ' has-error' : '' }} ">
                        {{ Form::label('model_name', trans('Name')) }}
                         {{ Form::text('model_name',null, array('class' => 'form-control')) }}

                                @if ($errors->has('model_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model_name') }}</strong>
                                    </span>
                                @endif
                      </div>


                      <div class="form-group col-sm-4 {{ $errors->has('make_id') ? ' has-error' : '' }} ">

                    {{ Form::label('make_id', trans('Select  Car Make')) }}

                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car make."  name="make_id">
     <option value="">  </option>
     @foreach($makes as $user)

     <option value="{{ $user->id }}"  <?php if ($user->id == $item->make_id) echo ' selected="selected"'; ?>>{{ $user->make_name  }}</option>
     @endforeach
</select>

 @if ($errors->has('make_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('make_id') }}</strong>
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
