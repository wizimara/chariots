@extends('shared::layouts.app')
@section('title','Roles')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper1">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Edit {{$role->role_name}}
        <small> |
      <a href="{{ url('/admin/users/roles') }}" class="btn btn-primary btn-xs ">Back</a></small>
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
<span class="label label-warning ">   Updated {{ $diffs = Carbon\Carbon::parse($role->updated_at)->diffForHumans() }} </span>   &nbsp
<span class="label label-success ">   Created {{ $diffs = Carbon\Carbon::parse($role->created_at)->diffForHumans() }} </span>    &nbsp
</p>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::model($role, array('method' => 'PATCH', 'route' => array('roles.update', $role->id),'role'=>'form','class'=>'form-horizontal1')) }}
<div class="box-body ">
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

   <div class="row">

              <div class="form-group col-sm-12 {{ $errors->has('permission_id') ? ' has-error' : '' }} ">

                      {{ Form::label('permission_id', trans('Permissions')) }}

                       <select multiple="multiple" class="select2 form-control " name="permissions[]">
                       @php
                    	$current_permissions = $role->permissions()->pluck('id')->all();
//
                       @endphp
                       @foreach($permissions as $user)

       <option value="{{ $user->id }}" @if(in_array($user->id, $current_permissions)) selected @endif >{{ $user->name  }}</option>
       @endforeach
                   </select>


   @if ($errors->has('permission_id'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('permission_id') }}</strong>
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
  @section('js')
  <style>

  }
</style>
   @parent
    <script>
       $(document).ready(function() {
      $('.select2').select2();
$('div.alert').not('.alert-danger').delay(10000).fadeOut(350);
    });
    </script>
  @stop

  @stop
