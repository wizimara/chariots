

@extends('shared::layouts.app')
@section('title','Payments')

@section('content')

<div class="main-content-inner">


					<div class="page-content">


						<section class="content-header">
						      <h1>
						       Payments |
						        <small><a href="{{ url('/admin/renting/payments/create') }}" class="btn btn-primary btn-xs ">Add new Payment </a>
</small>
						      </h1>
<br>
						    </section>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->


								<div class="row">
									<div class="col-xs-12">

										<div>

       @if(Session::has('flash_message'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i><em> {!! session('flash_message') !!}</em></div>
@endif


 <!-- box table -->
<div class="box">
					 <div class="box-header">
						 <h3 class="box-title">Payments</h3>
					 </div>

					 <!-- /.box-header -->

					 <div class="box-body">
						 @if ($items->count())
						 <table id="example1" class="table table-bordered table-striped">
							 <thead>
								 <tr>
	 								<th class="center" width="10">

	 								</th>

	 								<th>Vehicle</th>
	 								<th>Client</th>
	 								<th>Amount paid</th>
	 								<th>Balance</th>
	 								<th>Payment Method</th>

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




 	 <td>{{ $record->model_name .' '. $record->make_name.' '.$record->cat_name}}</td>
 <td>{{$record->name }} </td>
 	 <td>
		 {{number_format($record->amount_paid,0) }}
 		 </td>


 <td> {{number_format($record->balance,0) }}</td>
 <td>{{$record->payment_gateway }} </td>


 															 <td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>

 	 <td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>



 	 <td>
 		 <div class="hidden-sm hidden-xs action-buttons">


 																		 {{ link_to_route('payments.edit', trans('Edit'), array($record->id), array('class' => 'btn btn-info btn-xs')) }}



 @if ($record->name=="client" or $record->name=="Admin" or $record->name=="user" )

 @elseif($record->name=="Admin")

 @else
 {{Form::open(array(
 'route' => array( 'payments.destroy', $record->id ),
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
									 <th class="center" width="10">

	 								</th>

	 								<th>Vehicle</th>
	 								<th>Client</th>
	 								<th>Amount paid</th>
	 								<th>Balance</th>
	 								<th>Payment Method</th>

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

@stop
@section('js')
  @parent
<script>
$(function () {
    $('#example1').DataTable()
    $('#dynamic-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>



@endsection
