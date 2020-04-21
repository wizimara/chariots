@extends('frontend::layouts.main')
@section('assets')
     <link rel="stylesheet" href="{{asset('css/dark-header.css')}}">
@endsection
@section('content')    
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            
            <!-- FEATURED FLAT AREA START -->
            <div class="featured-flat-area pt-115 pb-60">
                <div class="container">
                    <h2>Search Results</h2>
                    <div class="featured-flat">
                        @if( isset($available_schedules) || count($available_schedules) > 0)
                        
                        <div class="row">
                            @foreach ($available_schedules as $schedule)
                                
                                @php
                                   $car_image = $schedule->pricing->car->vehicle_images()->first();
                                @endphp
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <span class="for-sale">For Rent</span>
                                        <a href="{{route('vehicle.detail',[$schedule->pricing->car->id,$start_date,$end_date])}}"><img src="{{url('/'.$car_image->url) }}" alt=""></a>
                                        <div class="flat-link">
                                            <a href="{{route('vehicle.detail',[$schedule->pricing->car->id,$start_date,$end_date])}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            @foreach($schedule->pricing->car->features()->get() as $vehicle_features)
                                            <li>
                                                <img src="images/icons/4.png" alt="">
                                                <span>{{$vehicle_features->feature_name ?? ''}}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="flat-item-info">
                                        <div class="flat-title-price">
                                            <h5><a href="{{route('vehicle.detail',[$schedule->pricing->car->id,$start_date,$end_date])}}">{{$schedule->pricing->car->year_model}} {{$schedule->pricing->car->car_model->model_name??'None'}} - {{ $schedule->pricing->car->car_model->car_make->make_name}} </a></h5>
                                        <h5 class="">daily rate: UGX {{$schedule->pricing->dailyrate}}</h5>
                                        </div>
                                        <p><img src="images/icons/location.png" alt="">{{$schedule->pricing->car->car_location->location_name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                            
                            <!-- pagination-area -->
                            <div class="col-xs-12">
                                <div class="pagination-area mb-60">
                                    {{$available_schedules->links()}}
                                   
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- FEATURED FLAT AREA END -->
            
            <!-- SUBSCRIBE AREA START -->
            <div class="subscribe-area bg-blue call-to-bg plr-140 ptb-50">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="section-title text-white">
                                <h3>SUBSCRIBE</h3>
                                <h2 class="h1">NEWSLETTER</h2>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="subscribe">
                                <form action="#">
                                    <input type="text" name="subscribe" placeholder="Enter yur email here...">
                                    <button type="submit" value="send">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SUBSCRIBE AREA END -->
        </section>
        <!-- End page content -->


@endsection
