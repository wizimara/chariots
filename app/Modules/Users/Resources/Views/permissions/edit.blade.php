@extends('shared::layouts.app')
@section('title','Permissions')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper1">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Edit {{$permissions->name}}
        <small> |
      <a href="{{ url('/admin/users/permissions') }}" class="btn btn-primary btn-xs ">Back</a></small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->

        	@include('flash::message')
          <p>
<span class="label label-warning ">   Updated {{ $diffs = Carbon\Carbon::parse($permissions->updated_at)->diffForHumans() }} </span>   &nbsp
<span class="label label-success ">   Created {{ $diffs = Carbon\Carbon::parse($permissions->created_at)->diffForHumans() }} </span>    &nbsp
</p>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Permissions</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::model($permissions, array('method' => 'PATCH', 'route' => array('permissions.update', $permissions->id),'role'=>'form')) }}
<div class="box-body">
  <div class="row">

                        <div class="form-group col-sm-6{{ $errors->has('name') ? ' has-error' : '' }} ">
                          {{ Form::label('name', trans('Name')) }}
                           {{ Form::text('name',null, array('class' => 'form-control')) }}

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                        </div>



   </div>
  </div>

                  <div class="form-group ">
                   <div class=" col-sm-12">
                       {{ Form::submit(trans('Update'), array('class' => 'btn btn-primary')) }}

                   </div>

                    <br><br>

                   </div>
</div>
           {{ Form::close() }}

          </div>
          <!-- /.box -->


        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @stop
  @section('js')
  @parent
  <script>
  $(function () {
  $('div.alert').not('.alert-danger').delay(5000).fadeOut(350);
  $('.select2').select2();
  })
  </script>
  @stop
