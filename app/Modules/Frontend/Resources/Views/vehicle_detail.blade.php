@extends('frontend::layouts.main')

@section('content')
<section id="page-content" class="page-wrapper">

    <!-- PROPERTIES DETAILS AREA START -->
    @php
        $formatted_start_date = \Carbon\Carbon::parse($start_date)->format('d M Y H:i') ?? '';
        $formatted_end_date = \Carbon\Carbon::parse($end_date)->format('d M Y H:i') ?? '';
    @endphp
    <div class="properties-details-area pt-115 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- pro-details-image -->
                    <div class="pro-details-image mb-60">
                        <div class="pro-details-big-image">
                            <div class="tab-content">
                                @foreach($vehicle_images as $vehicle_image)
                                    <div role="tabpanel" class="tab-pane fade in active" id="pro-1">
                                        <a href="{{asset('storage/'.$vehicle_image->url) }}" data-lightbox="image-1" data-title="Sheltek Properties - 1">
                                            <img src="{{asset('storage/'.$vehicle_image->url) }}" alt="">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="pro-details-carousel">
                            @foreach($vehicle_images as $index=> $vehicle_image)
                                <div class="pro-details-item">
                                <a href="#pro-{{$index}}" data-toggle="tab"><img src="{{asset('storage/'.$vehicle_image->url )}}" alt=""></a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- pro-details-short-info -->
                    <div class="pro-details-short-info mb-60">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="pro-details-condition">
                                    <h5>Details</h5>
                                    <div class="pro-details-condition-inner bg-gray">
                                        <ul class="condition-list">
                                            <li><img src="images/icons/5.png" alt="">{{$vehicle->car_model->car_make->make_name}}</li>
                                            <li><img src="images/icons/6.png" alt="">{{$vehicle->car_model->model_name}}</li>
                                            <li><img src="images/icons/7.png" alt="">{{$vehicle->year_model}}</li>
                                            <li><img src="images/icons/13.png" alt="">Insurance: {{$vehicle->insurance_type}}</li>

                                            <li>daily rate: UGX {{$vehicle->pricing->dailyrate??0}}</li>
                                        </ul>
                                        <p><img src="images/icons/location.png" alt="">{{$vehicle->location->location_name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="pro-details-amenities">
                                    <h5>Features</h5>
                                    <div class="pro-details-amenities-inner bg-gray">
                                        <ul class="amenities-list">
                                            @foreach($vehicle_features as $vfeature)
                                            <li>{{$vfeature->feature_name}}</li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pro-details-description -->
                    <div class="pro-details-description mb-50">
                        <div>
                                <form method="post">
                                <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                    @csrf
                                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                         <label for="exampleInputEmail1">Start Date</label>
                                        <div class="input-append ">
                                            <input class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" value="{{ $formatted_start_date ?? old('start_date') }}" name="start_date" size="16" type="date" value="" placeholder="From: Date / Time" >
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        @if ($errors->has('start_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('start_date') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class=" form-group col-md-3 col-sm-12 col-xs-12">
                                       <label for="exampleInputEmail1">End Date</label>
                                        <div class="input-append  date">
                                            <input class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" value="{{ $formatted_end_date ?? old('end_date') }}" name="end_date" size="16" type="date" value="" placeholder="Until: Date / Time" >
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        @if ($errors->has('end_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('end_date') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class=" form-group col-md-3 col-sm-12 col-xs-12">
                                      <label for="exampleInputEmail1">Drive Option</label><br>
              												<label class="radio-inline"><input type="radio"  name="driver_option" value="0" checked> Driver</label>
              												<label class="radio-inline"><input type="radio"  name="driver_option" value="1"> Self Drive</label>
                                    </div>
                                    <button class="button-1 btn-block btn-hover-1">Book this vehicle</button>
                                </form>
                        </div>

                        <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Sheltek</span> is  ipsum dolor sit amet, </p>
                    </div>
                    <!-- pro-details-feedback -->
                    <div class="pro-details-feedback mb-40">
                        <h5>3 Feedback</h5>
                        <!-- media -->
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="images/avatar/1.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h6 class="media-heading"><a href="#">David Backhum</a></h6>
                                <p><span>6 hour ago</span>There are some business lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu tempor inc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudt </p>
                            </div>
                        </div>
                        <!-- media -->
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="images/avatar/2.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h6 class="media-heading"><a href="#">Saniya Mirza</a></h6>
                                <p><span>8 hour ago</span>There are some business lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu tempor inc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudt </p>
                            </div>
                        </div>
                        <!-- media -->
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="images/avatar/3.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h6 class="media-heading"><a href="#">Lionel Messi</a></h6>
                                <p><span>10 hour ago</span>There are some business lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu tempor inc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudt </p>
                            </div>
                        </div>
                    </div>
                    <!-- agent-review -->
                    <div class="pro-details-agent-review">
                        <div class="row">
                            <!-- single-agent -->
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="pro-details-agent">
                                    <h5>Contact Owner</h5>
                                    <div class="single-agent">
                                        <div class="agent-image">
                                            <img src="images/agents/2.jpg" alt="">
                                        </div>
                                        <div class="agent-info">
                                            <div class="agent-name">
                                                <h5><a href="#">Eva Sharlin</a></h5>
                                                <p>Owner</p>
                                            </div>
                                        </div>
                                        <div class="agent-info-hover">
                                            <div class="agent-name">
                                                <h5><a href="#">Eva Sharlin</a></h5>
                                                <p>Owner</p>
                                            </div>
                                            <ul class="agent-address">
                                                <li><img src="images/icons/phone-2.png" alt="">+1245  785  659 </li>
                                                <li><img src="images/icons/mail-close.png" alt="">eva@gmail.com </li>
                                            </ul>
                                            <ul class="social-media">
                                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- leave-massage -->
                            <div class="col-md-7  col-sm-7 col-xs-12">
                                <div class="leave-review">
                                    <h5>Leave a Review</h5>
                                    <form action="#">
                                        <input type="text" name="name" placeholder="Your name">
                                        <input type="email" name="email" placeholder="Email here">
                                        <textarea></textarea>
                                        <button type="button" class="submit-btn-1">SUBMIT REVIEW</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- widget-search-property -->
                    <aside class="widget widget-search-property">
                        <h5>Search for Vehicle</h5>
                        <div class="row">
                        <form method="post" action="{{route('vehicles.search')}}">
                                @csrf
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="find-home-item custom-select">
                                    <select class="selectpicker" title="Make" data-hide-disabled="true" data-live-search="true">
                                        <optgroup disabled="disabled" label="disabled">
                                            <option>Hidden</option>
                                        </optgroup>
                                        @foreach($vehicle_makes as $make )

                                            <option value="{{$make->id}}">{{$make->make_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="find-home-item custom-select">
                                    <select class="selectpicker" title="Model" data-hide-disabled="true" data-live-search="true">


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="find-home-item">
                                    <input class="input-append date form_datetime" type="text" name="start_date" placeholder="start date">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="find-home-item">
                                    <input class="input-append date form_datetime" type="text" name="end_date" placeholder="end date">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="find-home-item  custom-select">
                                    <select name="location" class="selectpicker" title="Location" data-hide-disabled="true">
                                        @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->location_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="find-home-item custom-select">
                                    <select multiple class="selectpicker" title="Features" data-hide-disabled="true">

                                        @foreach($features as $feature)
                                            <option value="{{$feature->id}}">{{$feature->feature_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-7 col-xs-12">
                                        <div class="find-home-item">
                                            <!-- shop-filter -->
                                            <div class="shop-filter">
                                                <div class="price_filter">
                                                    <div class="price_slider_amount">
                                                        <input type="submit"  value="Your range :"/>
                                                        <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                                    </div>
                                                    <div id="slider-range"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-5 col-xs-12">
                                        <div class="find-home-item">
                                            <button class="button-1 btn-block btn-hover-1" >SEARCH</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </aside>


                </div>
            </div>
        </div>
    </div>
    <!-- PROPERTIES DETAILS AREA END -->

@endsection
