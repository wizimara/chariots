@extends('shared::layouts.app')
@section('title','Models')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Models</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">models</li>
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
            <h5 class="card-title">All Models</h5>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-plus"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="#modal-default" class="dropdown-item" data-toggle="modal">New Model</a>
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
                                <th>Name</th>
																<th>Make</th>
																<th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Created</th>
																<th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

													      @foreach ($items as $record)
			                            <tr>
				                                <td>{{ $record->model_name}} </td>
																				<td>{{ $record->car_make->make_name??'None'}}</td>
																				<td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>
																				<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>
																				<td>
																					   <div class="hidden-sm hidden-xs action-buttons">
																							  <a title="Edit" href="#" data-id="{{$record->id}}" data-model_name="{{$record->model_name}}" data-make_id="{{$record->make_id}}" data-toggle="modal"  data-target="#editModal"><i class="fas fa-edit"></i></a>
																								<a title="Delete" onclick="return confirm('Are you sure you want to delete this Model')" href="{{route('models.delete',$record->id)}}"><span style="color:tomato"><i class="fas fa-trash-alt"></i></span></a>
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

<!--add form -->
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add  Model</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
              <form role="form" action="{{route('models.store')}}" method="POST" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  name="model_name" value="{{old('model_name')}}" class="form-control {{ $errors->has('model_name') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Name"  >
                        @if ($errors->has('model_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('model_name') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-12">
							<label> Make</label><br>
							<select class="form-control select2 {{ $errors->has('make_id') ? ' is-invalid' : '' }}" name="make_id"  placeholder="Select Make" style="width:100%">
								<option value="">Select Client</option>
								@foreach($makes as $make)
										<option value="{{$make->id}}" @php echo old('make_id') == $make->id ? 'selected' :  "" @endphp>{{$make->make_name}}</option>
								@endforeach
							</select>
							@if ($errors->has('make_id'))
									<span class="invalid-feedback">
											<strong>{{ $errors->first('make_id') }}</strong>
									</span>
							@endif
				 </div>

                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
            </form>
          </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        <!---end add -->
				<!--edit form -->
        <div class="modal fade" id="editModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit  Model</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
              <form role="form" action="{{route('models.update','hhh')}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}
              <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                  <input type="hidden" name="id" id="Id">
                  </div>
									<div class="form-group col-md-12 ">
											<label for="exampleInputEmail1">Name</label>
											<input type="text"  name="model_name" value="{{old('model_name')}}" class="form-control {{ $errors->has('model_name') ? ' is-invalid' : '' }}" id="Name" placeholder="Enter Name"  >
											@if ($errors->has('model_name'))
													<span class="invalid-feedback">
															<strong>{{ $errors->first('model_name') }}</strong>
													</span>
											@endif
									</div>
									<div class="form-group col-md-12">
						<label> Make</label><br>
						<select id="Make" class="form-control select2 {{ $errors->has('make_id') ? ' is-invalid' : '' }}" name="make_id"  placeholder="Select Make" style="width:100%">
							<option value="">Select Make</option>
							@foreach($makes as $make)
									<option value="{{$make->id}}" @php echo old('make_id') == $make->id ? 'selected' :  "" @endphp>{{$make->make_name}}</option>
							@endforeach
						</select>
						@if ($errors->has('make_id'))
								<span class="invalid-feedback">
										<strong>{{ $errors->first('make_id') }}</strong>
								</span>
						@endif
			 </div>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
            </form>
          </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        <!---end edit -->


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

						$('#editModal').on('show.bs.modal', function (event) {
				 var button = $(event.relatedTarget) // Button that triggered the modal
					var Name = button.data('model_name') // Extract info from data-* attributes
					var Id = button.data('id')
					var MakeId = button.data('make_id')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #Id').val(Id)
					modal.find('.modal-body #Name').val(Name)
					modal.find('.modal-body #Make option[value="' + MakeId + '"]').attr("selected", "selected");
				});
  })
</script>
@endsection
