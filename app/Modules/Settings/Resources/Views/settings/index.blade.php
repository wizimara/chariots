

@extends('shared::layouts.app')
@section('title','Settings')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Settings</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">settings</li>
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
            <h5 class="card-title">All Settings</h5>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-plus"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="#modal-default" class="dropdown-item" data-toggle="modal">New Setting</a>
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
		                          <th>Value</th>
		                          <th>Description</th>
																<th>	<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Created</th>
																<th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

													      @foreach ($settings as $record)
			                            <tr>
																		<td>{{ $record->key_name}}</td>
																		<td>{{ $record->key_value}}</td>
																		<td>{{ $record->key_desc}}</td>
																				<td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>
																				<td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>
																				<td>
																					   <div class="hidden-sm hidden-xs action-buttons">
																							  <a title="Edit" href="#" data-id="{{$record->id}}" data-key_name="{{$record->key_name}}" data-key_value="{{$record->key_value}}" data-key_desc="{{$record->key_desc}}" data-toggle="modal"  data-target="#editModal"><i class="fas fa-edit"></i></a>
																								<a title="Delete" onclick="return confirm('Are you sure you want to delete this Setting')" href="{{route('settings.delete',$record->id)}}"><span style="color:tomato"><i class="fas fa-trash-alt"></i></span></a>
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
              <h4 class="modal-title">Add  Setting</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
              <form role="form" action="{{route('settings.store')}}" method="POST" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="exampleInputEmail1">Key Name</label>
                        <input type="text"  name="key_name" value="{{old('key_name')}}" class="form-control {{ $errors->has('key_name') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Key Name"  >
                        @if ($errors->has('key_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('key_name') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-12 ">
                        <label for="exampleInputEmail1">Key Value</label>
                        <input type="text"  name="key_value" value="{{old('key_value')}}" class="form-control {{ $errors->has('key_value') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Key Value"  >
													@if ($errors->has('key_value'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('key_value') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-12 ">
												<label for="exampleInputEmail1">Description</label>
												<textarea class="form-control {{ $errors->has('key_desc') ? ' is-invalid' : '' }}" name="key_desc" cols="50" rows="4" id="key_desc" placeholder="Description">{{old('key_desc')}}</textarea>
													@if ($errors->has('key_desc'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('key_desc') }}</strong>
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
              <h4 class="modal-title">Edit  Setting</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
              <form role="form" action="{{route('settings.update','hhh')}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}
              <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                  <input type="hidden" name="id" id="Id">
                  </div>
										<div class="form-group col-md-12 ">
												<label for="exampleInputEmail1">Key Name</label>
												<input type="text"  name="key_name" value="{{old('key_name')}}" class="form-control {{ $errors->has('key_name') ? ' is-invalid' : '' }}" id="Name" placeholder="Enter Key Name"  >
												@if ($errors->has('key_name'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('key_name') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-12 ">
												<label for="exampleInputEmail1">Key Value</label>
												<input type="text"  name="key_value" value="{{old('key_value')}}" class="form-control {{ $errors->has('key_value') ? ' is-invalid' : '' }}" id="Value" placeholder="Enter Key Value"  >
													@if ($errors->has('key_value'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('key_value') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-12 ">
												<label for="exampleInputEmail1">Description</label>
												<textarea class="form-control {{ $errors->has('key_desc') ? ' is-invalid' : '' }}" name="key_desc" cols="50" rows="4" id="Desc" placeholder="Description">{{old('key_desc')}}</textarea>
													@if ($errors->has('key_desc'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('key_desc') }}</strong>
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
					var Name = button.data('key_name') // Extract info from data-* attributes
          var Value = button.data('key_value')
					var Desc = button.data('key_desc')
					var Id = button.data('id')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #Id').val(Id)
					modal.find('.modal-body #Name').val(Name)
					modal.find('.modal-body #Value').val(Value)
					modal.find('.modal-body #Desc').val(Desc)
				});
  })
</script>
@endsection
