@extends('shared::layouts.app')
@section('title','Users')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper1">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Users

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
              <h3 class="box-title">Add a User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::open(array('route' => 'users.store','role'=>'form','class'=>'form-horizontal1')) }}
              <div class="box-body">
								{{ csrf_field() }}
                      <div class="row">
	                        <div class=" col-md-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="name" class=" control-label">Name</label>
	                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                        </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-6">
                                                    <label for="roles" class="control-label">User Role</label>
                                                        <select  class="select2 form-control " name="role">
                                                          @foreach($roles as $row)
                                                       <option value="{{ $row->id }}">{{ $row->name  }}</option>
                                                       @endforeach
                                                       </select>
                                                    </div>
                                                </div>
                      <div class="row">
	                        <div class=" col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="control-label">E-Mail Address</label>
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                        </div>
                        </div>
                       <div class="row">
	                        <div class=" col-md-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class=" control-label">Password</label>
	                                <input id="password" type="password" class="form-control" name="password">
	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>

	                        <div class="col-md-3 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                            <label for="password-confirm" class=" control-label">Confirm Password</label>
	                                <input id1="password-confirm" type="password" class="form-control" name="password_confirmation">

	                                @if ($errors->has('password_confirmation'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                    </span>
	                                @endif
	                        </div>
                          </div>
                          <div class="row">
                          <div class="form-group col-sm-3 {{ $errors->has('status') ? ' has-error' : '' }} ">
<br>
                                <label for="password-confirm" class=" control-label">Status</label><br>
                                  <label class="radio-inline">
                            <input type="radio" id="Active" name="user_status" value="1">Active</label>

                            <label class="radio-inline">
                            <input type="radio" checked="checked" id="Pending" name="user_status" value="2">Pending</label>
  <label class="radio-inline">
                            <input type="radio" id="Deactive" name="user_status" value="0">Deactive</label>
                            @if ($errors->has('status'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('status') }}</strong>
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
    @section('js')
    @parent
    <script>
    $(function () {
    $('.select2').select2();
    })
    </script>
    @stop
