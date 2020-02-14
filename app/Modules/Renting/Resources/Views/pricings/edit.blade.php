


@extends('shared::layouts.app')
@section('title', 'Pricings')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><small><a href="{{route('pricings.index')}}" class="btn btn-info">Back</a></small> Pricings</h1>
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
          <p>
          <span class="badge badge-warning ">   Updated {{ $diffs = Carbon\Carbon::parse($item->updated_at)->diffForHumans() }} </span>   &nbsp
          <span class="badge badge-success ">   Created {{ $diffs = Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span>    &nbsp
          </p>
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
            <h5 class="card-title">Edit Pricing</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form role="form" action="{{route('pricings.update',$item->id)}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
										<div class="form-group col-md-6">
								        <label> Select Vehicle</label><br>
												<select class="form-control select2 {{ $errors->has('vehicle_id') ? ' is-invalid' : '' }}" name="vehicle_id"  placeholder="Select Client" style="width:100%">
													<option value="">Select Vehicle</option>
													@foreach($vehicles as $vehicle)
															<option value="{{$vehicle->id}}" @php echo $item->vehicle_id == $vehicle->id ? 'selected' :  "" @endphp>{{$vehicle->no_plate}} / {{$vehicle->car_model->model_name}} / {{$vehicle->car_model->car_make->make_name}} / {{$vehicle->car_category->cat_name}}</option>
													@endforeach
												</select>
												@if ($errors->has('vehicle_id'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('vehicle_id') }}</strong>
														</span>
												@endif
					          </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Daily Rate</label>
                        <input type="text"  name="dailyrate" value="{{$item->dailyrate}}" class="form-control {{ $errors->has('dailyrate') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Daily Rate" >
                        @if ($errors->has('dailyrate'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('dailyrate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Daily Driver Rate</label>
                        <input type="text"  name="dailydriverrate" value="{{$item->dailydriverrate}}" class="form-control {{ $errors->has('dailydriverrate') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Daily Driver Rate" >
                        @if ($errors->has('dailydriverrate'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('dailydriverrate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Self Drive Rate</label>
                        <input type="text"  name="selfdrive" value="{{$item->selfdrive}}" class="form-control {{ $errors->has('selfdrive') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Self Drive Rate" >
                        @if ($errors->has('selfdrive'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('selfdrive') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Discount</label>
                        <input type="text"  name="discount" value="{{$item->discount}}" class="form-control {{ $errors->has('discount') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Discount" >
                        @if ($errors->has('discount'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('discount') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Cost of Delivery</label>
                        <input type="text"  name="costofdelivery" value="{{$item->costofdelivery}}" class="form-control {{ $errors->has('costofdelivery') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Cost of Delivery" >
                        @if ($errors->has('costofdelivery'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('costofdelivery') }}</strong>
                            </span>
                        @endif
                    </div>

                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </div>
            </form>
            </div>

            <!-- /.row -->
            </div>
            <!-- ./card-body -->

            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Car Schedules</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-plus"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="#modal-default" class="dropdown-item" data-toggle="modal">New Schedule</a>
                    <a href="#" class="dropdown-item">delete selected</a>
                </div>
                </div>

            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                @php $schudeles =$item->schedules()->get();@endphp

                <table id="example1" class="table table-bordered table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                       <thead>
                           <tr>
                               <th>Date Range</th>
                               <th>	<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Created</th>
                               <th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>Update</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>

                               @foreach ($schudeles as $record)
                                 <tr>
                                       <td>From {{ Carbon\Carbon::parse($record->start_date)->format('d-m-Y ') }} To {{ Carbon\Carbon::parse($record->end_date)->format('d-m-Y ') }} </td>
                                       <td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y ') }}</td>
                                       <td>{{ Carbon\Carbon::parse($record->updated_at)->format('d-m-Y ') }}</td>
                                       <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                               <a title="Edit" href="#" data-id="{{$record->id}}" data-cat_name="{{$record->cat_name}}" data-toggle="modal"  data-target="#editModal"><i class="fas fa-edit"></i></a>
                                               <a title="Delete" onclick="return confirm('Are you sure you want to delete this Category')" href="{{route('categories.delete',$record->id)}}"><span style="color:tomato"><i class="fas fa-trash-alt"></i></span></a>
                                             </div>
                                       </td>
                                 </tr>
                               @endforeach
                       </tbody>
                   </table>
            </div>

            <!-- /.row -->
            </div>
            <!-- ./card-body -->

            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        </div>

        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Car Availabe Dates</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                @php $avaliable_days =$item->car_available_dates()->get();@endphp
                 <div id='calendar'></div>
            </div>

            <!-- /.row -->
            </div>
            <!-- ./card-body -->

            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        </div>
    </div>
</div>
<!--add form -->
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Schedule</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
              <form role="form" action="{{route('pricings.schedules.store')}}" method="POST" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
                    <input type="hidden" id="exampleInputFile" name="pricing_id" value="{{$item->id}}">

                    <div class="form-group col-md-12 ">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" name="start_date" value="{{old('start_date')}}"  class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Start Date">
                        @if ($errors->has('start_date'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('start_date') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 ">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" name="end_date" value="{{old('end_date')}}"  class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter End Date">
                        @if ($errors->has('end_date'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('end_date') }}</strong>
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
              <h4 class="modal-title">Edit  Category</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
              <form role="form" action="{{route('categories.update','hhh')}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}
              <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                  <input type="hidden" name="id" id="Id">
                  </div>
                    <div class="form-group col-md-12 ">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  name="cat_name" value="{{old('cat_name')}}" class="form-control {{ $errors->has('cat_name') ? ' is-invalid' : '' }}" id="Name" placeholder="Enter Name"  >
                        @if ($errors->has('cat_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('cat_name') }}</strong>
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

@section('css')

@stop

@section('js')
   @parent
   <script>
       $(function () {
            $('.select2').select2();
       })
</script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      header: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      defaultDate: '{{date('Y-m-d')}}',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [

        @foreach($avaliable_days as $dates)
        @php $rand_color = "#".substr(md5(rand()), 0, 6); @endphp
        {
          title          : 'Avialable',
          start          : '{{$dates->available_date}}',
          backgroundColor: '{{$rand_color}}', //red
          borderColor    : '{{$rand_color}}' //red
        },
        @endforeach

      ]
    });

    calendar.render();
  });

</script>
@stop
