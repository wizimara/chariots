@extends('shared::layouts.app')
@section('title','Permissions')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper1">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Permissions
				<small> |
			<a href="{{ url('/admin/users/permissions/create') }}" class="btn btn-primary btn-xs ">Add new Permission</a></small>
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
							<h3 class="box-title">Permissions</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->



							<div class="box-body">


								@if ($permissions->count())

							                                            <table id="example1" class="table table-striped table-bordered table-hover">
																			<thead>
																				<tr>

																					<th>Name</th>
	<th>Gaurd Name</th>


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


							                                         @foreach ($permissions as $record)

																				<tr>


																					<td>{{ $record->name}}</td>
	<td>{{ $record->guard_name}}</td>

							                                                        <td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>

																					<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>



																					<td>
																						<div class="hidden-sm hidden-xs action-buttons">


							                                                              {{ link_to_route('permissions.edit', trans('Edit'), array($record->id), array('class' => 'btn btn-info btn-xs')) }}






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
    });
			$('div.alert').not('.alert-danger').delay(10000).fadeOut(350);
  })
</script>



@endsection
