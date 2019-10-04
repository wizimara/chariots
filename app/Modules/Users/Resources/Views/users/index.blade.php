@extends('shared::layouts.app')
@section('title','Users')

@section('content')


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper1">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Users
				<small> |
			<a href="{{ url('/admin/users/users/create') }}" class="btn btn-primary btn-xs ">Add new User</a></small>
			</h1>

		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-112">
					<!-- general form elements -->
@include('flash::message')
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Users</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->



							<div class="box-body">


								@if ($users->count())

							                                            <table id="example1" class="table table-striped table-bordered table-hover">
																			<thead>
																				<tr>
<th>Status</th>
																					<th>Name</th>
<th>Email</th>

<th>Role</th>

																					<th>
																						<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																					Created
																					</th>

							                                                        <th>
																						<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																						Update
																					</th>

																					<th></th>
																				</tr>
																			</thead>

																			<tbody>


							                                         @foreach ($users as $record)

																				<tr>

<td>
@if($record->user_status==1)
<span class="label label-success ">  <i class="ace-icon fa fa-check bigger-130"></i> Active</span>
@elseif($record->user_status==2)
<span class="label label-warning ">  <i class="ace-icon fa fa-check bigger-130"></i> Pending</span>
@else
<span class="label label-danger ">  <i class="ace-icon fa fa-check bigger-130"></i> Deactive</span>
@endif
	</td>
																					<td>{{ $record->name}}</td>
																					<td>{{ $record->email}}</td>

<td>{{ $record->role->name??"no role"}}</td>
							                                                        <td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>

																					<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>



																					<td>
																						<div class="hidden-sm hidden-xs action-buttons">




							                                                              {{ link_to_route('users.edit', trans('Edit'), array($record->id), array('class' => 'btn btn-info btn-xs')) }}


                           @if($record->id ==1)
													 @else
							       {{Form::open(array(
							    'route' => array( 'users.destroy', $record->id ),
							    'method' => 'delete',
							    'style' => 'display:inline',
							    'onsubmit' => "return confirm('Are you sure you want to delete this row? ')",
							))}}

							<button class="btn btn-danger btn-xs ">
																			<i class="ace-icon fa fa-trash-o bigger-130"></i>
																		</button>

							{{Form::close()}}
                 @endif
																						</div>


																					</td>
																				</tr>

							                                                    @endforeach


																			</tbody>


																		</table>


							                                            @else
							    @lang('no data')
							@endif

							</div>
							<!-- /.box-body -->

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
    $('#example1').DataTable()
    $('#dynamic-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>



@endsection
