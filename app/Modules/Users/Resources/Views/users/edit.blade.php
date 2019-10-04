@extends('shared::layouts.app')
@section('title','Users')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper1">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Edit {{$user->name}}

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
<span class="label label-warning ">   Updated {{ $diffs = Carbon\Carbon::parse($user->updated_at)->diffForHumans() }} </span>   &nbsp
<span class="label label-success ">   Created {{ $diffs = Carbon\Carbon::parse($user->created_at)->diffForHumans() }} </span>    &nbsp
</p>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id),'role'=>'form','class'=>'form-horizontal1')) }}
<div class="box-body">
              <div class="row">


                        <div class="form-group col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                       {{ Form::label('name', trans('Username')) }}
                       {{ Form::text('name', $user->name, array('class' => 'form-control')) }}

                          @if ($errors->has('name'))
                                               <span class="help-block">
                                                   <strong>{{ $errors->first('name') }}</strong>
                                               </span>
                                           @endif
                        </div>
                   </div>

                   <div class="row">
                           <div class="form-group col-sm-6">
                                          {{ Form::label('role', trans('User Role')) }}
                                          <select  class="select2 form-control " name="role_id">

                                          @foreach($roles as $row)
            <option value="{{ $row->id }}" @if ($row->id==$user->role_id) selected @endif >{{ $row->name }} </option>
                                          @endforeach
                                          </select>

                                         </div>
                         </div>


           <div class="row">
                      <div class="form-group col-sm-6 {{ $errors->has('email') ? ' has-error' : '' }} ">

                       {{ Form::label('email', trans('Email')) }}
                       {{ Form::text('email',$user->email, array('class' => 'form-control')) }}
                          @if ($errors->has('email'))
                                               <span class="help-block">
                                                   <strong>{{ $errors->first('email') }}</strong>
                                               </span>
                                           @endif
                        </div>
                        </div>


                        <div class="row">
                           <div class=" col-md-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                               <label for="password" class=" control-label">New Password</label>
                                   <input id="password" type="password" class="form-control" name="password" value="">
                                   @if ($errors->has('password'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                   @endif
                               </div>

                           <div class="col-md-3 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                               <label for="password-confirm" class=" control-label">Confirm Password</label>
                                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="">

                                   @if ($errors->has('password_confirmation'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                                       </span>
                                   @endif
                           </div>
                           </div>

                           <div class="row">

                         <div class="form-group col-md-3 {{ $errors->has('user_status') ? ' has-error' : '' }} ">

                         {{ Form::label('user_status', trans('Status')) }}
                         <br>
                         <label class="radio-inline">
                         {!! Form ::radio('user_status',1,($user->user_status == 1 ? true : false)) !!}
                         Active
                         </label>
                         <label class="radio-inline">
                         {!! Form ::radio('user_status',0,($user->user_status == 0 ? true : false)) !!}
                         Deactive
                         </label>
                         <label class="radio-inline">
                         {!! Form ::radio('user_status',2,($user->_user_status == 2 ? true : false)) !!}
                         Pending
                         </label>


                         @if ($errors->has('user_status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_status') }}</strong>
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
