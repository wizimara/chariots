@extends('shared::layouts.app')
@section('title', 'Vehicles')
@section('content_header')
<style>
 .img{ width:100%; height:auto; box-shadow:0px 0px 3px #ccc}

 </style>
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><small><a href="{{route('vehicles.index')}}" class="btn btn-info">Back</a></small> Vehicles</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">vehicles</li>
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
        <p>
          <span class="badge badge-warning ">   Updated {{ $diffs = Carbon\Carbon::parse($item->updated_at)->diffForHumans() }} </span>   &nbsp
          <span class="badge badge-success ">   Created {{ $diffs = Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span>    &nbsp
          </p>
        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Edit Vehicle</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form role="form" action="{{route('vehicles.update',$item->id)}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
										<div class="form-group col-md-6">
								        <label> Select Car Owner</label><br>
												<select class="form-control select2 {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id"  placeholder="Select Client" style="width:100%">
													<option value="">Select User</option>
													@foreach($users as $user)
															<option value="{{$user->id}}" @php echo $item->user_id == $user->id ? 'selected' :  "" @endphp>{{$user->name}} </option>
													@endforeach
												</select>
												@if ($errors->has('user_id'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('user_id') }}</strong>
														</span>
												@endif
					          </div>
										<div class="form-group col-md-3">
												<label> Select  Vehicle model</label><br>
												<select class="form-control select2 {{ $errors->has('model_id') ? ' is-invalid' : '' }}" name="model_id"  placeholder="Select Client" style="width:100%">
													<option value=""> Select Model </option>
													@foreach($models as $model)
													<option value="{{ $model->id }}"  @php echo $item->model_id == $model->id ? 'selected' :  "" @endphp >{{ $model->car_make->make_name.' / ' .$model->model_name  }}</option>
													@endforeach
												</select>
												@if ($errors->has('model_id'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('model_id') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-3">
												<label> Select  Vehicle Category</label><br>
												<select class="form-control select2 {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id"  placeholder="Select Client" style="width:100%">
													<option value=""> Select  Vehicle Category </option>
													@foreach($categories as $category)
													<option value="{{ $category->id }}" @php echo $item->category_id == $category->id ? 'selected' :  "" @endphp >{{ $category->cat_name }}</option>
													@endforeach
												</select>
												@if ($errors->has('category_id'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('category_id') }}</strong>
														</span>
												@endif
										</div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Year of manufature/model</label>
                        <input type="text"  name="year_model" value="{{$item->year_model}}" class="form-control {{ $errors->has('year_model') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Year" >
                        @if ($errors->has('year_model'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('year_model') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Car Number Plate</label>
                        <input type="text"  name="no_plate" value="{{$item->no_plate}}" class="form-control {{ $errors->has('no_plate') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Car Number Plate" >
                        @if ($errors->has('no_plate'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('no_plate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="text"  name="color" value="{{$item->color}}" class="form-control {{ $errors->has('color') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Color" >
                        @if ($errors->has('color'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('color') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Number of passengers</label>
                        <input type="number"  name="passengers" value="{{$item->passengers}}" class="form-control {{ $errors->has('passengers') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Passengers" >
                        @if ($errors->has('passengers'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('passengers') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Tracker Status</label><br>
                        <label class="radio-inline"><input type="radio"  name="tracker" value="1"> Yes</label>
                        <label class="radio-inline"><input type="radio"  name="tracker" value="0" checked > No</label>
                        @if ($errors->has('tracker'))
														<span class="invalid-feedback">
                                <strong>{{ $errors->first('tracker') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Transmission</label><br>
                        <label class="radio-inline"><input type="radio"  name="transimition" value="1"> Manual</label>
                        <label class="radio-inline"><input type="radio"  name="transimition" value="0" checked > Auto</label>
                        @if ($errors->has('transimition'))
														<span class="invalid-feedback">
                                <strong>{{ $errors->first('transimition') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
												<label for="exampleInputEmail1">Insurance</label><br>
												<label class="radio-inline"><input type="radio"  name="insurance_type" value="Comprehensive"> Comprehensive</label>
												<label class="radio-inline"><input type="radio"  name="insurance_type" value="Third party" checked > Third party</label>
												@if ($errors->has('insurance_type'))
														<span class="invalid-feedback">
														</span>
												@endif
										</div>
										<div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Insurance Expiry Date</label>
                        <input type="date" name="insurance_expiry" value="{{$item->insurance_expiry}}"  class="form-control {{ $errors->has('insurance_expiry') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Insurance Expiry Date">
                        @if ($errors->has('insurance_expiry'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('insurance_expiry') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-6">
												<label> Select  Vehicle Location</label><br>
												<select class="form-control select2 {{ $errors->has('location') ? ' is-invalid' : '' }}" name="location"  style="width:100%">
													<option value=""> Select  Vehicle Location </option>
													@foreach($locations as $location)
													<option value="{{ $location->id }}" @php echo $item->location == $location->id ? 'selected' :  "" @endphp >{{ $location->location_name }}</option>
													@endforeach
												</select>
												@if ($errors->has('location'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('location') }}</strong>
														</span>
												@endif
										</div>
										<div class="form-group col-md-12">
												<label> Vehicle Features</label><br>
                        @php $current_vehicle_features = $item->features()->pluck('feature_id')->all(); @endphp
												<select multiple class="form-control select2 {{ $errors->has('features') ? ' is-invalid' : '' }}" name="features[]"  style="width:100%">
													@foreach($features as $feature)
													<option value="{{ $feature->id }}"  @if(in_array($feature->id, $current_vehicle_features)) selected @endif >{{ $feature->feature_name }}</option>
													@endforeach
												</select>
												@if ($errors->has('features'))
														<span class="invalid-feedback">
																<strong>{{ $errors->first('features') }}</strong>
														</span>
												@endif
										</div>
                    <div class="form-group col-md-12 ">
                        <label for="exampleInputEmail1">Description</label>
												<textarea class="form-control {{ $errors->has('vehicle_desc') ? ' is-invalid' : '' }}" name="vehicle_desc" cols="50" rows="4" id="vehicle_desc" placeholder="Description">{{$item->vehicle_desc}}</textarea>
                        @if ($errors->has('vehicle_desc'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('vehicle_desc') }}</strong>
                            </span>
                        @endif
                    </div>
										<div class="form-group col-md-3 ">
												<label for="exampleInputEmail1">Status</label><br>
												<label class="radio-inline"><input type="radio"  name="status" value="1" checked> Active</label>
												<label class="radio-inline"><input type="radio"  name="status" value="0"> Deactive</label>
												@if ($errors->has('status'))
														<span class="invalid-feedback">
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

        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Edit Vehicle</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form role="form" action="{{route('carimages.store')}}" method="POST" enctype="multipart/form-data" >
              {{csrf_field() }}

              <div class="box-body">
                  <div class="row">
                    <input type="hidden" id="exampleInputFile" name="vehicle_id" value="{{$item->id}}">
                    <input type="hidden" id="exampleInputFile" name="no_plate" value="{{$item->no_plate}}">
                    <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Select Image</label>
                        <input type="file" id="exampleInputFile" name="url" class="form-control">
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleInputEmail1">Title/Caption</label>
                        <input type="text"  name="title" value="" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter Caption" >
                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
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

        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Upload Images</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
            <div class="row" style="margin-top:20px;margin-bottom:20px">
            @if ($images->count())
            @foreach ($images as $record)
              <div class=" col-sm-3 col " style="height:260px">
              <img src="{{url('/'.$record->url) }}" class="img" >
              <b>{{ $record->title }}</b><br>
            @if($record->featured=="1")
            <span class="label label-sm label-success"><i class="ace-icon glyphicon glyphicon-ok"></i>&nbsp;Featured</span>
            @else
          <a href="{{ route('carimages.published',$record->id) }}"><span class="label label-sm label-danger"><i class="ace-icon glyphicon glyphicon-ok"></i> &nbsp;Feature</span></a>
          @endif
            	<a title="Delete" onclick="return confirm('Are you sure you want to delete this Image? ')" href="{{route('carimages.delete',$record->id)}}"><span style="color:tomato"><i class="fas fa-trash-alt"></i></span></a>


              </div>
             @endforeach
            @else
              @lang('No Images Uploaded')
          @endif
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

@section('css')

@stop

@section('js')
   @parent
   <script>
       $(function () {
         $("#divspouse").hide();
         $("#Divreason").hide();
         if($("#Married").is(":checked"))
               {
                  $("#divspouse").show(1000);
               }
         $(":input[name=marital_status]:eq(0)").click(function(){
               $("#divspouse").hide(1000);
            });
            $(":input[name=marital_status]:eq(1)").click(function(){
               $("#divspouse").show(1000);
            });
            if($("#Deactive").is(":checked"))
                  {
                     $("#Divreason").show(1000);
                  }
            $(":input[name=status]:eq(0)").click(function(){
                  $("#Divreason").hide(1000);
               });
               $(":input[name=status]:eq(1)").click(function(){
                  $("#Divreason").show(1000);
               });
            $('.select2').select2();
       })
</script>
@stop
