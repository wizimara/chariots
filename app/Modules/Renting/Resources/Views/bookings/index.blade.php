@extends('shared::layouts.app')
@section('title','Vehicle Bookings')
@section('content_header')
<style>
 .img{ width:100%; height:auto; box-shadow:0px 0px 3px #ccc}
 </style>
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Bookings</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">bookings</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
					@if ($errors->any())
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
						   @foreach ($errors->all() as $error)
								  <li>{{ $error }}</li>
						   @endforeach
					</ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
        <div class="card">
            <div class="card-header">
            <h5 class="card-title">All Bookings</h5>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-plus"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="{{route('bookings.create')}}" class="dropdown-item" >New Booking</a>
										<a href="#" class="dropdown-item">delete selected</a>
                </div>
                </div>

            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                 <table id="example1" class="table table-bordered table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>

															<th>Status</th>
															<th>Vehicle</th>
															<th>Client</th>
															<th>Booking</th>
															<th>Start</th>
															<th>End</th>
															<th>Drive</th>
															<th>Days</th>
															<th> Amount</th>
																<th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

													      @foreach ($items as $record)
			                            <tr>
																		<td>@if($record->booking_status=='cancelled')
																		<span class="badge badge-danger ">  <i class="ace-icon fa fa-times bigger-130"></i>  Cancelled</span>

																		@elseif(in_array($record->id, $confirmed))
																		<span class="badge badge-success "><i class="ace-icon fa fa-check bigger-130"></i> confirmed</span>
																		@else
																		<span class="badge badge-warning "><i class="ace-icon fa fa-check bigger-130"></i> Booked</span>
																		@endif
																		</td>
																		<td>{{$record->vehicle_pricing->car->no_plate??'NONE'}}-{{$record->vehicle_pricing->car->car_model->model_name??'NONE'}} </td>


											            	<td>{{$record->client->name }} </td>
																		<td>{{$record->date_of_booking }} </td>
																		<td>{{$record->starting_date_of_use }} </td>
																		<td>{{$record->end_date_of_use }} </td>
																		<td>@if($record->driver_option==0)
																		Driver
																		@else
																		Self Drive
																		@endif </td>

																		<?php

																		$datetime1 = date_create($record->end_date_of_use);
																		$datetime2 = date_create($record->starting_date_of_use);
																		$interval = date_diff($datetime1, $datetime2);
																		$days=0;
																		if($interval->format('%a')==0)
																		{
																		$days=1;
																		}else
																		{
																		$days =$interval->format('%a')+1;

																		}

																		?>
																		<td>{{$days }} </td>
																		<td>{{number_format($record->totalcost,0) }} </td>
																				<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>
																				<td>
																					@if(in_array($record->id, $confirmed))

																				  @else
																					   <div class="hidden-sm hidden-xs action-buttons">
																							  <a title="Edit" href="{{route('bookings.edit',$record->id)}}"><i class="fas fa-edit"></i></a>
																								<a title="Delete" onclick="return confirm('Are you sure you want to delete this Booking')" href="{{route('bookings.delete',$record->id)}}"><span style="color:tomato"><i class="fas fa-trash-alt"></i></span></a>
							                                </div>
																					@endif
						                            </td>
					                        </tr>
																@endforeach
                        </tbody>
                    </table>
               </div>
            </div>
            <!-- /.row -->
            </div>
            <!-- ./card-body -->

            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@stop

@section('js')
  @parent
<script>
$(function () {
	var table = $('#example1').DataTable({
      responsive: false,
      dom: 'Blfrtip',
			"ordering": false,
      buttons: [
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: ':visible'
          }
        },
      'colvis',
        //'selectAll',
          //	'selectNone'
      ],
            });
  })
</script>
@endsection
