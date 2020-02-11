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
            <h5 class="card-title">Add Pricing</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form role="form" action="{{route('pricings.store')}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
										<div class="form-group col-md-6">
								        <label> Select Vehicle</label><br>
												<select class="form-control select2 {{ $errors->has('vehicle_id') ? ' is-invalid' : '' }}" name="vehicle_id"  placeholder="Select Client" style="width:100%">
													<option value="">Select Vehicle</option>
													@foreach($vehicles as $vehicle)
															<option value="{{$vehicle->id}}" @php echo old('vehicle_id') == $vehicle->id ? 'selected' :  "" @endphp>{{$vehicle->no_plate}} / {{$vehicle->car_model->model_name}} / {{$vehicle->car_model->car_make->make_name}} / {{$vehicle->car_category->cat_name}} </option>
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
                        <input type="text"  name="dailyrate" value="{{old('dailyrate')}}" class="form-control {{ $errors->has('dailyrate') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Daily Rate" >
                        @if ($errors->has('dailyrate'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('dailyrate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Daily Driver Rate</label>
                        <input type="text"  name="dailydriverrate" value="{{old('dailydriverrate')}}" class="form-control {{ $errors->has('dailydriverrate') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Daily Driver Rate" >
                        @if ($errors->has('dailydriverrate'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('dailydriverrate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Self Drive Rate</label>
                        <input type="text"  name="selfdrive" value="{{old('selfdrive')}}" class="form-control {{ $errors->has('selfdrive') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Self Drive Rate" >
                        @if ($errors->has('selfdrive'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('selfdrive') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Discount</label>
                        <input type="text"  name="discount" value="{{old('discount')}}" class="form-control {{ $errors->has('discount') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Discount" >
                        @if ($errors->has('discount'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('discount') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Cost of Delivery</label>
                        <input type="text"  name="costofdelivery" value="{{old('costofdelivery')}}" class="form-control {{ $errors->has('costofdelivery') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Cost of Delivery" >
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
    </div>
</div>
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
@stop
