

@extends('shared::layouts.app')
@section('title','Makes')

@section('content')




<div class="main-content-inner">


					<div class="page-content">


												<section class="content-header">
													<h1>
														Makes
														<small>
															<i class="ace-icon fa fa-angle-double-right"></i>
															All Makes
														</small> |
													<a href="{{ url('/admin/vehicles/makes/create') }}" class="btn btn-primary btn-xs ">Add new Make</a>

													</h1>
												<br>
														</section>
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->


								<div class="row">
									<div class="col-xs-12">


										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>



       @if(Session::has('flash_message'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i><em> {!! session('flash_message') !!}</em></div>
@endif

<!-- box table -->
<div class="box">
					<div class="box-header">
						<h3 class="box-title">Makes</h3>
					</div>

					<!-- /.box-header -->

					<div class="box-body">


                                    @if ($items->count())








                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>

														<th>Name</th>



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


                                         @foreach ($items as $record)

													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>




														<td>{{ $record->make_name}}</td>

                                                        <td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>

														<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>



														<td>
															<div class="hidden-sm hidden-xs action-buttons">


                                                              {{ link_to_route('makes.edit', trans('Edit'), array($record->id), array('class' => 'btn btn-info btn-xs')) }}



              @if ($record->name=="client" or $record->name=="Admin" or $record->name=="user" )

              @elseif($record->name=="Admin")

              @else
       {{Form::open(array(
    'route' => array( 'makes.destroy', $record->id ),
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
<!-- table box--> <!-- /.box -->


										</div>
									</div>
								</div>



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>




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
