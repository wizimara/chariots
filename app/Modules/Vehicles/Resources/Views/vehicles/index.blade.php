

@extends('shared::layouts.app')
@section('title','Vehicles')

@section('content')




<div class="main-content-inner">


					<div class="page-content">

						<section class="content-header">
							<h1>
								Vehicles
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									All Vehicles
								</small> |
							<a href="{{ url('/admin/vehicles/vehicles/create') }}" class="btn btn-primary btn-xs ">Add new Vehicle</a>

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
						<h3 class="box-title">Vehicles</h3>
					</div>

					<!-- /.box-header -->

					<div class="box-body">


                                    @if ($items->count())
                          <table id="dynamic-table" class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                                                       <th style="width:8%"></th>
														<th>Name</th>
														<th>Model</th>
														<th>Make</th>
                                                        <th>Category</th>
                                                        <th>Year</th>
                                                        <th>Plate</th>
<th>Color</th>
<th>Seater</th>

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
 <?php  $image = App\Modules\Vehicles\models\Carimage::
        where('vehicle_id', $record->id)->
		where('featured', 1)->get()->first();

		$image2 = App\Modules\Vehicles\models\Carimage::
        where('vehicle_id', $record->id)->get()->first();

		?>

     @if(!empty($image))

<td><img src="{{asset('/')}}/{{$image->url }}" class="img" ></td>
@elseif(!empty($image2))
<td><img src="{{asset('/')}}/{{$image2->url }}" class="img" ></td>

@else
<td><img src="{{asset('/')}}/car.jpg" class="img" ></td>
@endif

<td>{{ $record->vehicle_name}}</td>
<td>{{ $record->model_name}}</td>
<td>{{ $record->make_name}}</td>
<td>{{ $record->cat_name}}</td>
<td>{{ $record->year_model}}</td>
<td>{{ $record->no_plate}}</td>
<td>{{ $record->color}}</td>
<td>{{ $record->passengers}}</td>


                                                        <td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>

														<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>



														<td>
															<div class="hidden-sm hidden-xs action-buttons">


                                                              {{ link_to_route('vehicles.edit', trans('Edit'), array($record->id), array('class' => 'btn btn-info btn-xs')) }}



              @if ($record->name=="client" or $record->name=="Admin" or $record->name=="user" )

              @elseif($record->name=="Admin")

              @else
       {{Form::open(array(
    'route' => array( 'vehicles.destroy', $record->id ),
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

												<tfoot>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                                                       <th style="width:8%"></th>
														<th>Name</th>
														<th>Model</th>
														<th>Make</th>
                                                        <th>Category</th>
                                                        <th>Year</th>
                                                        <th>Plate</th>
<th>Color</th>
<th>Seater</th>

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
												</tfoot>


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

<script>
$(document).ready(function(){
    $('#dynamic-table').DataTable();
});
</script>
<style>
 .img{ width:100%; height:auto; box-shadow:0px 0px 3px #ccc}

 </style>

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
