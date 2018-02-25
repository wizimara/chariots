@extends('shared::layouts.app')

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
								Vehicle Models
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Create a new Models
								</small> |
							<a href="{{ url('/admin/vehicles/models') }}" class="btn btn-primary btn-xs ">Back</a>

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
                   {{ Form::open(array('route' => 'models.store')) }}
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


                   <div class="form-group col-sm-6 {{ $errors->has('make_id') ? ' has-error' : '' }} ">

                    {{ Form::label('make_id', trans('Select  Car Make')) }}

                        <select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="make_id">
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
