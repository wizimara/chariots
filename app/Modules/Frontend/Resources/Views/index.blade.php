@extends('frontend::layouts.main')

@section('content')
    <div class="slider-2 bg-3 bg-opacity-black-50">
			<div class="slider-content text-center">
				<div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
					<h1 class="slider-1-title-2">Rent a car at your convenience, for hustle free travel</h1>
				</div>
				<div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
					<p class="slider-1-desc">Move with ease, enjoy new experiences, connect to places and loved ones.</p>
				</div>
			</div>
            <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="find-home-box">
                    <div class="find-homes">
                        <div class="row">
							<div class="col-sm-12 col-xs-12">
								<h5>Find a rental car</h5>
                            </div>
                            <form method="post">
                                @csrf
							<div class="col-sm-12 col-xs-12">
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="find-home-items">
										<input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" value="{{ old('location') }}" type="text" name="location" placeholder="Your address / location" required>
                                    </div>
                                    @if ($errors->has('location'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('location') }}
                                    </div>
                                    
                                    @endif
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="input-append date form_datetime">
										<input class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" value="{{ old('start_date') }}" name="start_date" size="16" type="text" value="" placeholder="From: Date / Time" >
										<span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                    @if ($errors->has('start_date'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('start_date') }}
                                    </div>
                                    @endif
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="input-append date form_datetime">
										<input class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" value="{{ old('end_date') }}" name="end_date" size="16" type="text" value="" placeholder="Until: Date / Time" >
										<span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                    @if ($errors->has('end_date'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('end_date') }}
                                    </div>
                                    @endif
								</div>

								<div class="col-md-2 col-sm-4 col-xs-12">
									<div class="find-home-item">
										<button class="button-1 btn-block btn-hover-1" >SEARCH</button>
									</div>
                                </div>
                            </form>
							</div>
							<div class="col-xs-12 reserve-bottom-info">
								<h5 class="col-xs-6"><span class="total-cars">{{$vehicles_count}}</span> cars available</h5>
								<p class="col-xs-6"><a href="#"><span class="pull-right"><i class="fa fa-search"></i> &nbsp;Advanced Search</span></a></p>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SLIDER SECTION END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

            <!-- FEATURED FLAT AREA START -->
            <div class="featured-flat-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-center">
                                <h2>Find a Rental</h2>
                                <p>Whether for hourly or daily use, you'll find just the right car you need.</p>
                            </div>
                        </div>
                    </div>
                    <div class="featured-flat car-categories">
                        <div class="row">
                            @foreach ($vehicle_categories as $category)
                                <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{route('vehicles.in.category',$category->id)}}"><img src="{{asset($category->category_image)}}" alt=""></a>
                                    </div>
                                    <div class="flat-item-info">
                                        <div class="flat-title-price">
                                        <h5><a href="{{route('vehicles.in.category',$category->id)}}">{{$category->cat_name}} </a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
<!-- FEATURED FLAT AREA END -->

            <!-- ELEMENTS AREA START -->
            <div class="elements-area pt-60 pb-0">

            <!-- FEATURES AREA START -->
            <div class="features-area fix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="features-info bg-gray">
                                <div class="section-title mb-30">
                                    <h2>Your ultimate personal car sharing hub</h2>
                                </div>
                                <div class="features-desc">
                                    <p>Travel made easy with limited restrictions, and plenty of perks.</p>
                                </div>
                                <div class="features-include">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="features-include-list">
												<img src="images/icons/subscription-dollar-sign_1.png" alt="no subscription or membership fees">
                                                <h6>No subscription fees</h6>
                                                <p>No monthly or annual subscription fees, simply sign up and drive.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="features-include-list">
												<img src="images/icons/sedan_car_1.png" alt="various car options">
                                                <h6>Lots of possibilities</h6>
                                                <p>A variety of cars, vans and trucks readily available to suit your need.</p>
                                            </div>
                                        </div>
									</div>
									<div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="features-include-list">
												<img src="images/icons/cancel_payment_1.png" alt="cancel booking and payment">
                                                <h6>Flexible cancellation optons</h6>
                                                <p>Just in case something comes up, you can cancel your booking for free 24 hours before your trip starts.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="features-include-list">
												<img src="images/icons/customer-support_1.png" alt="reliable customer support">
                                                <h6>Reliable customer support</h6>
                                                <p>Our support teams are just a call away to assist you and ensure a smooth experience throughout your trip.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FEATURES AREA END -->

            </div>
            <!-- ELEMENTS AREA END -->

            <!-- BOOKING AREA START -->
            <div class="booking-area bg-1 call-to-bg plr-140 pt-200 pb-200 start-earning">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12">
						<a href="#">
                            <div class="section-title text-white sign-up-here">
                                <h3>Sign up</h3>
                                <h2 class="h1">Here</h2>
                            </div>
						</a>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="booking-conternt clearfix">
                                <div class="book-house text-white">
                                    <h2>Register your vehicle, and start earning.</h2>
									</br>
                                    <div class="col-sm-3"><a class="button-1 btn-block btn-hover-1" href="#">SIGN UP</a></div>
                                </div>
                                <!-- <div class="booking-imgae">
                                    <img src="images/others/booking.png" alt="">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BOOKING AREA END -->


            <!-- BLOG AREA START -->
            <div class="blog-area pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-center">
                                <h2>Lets break it down a little</h2>
                                <p>A car sharing hub created to ease travel and extra income for car owners.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="blog-carousel">
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="{{url('how-it-works')}}"><img src="images/blog/lady-in-sedan-car.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="{{url('how-it-works')}}">How Chariot Rentals works</a></h5>
                                            <!-- <p>July 30, 2016 / 10 am</p> -->
											</br>
                                        </div>
                                        <p>Looking for the perfect car for that upcoming event or journey? Well hundreds of hosts ready to provide you with just the right car.</p>
                                        <a class="read-more" href="{{url('how-it-works')}}">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="#"><img src="images/blog/vehicle-checklist.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="#">Vehicle registration requirements</a></h5>
                                            <!-- <p>July 30, 2016 / 10 am</p> -->
											</br>
                                        </div>
                                        <p>Find out how you can get your car registered. Then kickstart your pursuit to becoming a 5 star host & earn while you are at it.</p>
                                        <a class="read-more" href="#">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="images/blog/vehicle_inspection.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Car care essentials</a></h5>
                                            <!-- <p>July 30, 2016 / 10 am</p> -->
											</br>
                                        </div>
                                        <p>Keeping every car in exquisite shape is key to making every booking memorable. But lets be honest, as a driver you have just as much to do.</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="images/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Customer support channels</a></h5>
                                            <!-- <p>July 30, 2016 / 10 am</p>
											</br>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div> -->
                        </div>
                    </div>
					<hr>
                </div>
            </div>
            <!-- BLOG AREA END -->

            <!-- DOWNLOAD THE APP START

            <div class="blog-area pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-center">
                                <h2>Download Chariots Mobile App</h2>
                                <p>Chariots is the best for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12 app-screen">
							<img src="images/others/app-placeholder.jpg" alt="">
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 store-links pt-200">
							<div class="pt-30 pb-30"><a href="#" title="App Store"><img src="images/others/app-store-badge-1.png" alt="App Store"></a> </div>
							<div class="pt-30 pb-30"><a href="#" title="Google Play Store"><img src="images/others/google-play-badge-1.png" alt="Google Play Store"></a> </div>
						</div>
                    </div>
                </div>
            </div>

            <!-- DOWNLOAD THE APP END -->
</section>

<style>
  .dark-header {
    background: transparent;
  }
</style>

@endsection
