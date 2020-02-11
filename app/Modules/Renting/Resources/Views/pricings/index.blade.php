@extends('shared::layouts.app')
@section('title','Vehicle Pricings')
@section('content_header')
<style>
 .img{ width:100%; height:auto; box-shadow:0px 0px 3px #ccc}
 </style>
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Pricings</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">pricings</li>
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
            <h5 class="card-title">All Vehicle Pricings</h5>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-plus"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="{{route('pricings.create')}}" class="dropdown-item" >New Pricing</a>
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
															<th>Vehicle</th>
															<th>Client</th>
															<th>Daily Rate</th>
															<th>Driver Daily Rate</th>
															<th>SelfDriver Daily Rate</th>
															<th>Discout</th>
															<th>Delivery Cost</th>
																<th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

													      @foreach ($items as $record)
			                            <tr>
																		<td>{{$record->car->no_plate.' / '. $record->car->car_model->model_name .' / '.$record->car->car_model->car_make->make_name.' / '.$record->car->car_category->cat_name}}</td>
																		<td>{{$record->name }} </td>
																		<td>{{number_format($record->dailyrate,0) }} </td>
																		<td>{{number_format($record->dailydriverrate,0) }} </td>
																		<td>{{number_format($record->selfdrive,0) }} </td>
																		<td>{{number_format($record->discount,0)}} </td>
																		<td>{{number_format($record->costofdelivery,0) }} </td>
																				<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>
																				<td>
																					   <div class="hidden-sm hidden-xs action-buttons">
																							  <a title="Edit" href="{{route('pricings.edit',$record->id)}}"><i class="fas fa-edit"></i></a>
																								<a title="Delete" onclick="return confirm('Are you sure you want to delete this Pricing')" href="{{route('pricings.delete',$record->id)}}"><span style="color:tomato"><i class="fas fa-trash-alt"></i></span></a>
							                                </div>
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
