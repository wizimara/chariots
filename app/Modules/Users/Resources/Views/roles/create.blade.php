@extends('shared::layouts.app')
@section('title','Roles')
@section('content')


	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper1" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      User  Roles
        <small> |
			<a href="{{ route('roles.index') }}" class="btn btn-primary btn-xs ">Back</a></small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->

				@include('flash::message')
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add a Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::open(array('route' => 'roles.store','role'=>'form','class'=>'form-horizontal1')) }}
              <div class="box-body">

                <div class="row">

                                      <div class="form-group col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }} ">
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
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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
