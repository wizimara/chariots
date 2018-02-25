@extends('shared::layouts.app')
@section('title','Bookings')
@section('content')



<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Payments
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									New Payment								</small> |
							<a href="{{ url('/admin/renting/payments') }}" class="btn btn-primary btn-xs ">Back</a>

							</h1>
						</div><!-- /.page-header -->

						<div class="row">



                        <div class=" col-sm-12">




@if ($errors->any())
<div class="alert alert-danger">

            @lang('Errors')
    </div>
@endif
</div>

							<div class="col-xs-12">
								  <div class=" page box">
								<!-- PAGE CONTENT BEGINS -->

            <div class="tile-body">
                   {{ Form::open(array('route' => 'payments.store')) }}
                    <div class="row">

                      <div class="form-group col-sm-6 {{ $errors->has('confirmed_rentals_id') ? ' has-error' : '' }} ">

                       {{ Form::label('confirmed_rentals_id', trans('Select  Confirmed Booking')) }}

<select class="chosen-select form-control " id="form-field-select-3" data-placeholder="Click to Select Car Make."  name="confirmed_rentals_id">
               <option value="">  </option>
               @foreach($bookings as $record)

               <option value="{{ $record->id }}"  >{{ $record->make_name.' '.$record->model_name .' '.$record->cat_name .'  '.$record->name}}</option>
               @endforeach
               </select>

               @if ($errors->has('confirmed_rentals_id'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('confirmed_rentals_id') }}</strong>
                                       </span>
                                   @endif

               </div>


 </div>

 <div class="row">
	 <div class="form-group col-sm-3 {{ $errors->has('amount_paid') ? ' has-error' : '' }} ">
{{ Form::label('amount_paid', trans('Amount Paid')) }}
{{ Form::text('amount_paid',null, array('class' => 'form-control ')) }}

									 @if ($errors->has('amount_paid'))
											 <span class="help-block">
													 <strong>{{ $errors->first('amount_paid') }}</strong>
											 </span>
									 @endif
 </div>
 <div class="form-group col-sm-3 {{ $errors->has('balance') ? ' has-error' : '' }} ">
{{ Form::label('balance', trans('Balance')) }}
{{ Form::text('balance','0', array('class' => 'form-control ')) }}

								 @if ($errors->has('balance'))
										 <span class="help-block">
												 <strong>{{ $errors->first('balance') }}</strong>
										 </span>
								 @endif
</div>

 </div>

   <div class="row">

     <div class="form-group col-sm-3 {{ $errors->has('payment_gateway') ? ' has-error' : '' }} ">

       {{ Form::label('payment_gateway', trans(' Payment Gateway')) }}
       <br>
         <label class="radio-inline">
   <input type="radio" id="Paypal" name="payment_gateway" value="Paypal">Paypal</label>

   <label class="radio-inline">
   <input type="radio" id="Mobile Money" name="payment_gateway" value="Mobile Money">Mobile Money</label>


   @if ($errors->has('payment_gateway'))
                       <span class="help-block">
                           <strong>{{ $errors->first('payment_gateway') }}</strong>
                       </span>
                   @endif

   </div>


   </div>
	      <div class="form-group ">
                        <div class=" col-sm-12">
                         {{ Form::submit(trans('Submit'), array('class' => 'btn btn-primary')) }}

                        </div>
                        <br><br>
                      </div>



{{ Form::close() }}


                  </div>

</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>

@stop

@section('js')
  @parent
<script>
$( document ).ready(function() {
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
		format: 'yyyy-mm-dd',
  });
  $('.timepicker').timepicker({


	});

});

</script>



@endsection
