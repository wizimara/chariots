

@extends('shared::layouts.app')
@section('title','Categories')
@section('content')

  
  <div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Edit Category
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$cat->cat_name}}
								</small> | 
							<a href="{{ url('/admin/vehicles/categories') }}" class="btn btn-primary btn-xs ">Back</a>

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

{{ Form::model($cat, array('method' => 'PATCH', 'route' => array('categories.update', $cat->id))) }}


<div class="row">

                      <div class="form-group col-sm-12 {{ $errors->has('cat_name') ? ' has-error' : '' }} ">
                        {{ Form::label('cat_name', trans('Name')) }}
                         {{ Form::text('cat_name',null, array('class' => 'form-control')) }}
                         
                                @if ($errors->has('cat_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cat_name') }}</strong>
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














