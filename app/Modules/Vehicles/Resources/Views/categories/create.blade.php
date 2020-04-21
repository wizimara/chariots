@extends('shared::layouts.app')

@section('content')


<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Vehicle Categories
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Create a new Category
								</small> |
							<a href="{{ url('/admin/vehicles/categories') }}" class="btn btn-primary btn-xs ">Back</a>

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
                   {{ Form::open(array('route' => 'categories.store')) }}
                    <div class="row">

                      <div class="form-group col-sm-12 {{ $errors->has('cat_name') ? ' has-error' : '' }} ">
                        {{ Form::label('cat_name', 'Category Name')) }}
                        {{ Form::text('cat_name',null, array('class' => 'form-control')) }}
                        @if ($errors->has('cat_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cat_name') }}</strong>
                                    </span>
                                @endif
                        {{ Form::label('category_image', 'Category Image Url')) }}
                        {{ Form::text('category_image',null, array('class' => 'form-control')) }}

                                @if ($errors->has('category_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_image') }}</strong>
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
