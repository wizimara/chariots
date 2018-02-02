<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Car Rental</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,300%7CLibre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/settings.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/simple-line-icons.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery-ui.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery.timepicker.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery.fancybox.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery.selectBox.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/global.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" >
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}">
		<link rel="stylesheet" type="text/less" href="{{ asset('frontend/css/skin.less') }}">
	</head>
	<body data-ng-app="themeonApp">

		<!--Loader Start-->
		<div class="loader">
		<div class="sk-circle">
		<div class="sk-circle1 sk-child"></div>
		<div class="sk-circle2 sk-child"></div>
		<div class="sk-circle3 sk-child"></div>
		<div class="sk-circle4 sk-child"></div>
		<div class="sk-circle5 sk-child"></div>
		<div class="sk-circle6 sk-child"></div>
		<div class="sk-circle7 sk-child"></div>
		<div class="sk-circle8 sk-child"></div>
		<div class="sk-circle9 sk-child"></div>
		<div class="sk-circle10 sk-child"></div>
		<div class="sk-circle11 sk-child"></div>
		<div class="sk-circle12 sk-child"></div>
		</div>
		</div>
		<!--Loader End-->

		<!--Page Wrapper Start-->
		<div id="wrapper" class="home" >

			<!--Header Section Start-->
			<header id="header" class="header">
				<div class="container">
					<div class="row ">
						<div class="col-xs-12">
							<div class="header-cont clearfix">
								<a href="index.html" class="logo"> <img src="assets/images/logo.png" alt=""/> </a>
								<div class="header-info">
									<div class="social-content clearfix">
										<div class="contact-det hidden-xs">
											<ul>
												<li>
													<a href="#">The Guide</a>/
												</li>
												<li>
													<a href="#">Our Crew </a>/
												</li>
												<li>
													<a href="#">Became a Partner </a>/
												</li>
												<li>
													<a href="tel:+88001234567">+8 800 12 34 567 </a>/
												</li>
												<li>
													<a href="mailto:mail@letsdrive.com">mail@letsdrive.com</a>
												</li>
											</ul>
										</div>
										<div class="social-det">
											<ul>
												<li>
													<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
												</li>

											</ul>
											<div class="select-box">
												<select class="select">
													<option value="English">EN</option>
													<option value="French">FR</option>
													<option value="German">GR</option>
												</select>

											</div>
											<div class="login">
												<a href="#"><span>Login</span><i class="fa fa-lock" aria-hidden="true"></i></a>
											</div>
										</div>
									</div>

									<nav class="navbar">

										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
											<ul class="nav navbar-nav navigation clearfix">

												<li class="active">
													<a href="index.html">HOME</a>
												</li>
												<li class="drop-down-parent">
													<a href="#">SERVICES <i class="fa fa-angle-down fa-2x" aria-hidden="true"></i> <i class="fa fa-angle-up fa-2x" aria-hidden="true"></i> </a>

													<ul class="drop-down">
														<li>
															<a href="our-services.html">our service</a>
														</li>
														<li>
															<a href="services-page.html">service</a>
														</li>
													</ul>
												</li>

												<li class="drop-down-parent">
													<a href="#">VEHICLES <i class="fa fa-angle-down fa-2x" aria-hidden="true"></i> <i class="fa fa-angle-up fa-2x" aria-hidden="true"></i> </a>
													<ul class="drop-down">
														<li>
															<a href="vehicles-page.html">vehicles</a>
														</li>
														<li>
															<a href="all-vehicles.html">all vehicles</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="aboutus.html">ABOUT</a>
												</li>

												<li class="drop-down-parent">
													<a href="#">BLOG <i class="fa fa-angle-down fa-2x" aria-hidden="true"></i> <i class="fa fa-angle-up fa-2x" aria-hidden="true"></i> </a>
													<ul class="drop-down">
														<li>
															<a href="blog.html">blog</a>
														</li>
														<li>
															<a href="blog-page.html">blog-page</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="contact-us.html">CONTACT</a>
												</li>
												<li>
													<a href="coming-soon.html">coming-soon</a>
												</li>

												<li>
													<a href="404.html">404</a>
												</li>

											</ul>
											<div class="header-search">
												<i class="fa fa-search" aria-hidden="true"></i>
												<input type="text" class="search-bar" placeholder="Search here..." />
											</div>
										</div><!-- /.navbar-collapse -->

									</nav>

								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!--Header Section End-->

			<!--banner Section start-->
			<section class="banner">
				<div id="rev_slider_wrapper">
					<div id="rev_slider_202_1_wrapper" class="rev_slider_wrapper " data-alias="concept1" style="background-color:#000000;padding:0px;">
						<!-- START REVOLUTION SLIDER 5.1.1RC fullscreen mode -->
						<div id="rev_slider_202_1" class="rev_slider" style="display:none;" data-version="5.1.1RC">
							<ul>
								<!-- SLIDE  -->
								<li data-index="rs-672" >
									<!-- MAIN IMAGE -->
									<img src="assets/images/Land-Rover-Range-Rover-Car-HD-Wallpapers.jpg" alt="" class="rev-slidebg" data-no-retina>
								</li>
								<li data-index="rs-672" >
									<!-- MAIN IMAGE -->
									<img src="assets/images/Land-Rover-Range-Rover-Car-HD-Wallpapers.jpg" alt="" class="rev-slidebg" data-no-retina>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!--reserve car section start -->
				<div class="reserve-form">
					<div class="container">
						<div class="row reserve-form-wrap">
							<div class="form-head clearfix">
								<div class="location">
									<h2>Reserve your car</h2>
									<span><i class="fa fa-plus-circle" aria-hidden="true"></i><a href="#">Advanced Search</a></span>
									<span><i class="fa fa-search" aria-hidden="true"></i><a href="#">Search by Location</a></span>
								</div>
								<div class="availability">
									<h2>12 640 <span>Available</span></h2>
								</div>
							</div>

							<form>
								<div class="row">
									<div class="col-xs-12 col-sm-6">

										<label>Picking Up locations</label>
										<div class="input-wrap clearfix">
											<input type="text" class="form-control" placeholder="Airport or address">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
										</div>
										<label>Droping off locations</label>
										<div class="input-wrap clearfix">
											<input type="text" class="form-control" placeholder="Airport or address">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
										</div>

									</div>
									<div class="col-xs-12 col-sm-3">
										<label>Picking Up Date</label>
										<div class="input-wrap clearfix">
											<input type="text" class="form-control pick-date" placeholder="04/03/2015">
											<i class="fa fa-calendar-o" aria-hidden="true"></i>
										</div>

										<label>Droping off Date</label>
										<div class="input-wrap clearfix">
											<input type="text" class="form-control pick-date" placeholder="06/08/2015">
											<i class="fa fa-calendar-o" aria-hidden="true"></i>
										</div>

									</div>
									<div class="col-xs-12 col-sm-3">
										<label>Picking Up Time</label>
										<div class="input-wrap clearfix">
											<input type="text" class="form-control time-pick"  placeholder="21:40 am">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
										</div>

										<label>Droping off Time</label>
										<div class="input-wrap clearfix">
											<input type="text" class="form-control time-pick" placeholder="07:00 am">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
										</div>

									</div>
								</div>
								<input type="checkbox" name="vehicle2" value="Car" id="car-check">
								<label class="check" for="car-check"><span class="check-box"></span> Return to the same location </label>
								<button class="find-car">
									<i class="fa fa-binoculars" aria-hidden="true"></i>find a car
								</button>
							</form>

						</div>
					</div>
				</div>

				<!--reserve car section start -->
			</section>
			<!--banner Section End-->

			<!--Content Area Start-->
			<div id="content">
				<!-- get our best offer section start-->
				<section class="get-bestoffer">

					<div class="container">
						<div class="row">
							<h2>Get our <span>best offers</span></h2>
							<div class="get-left col-xs-12 col-sm-4">
								<ul>
									<li>
										<div class="clearfix">
											<span class="offer-icon"><i class="fa fa-car" aria-hidden="true"></i></span>
											<div class="offer-details">
												<h3>Featured Luxury Cars</h3>
												<div class="divider-dotted">

												</div>
												<p>
													Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
												</p>
											</div>
										</div>
									</li>

									<li>
										<div class="clearfix">
											<span class="offer-icon"> <i class="fa fa-briefcase" aria-hidden="true"></i></span>
											<div class="offer-details">
												<h3>Insurance Included</h3>
												<div class="divider-dotted">

												</div>
												<p>
													Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
												</p>
											</div>
										</div>
									</li>
									<li>
										<div class="clearfix">
											<span class="offer-icon"><i class="fa fa-binoculars" aria-hidden="true"></i></span>
											<div class="offer-details">
												<h3>Available 12 640 Cars</h3>
												<div class="divider-dotted">

												</div>
												<p>
													Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
												</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-4 text-center car-center-pic">
								<img src="assets/images/2016-Volvo-XC90-top-view1.jpg" alt="">
							</div>
							<div class="get-left get-right text-right col-xs-12  col-sm-4">
								<ul>
									<li>
										<div class="clearfix">
											<span class="offer-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
											<div class="offer-details">
												<h3>Any Locations Rent</h3>
												<div class="divider-dotted">

												</div>
												<p>
													Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
												</p>
											</div>
										</div>
									</li>
									<li>
										<div class="clearfix">
											<span class="offer-icon"><i class="fa fa-tint" aria-hidden="true"></i></span>
											<div class="offer-details">
												<h3>Cleaning Included</h3>
												<div class="divider-dotted">

												</div>
												<p>
													Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
												</p>
											</div>
										</div>
									</li>
									<li>
										<div class="clearfix">
											<span class="offer-icon"><i class="fa fa-life-saver" aria-hidden="true"></i></span>
											<div class="offer-details">
												<h3>Online 24 / 7 Support</h3>
												<div class="divider-dotted">

												</div>
												<p>
													Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
												</p>
											</div>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</section>
				<!-- get our best offer section start-->
				<!-- best-dealers-wrap start here -->
				<section class="best-dealers-wrap">
					<div class="container">
						<div class="absolute-header-deal text-center">
							<h4>We have the Best Dealers</h4>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-3 dealer-listing bdr-right">
								<a href="#"><img src="assets/images/dealers1.png" alt="dealers" /></a>
							</div>
							<div class="col-xs-12 col-sm-3 dealer-listing bdr-right">
								<a href="#"><img src="assets/images/dealers2.png" alt="dealers" /></a>
							</div>
							<div class="col-xs-12 col-sm-3 dealer-listing bdr-right">
								<a href="#"><img src="assets/images/dealers3.png" alt="dealers" /></a>
							</div>
							<div class="col-xs-12 col-sm-3 dealer-listing ">
								<a href="#"><img src="assets/images/dealers4.png" alt="dealers" /></a>
							</div>
							<div class="col-xs-12 col-sm-3 dealer-listing bdr-right bdr-top">
								<a href="#"><img src="assets/images/dealers5.png" alt="dealers" /></a>
							</div>
							<div class="col-xs-12 col-sm-3 dealer-listing bdr-right bdr-top">
								<a href="#"><img src="assets/images/dealers6.png" alt="dealers" /></a>
							</div>
							<div class="col-xs-12 col-sm-3 dealer-listing bdr-right bdr-top">
								<a href="#"><img src="assets/images/dealers7.png" alt="dealers" /></a>
							</div>
							<div class="col-xs-12 col-sm-3 dealer-listing bdr-top">
								<a href="#"><img src="assets/images/dealers8.png" alt="dealers" /></a>
							</div>

						</div>
					</div>

				</section>
				<!-- best-dealers-wrap end here -->
				<!-- we_do-wrap section start here -->
				<section class="we_do-wrap">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12  col-md-5 car-drive-right">
								<div class="car-pic">

								</div>
							</div>
							<div class="col-xs-12  col-md-7 we-do-right">
								<div class="we-do-right-wrap">
									<div class="section-head">
										<h2>What <strong>we do?</strong></h2>
									</div>
									<div class="triangle-divider triangle-gap">

									</div>
									<div class="we_do-description clearfix">
										<p>
											Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
										</p>
										<div class="we-do-right-info  ">
											<p>
												Aenean vulputate eleifend tellus. Aenean leo ligula enim porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. llus viverra nulla ut metus variuseros, ultricies sit amtmpula
											</p>

											<ul class="white-list list-styled">
												<li>
													<span> Vestibulum ante ipsum primis in faucibus orci</span>
												</li>
												<li>
													<span> Phasellus leo dolor, tempus non, auc</span>
												</li>
												<li>
													<span>Curabitur ligula sapien, tincidunt hendrerit risus</span>
												</li>
											</ul>
										</div>

										<blockquote class="blockquote  blockquote-warning we-do-blockquote">
											<p>
												<span class="blockquote-sign">’’</span>Failure is simply the opportunity to begin again, this time more intelligently.
											</p>
										</blockquote>
									</div>

									<ul class="feature-we_do clearfix">
										<li class="small-item">
											<i class="fa fa-users" aria-hidden="true"></i>Large Support
											Team
										</li>
										<li>
											<i class="fa fa-user-secret" aria-hidden="true"></i>Best Company
											Advisors
										</li>
										<li>
											<i class="fa fa-life-ring" aria-hidden="true"></i>24/7 Support
											System
										</li>
										<li class="small-item">
											<i class="fa fa-lock" aria-hidden="true"></i>Powerful
											Security Offer
										</li>
										<li >
											<i class="fa fa-map" aria-hidden="true"></i>GPS Tracking
											and help
										</li>
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>Large Range of
											Car Models
										</li>
									</ul>

								</div>

							</div>
						</div>
					</div>
				</section>
				<!-- we_do-wrap section end here -->
				<!-- rental vehicles section start here -->
				<section class="rental-vehicles">
					<div class="container">
						<div class="row">
							<h2>Rental <span>Vehicles</span></h2>
							<p>
								Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor .
							</p>
							<p>
								Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
							</p>
							<div class="type-of-vehicle clearfix">
								<div class="row">
									<div class="col-sm-2 col-sm-offset-1">
										<div class="vehicle-item">

											<figure>
												<div class="vehicle"><img src="assets/images/vehicle.png" alt="" />
												</div>
												<figcaption>
													Scooters &amp; Bikes
												</figcaption>
											</figure>
										</div>
									</div>
									<div class="col-sm-2 ">
										<div class="vehicle-item">

											<figure>
												<div class="vehicle"><img src="assets/images/vehicles2.png" alt="" />
												</div>
												<figcaption>
													Personal Cars
												</figcaption>
											</figure>
										</div>
									</div>
									<div class="col-sm-2 ">
										<div class="vehicle-item">

											<figure>
												<div class="vehicle"><img src="assets/images/vehicles3.png" alt="" />
												</div>
												<figcaption>
													SUVS &amp; Pickups
												</figcaption>
											</figure>
										</div>
									</div>
									<div class="col-sm-2 ">
										<div class="vehicle-item">

											<figure>
												<div class="vehicle"><img src="assets/images/vehicles4.png" alt="" />
												</div>
												<figcaption>
													Family Cars
												</figcaption>
											</figure>
										</div>
									</div>
									<div class="col-sm-2 ">
										<div class="vehicle-item">

											<figure>
												<div class="vehicle"><img src="assets/images/vehicles5.png" alt="" />
												</div>
												<figcaption>
													Vans &amp; Trucks
												</figcaption>
											</figure>
										</div>
									</div>
								</div>
							</div>
							<div class="rental-per-day">
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="rental-car zoom">
											<figure>
											<img src="assets/images/car1.jpg" alt="" />
											</figure>
											<div class="car-details ">
												<div class="car-info clearfix">
													<h5>Volkswagen Passat CC</h5>
													<ul class="car-rating">
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-half-o" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</li>
													</ul>
												</div>
												<span>Start from <small> $48</small> <strong>/ Per day</strong></span>

											</div>
											<ul class="car-more-info clearfix">
												<li>
													<i class="fa fa-car" aria-hidden="true"></i>2011
												</li>
												<li>
													<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
												</li>
												<li>
													<i class="fa fa-cog" aria-hidden="true"></i>Auto
												</li>
												<li>
													<i class="fa fa-road" aria-hidden="true"></i>15000
												</li>
												<li class="orange-btn">
													<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="rental-car zoom">
											<figure><img src="assets/images/car2.jpg" alt="" /></figure>
											<div class="car-details ">
												<div class="car-info clearfix">
													<h5>Mercedes-Benz S63 AMG Coupe</h5>
													<ul class="car-rating">
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-half-o" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</li>
													</ul>
												</div>
												<span>Start from <small> $54</small> <strong>/ Per day</strong></span>

											</div>
											<ul class="car-more-info clearfix">
												<li>
													<i class="fa fa-car" aria-hidden="true"></i>2011
												</li>
												<li>
													<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
												</li>
												<li>
													<i class="fa fa-cog" aria-hidden="true"></i>Auto
												</li>
												<li>
													<i class="fa fa-road" aria-hidden="true"></i>15000
												</li>
												<li class="orange-btn">
													<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="rental-car zoom">
											<figure><img src="assets/images/car3.jpg" alt="" /></figure>
											<div class="car-details ">
												<div class="car-info clearfix">
													<h5>Mercedes AMG GT</h5>
													<ul class="car-rating">
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-half-o" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</li>
													</ul>
												</div>
												<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

											</div>
											<ul class="car-more-info clearfix">
												<li>
													<i class="fa fa-car" aria-hidden="true"></i>2011
												</li>
												<li>
													<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
												</li>
												<li>
													<i class="fa fa-cog" aria-hidden="true"></i>Auto
												</li>
												<li>
													<i class="fa fa-road" aria-hidden="true"></i>15000
												</li>
												<li class="orange-btn">
													<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="rental-car zoom">
											<figure><img src="assets/images/car4.jpg" alt="" /></figure>

											<div class="car-details ">
												<div class="car-info clearfix">
													<h5>Audi A8 Sport</h5>
													<ul class="car-rating">
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-half-o" aria-hidden="true"></i>
														</li>
														<li class="grey-star">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</li>
													</ul>
												</div>
												<span>Start from <small> $21</small> <strong>/ Per day</strong></span>

											</div>
											<ul class="car-more-info clearfix">
												<li>
													<i class="fa fa-car" aria-hidden="true"></i>2011
												</li>
												<li>
													<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
												</li>
												<li>
													<i class="fa fa-cog" aria-hidden="true"></i>Auto
												</li>
												<li>
													<i class="fa fa-road" aria-hidden="true"></i>15000
												</li>
												<li class="orange-btn">
													<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- rental vehicles section end here -->
				<section class="co-founder-section">
					<div class="container">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="co-founder text-center">
									<ul class="owl-carousel owl-theme review-profile">
										<li class="item">
											<figure>
												<img src="assets/images/girl.png" alt="" />
											</figure>
											<h5 class="view-title-style">John Doe</h5>
											<strong>Co-Founder of Let’s Drive Company</strong>
											<p>
												Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
											</p>
										</li>
										<li class="item">
											<figure>
												<img src="assets/images/girl.png" alt="" />
											</figure>
											<h5 class="view-title-style">John Doe</h5>
											<strong>Co-Founder of Let’s Drive Company</strong>
											<p>
												Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
											</p>
										</li>
										<li class="item">
											<figure>
												<img src="assets/images/girl.png" alt="" />
											</figure>
											<h5 class="view-title-style">John Doe</h5>
											<strong>Co-Founder of Let’s Drive Company</strong>
											<p>
												Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
											</p>
										</li>
										<li class="item">
											<figure>
												<img src="assets/images/girl.png" alt="" />
											</figure>
											<h5 class="view-title-style">John Doe</h5>
											<strong>Co-Founder of Let’s Drive Company</strong>
											<p>
												Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
											</p>
										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>
				</section>
				<section class="all-vehicles-wrapper">
					<div class="offer-overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<div class="all-vehicle">
									<h2><span> All</span> Vehicles</h2>
									<p>
										Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
									</p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
								<div class="payment-method">
									<h4><span> 6+ Payment</span> methods</h4>
									<ul class="payment-list clearfix">
										<li><img src="assets/images/card1.jpg" alt="" />
										</li>
										<li><img src="assets/images/card2.jpg" alt="" />
										</li>
										<li><img src="assets/images/card3.jpg" alt="" />
										</li>
										<li><img src="assets/images/card4.jpg" alt="" />
										</li>
										<li><img src="assets/images/card5.jpg" alt="" />
										</li>
										<li><img src="assets/images/card6.jpg" alt="" />
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="filter-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="filter clearfix">
									<h4> Filter By </h4>
									<select name="body-type">
										<option value="1">Body type</option>
										<option value="1">Body type</option>
									</select>
									<select name="engine-type">
										<option value="1">Engine's type</option>
										<option value="1">Engine's type</option>
									</select>
									<select name="gearbox-type">
										<option value="1">Gearbox Type</option>
										<option value="1">Gearbox Type</option>
									</select>
									<a href="#"><span>More info</span><i class="fa fa-info-circle" aria-hidden="true"></i></a>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car5.jpg" alt="" />
										<div class="filter-widgets">
											<strong> <a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car1.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Volkswagen Passat CC</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <em>$38</em> <small> $120</small> <strong>/ Per day</strong></span>
										<span class="discount">-20%</span>
									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car6.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car2.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Volkswagen Golf 2015</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car7.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car3.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Volkswagen Golf 2015 Gray</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $48</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car8.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car4.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Audi Q7 TDI Quattro</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>

							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car8.jpg" alt="" />
										<div class="filter-widgets">
											<strong> <a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car1.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Audi Q7 TDI Quattro</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <em>$38</em> <small> $120</small> <strong>/ Per day</strong></span>
										<span class="discount">-20%</span>
									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car9.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car2.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Audi SQ5 2015</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car10.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car3.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Audi 2015 R8</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $48</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car11.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car4.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Toyota Tacoma V6 2016</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>

							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car12.jpg" alt="" />
										<div class="filter-widgets">
											<strong> <a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car1.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Volkswagen Passat CC</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <em>$38</em> <small> $120</small> <strong>/ Per day</strong></span>
										<span class="discount">-20%</span>
									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car13.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car2.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Volkswagen Golf 2015</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car14.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car3.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Volkswagen Golf 2015 Gray</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $48</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="filter-cars">
									<div class="filter-inner">
										<img src="assets/images/car15.jpg" alt="" />
										<div class="filter-widgets">
											<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a class="fancybox-button" data-fancybox-group="fancybox-button" href="assets/images/car4.jpg" title=""><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
										</div>
									</div>
									<div class="filter-car-details clearfix">

										<h5>Audi Q7 TDI Quattro</h5>
										<ul class="filter-car-rating clearfix">
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li>
												<i class="fa fa-star" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
											</li>
											<li class="grey-star">
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</li>
										</ul>
										<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

									</div>
									<ul class="filter-car-more-info clearfix">
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>2011
										</li>
										<li>
											<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
										</li>
										<li>
											<i class="fa fa-cog" aria-hidden="true"></i>Auto
										</li>
										<li>
											<i class="fa fa-road" aria-hidden="true"></i>15000
										</li>
										<li class="orange-btn">
											<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
										</li>
									</ul>

								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="preview-more">
									<a href="#" class="button"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Preview more</a>
								</div>
							</div>
						</div>
					</div>

				</section>
				<div class="your-dreams-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<div class="your-dreams">
									<p>
										Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci.
									</p>
									<p>
										Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero.
									</p>
									<a href="#" class="orange-btn">Read More</a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="brand-logo-wrapper">
									<span>Get your</span>
									<strong>Own dream</strong>
									<ul class="brand-logo clearfix">
										<li><img src="assets/images/brand1.png" alt="" />
										</li>
										<li><img src="assets/images/brand2.png" alt="" />
										</li>
										<li><img src="assets/images/brand3.png" alt="" />
										</li>
										<li><img src="assets/images/brand4.png" alt="" />
										</li>
										<li><img src="assets/images/brand5.png" alt="" />
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<section class="executive-team-wrapper">
					<div class="container">
						<h2> Executive <span> Team</span></h2>
						<p>
							Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor.
						</p>
						<p>
							Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
						</p>
						<div class="row executive-team-description">
							<div class="col-sm-4">
								<div class="executive">
									<figure>
										<img src="assets/images/client-pic.jpg" alt="" />
									</figure>
									<h5>John Doe</h5>
									<strong>Co-Founder of Let’s Drive Company</strong>
									<p>
										Fusce vulputate eleifend sapiensrstibulum purus quam, scelerisque ut, mollis
									</p>
									<ul class="social-links">
										<li>
											<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="executive">
									<figure>
										<img src="assets/images/client-pic2.jpg" alt="" />
									</figure>
									<h5>John Doe</h5>
									<strong>Co-Founder of Let’s Drive Company</strong>
									<p>
										Fusce vulputate eleifend sapiensrstibulum purus quam, scelerisque ut, mollis
									</p>
									<ul class="social-links">
										<li>
											<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="executive">
									<figure>
										<img src="assets/images/client-pic3.jpg" alt="" />
									</figure>
									<h5>John Doe</h5>
									<strong>Co-Founder of Let’s Drive Company</strong>
									<p>
										Fusce vulputate eleifend sapiensrstibulum purus quam, scelerisque ut, mollis
									</p>
									<ul class="social-links">
										<li>
											<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="awards-wrapper">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-3">
									<div class="awards">
										<strong class="customers-text">1234 </strong><small>/   happy customers</small>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="awards">
										<strong class="luxury-text">612 </strong><small> /   Luxury cars</small>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="awards">
										<strong class="deals-text">2460 </strong><small> /   deals per year</small>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="awards">
										<strong class="won-text">132 </strong><small> /   Awards won</small>
									</div>
								</div>

							</div>
						</div>
					</div>

				</section>
				<section  class="map-wrapper">


					<div class="container map-float">
						<div class="row find-car">
							<div class="col-md-2 col-sm-12 padding-t-right-0">
								<div class="local-rental">
									<span>Local Rental</span>
									<strong>Find your car</strong>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 padding-t-right-0">
								<div class="input-text-wrap">
									<input type="text" placeholder="Airport or address" />
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
							</div>
							<div class="col-md-2 col-sm-6 padding-t-right-0">
								<div class="input-text-wrap">
									<input type="text" placeholder="04/03/2015"  class="pick-date"/>
									<i class="fa fa-calendar-o" aria-hidden="true"></i>
								</div>

							</div>
							<div class="col-md-2 col-sm-6 padding-t-right-0">
								<div class="input-text-wrap">
									<input type="text" placeholder="21:40 am" class="time-pick" />
									<i class="fa fa-clock-o" aria-hidden="true"></i>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 padding-t-right-0">
								<div class="car-btn">
									<a href="#" class="orange-btn"> <i class="fa fa-binoculars" aria-hidden="true"></i>Find a car </a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="floating-wrap">
								<div class="floating-car">
									<div class="filter-cars">
										<div class="filter-inner">
											<img src="assets/images/car15.jpg" alt="" />
											<div class="filter-widgets">
												<strong><a><i class="fa fa-heart" aria-hidden="true"></i></a> <a><i class="fa fa-refresh" aria-hidden="true"></i></a> <a><i class="fa fa-search-plus" aria-hidden="true"></i></a> </strong>
											</div>
										</div>
										<div class="filter-car-details clearfix">

											<h5>Audi Q7 TDI Quattro</h5>
											<ul class="filter-car-rating clearfix">
												<li>
													<i class="fa fa-star" aria-hidden="true"></i>
												</li>
												<li>
													<i class="fa fa-star" aria-hidden="true"></i>
												</li>
												<li>
													<i class="fa fa-star" aria-hidden="true"></i>
												</li>
												<li class="grey-star">
													<i class="fa fa-star-half-o" aria-hidden="true"></i>
												</li>
												<li class="grey-star">
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</li>
											</ul>
											<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

										</div>
										<ul class="filter-car-more-info clearfix">
											<li>
												<i class="fa fa-car" aria-hidden="true"></i>2011
											</li>
											<li>
												<i class="fa fa-tachometer" aria-hidden="true"></i>Diesel
											</li>
											<li>
												<i class="fa fa-cog" aria-hidden="true"></i>Auto
											</li>
											<li>
												<i class="fa fa-road" aria-hidden="true"></i>15000
											</li>
											<li class="orange-btn">
												<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>rent now</a>
											</li>
										</ul>

									</div>
								</div>
							</div>
						</div>

					</div>
					<div id="map-view"></div>
				</section>
				<section class="contact-us-wrapper">
					<div class="container">
						<h2>Contact <span>Us</span></h2>
						<div class="contact-us">
							<form name="contactForm" method="post"  novalidate id="contact" class="contact-form" data-ng-controller='themeonCtrl'>
								<div class="row">

									<div class="col-sm-4">
										<div class="input-text-wrap">
											<input type="text" placeholder="Name" id="name" class="contact-name" name="name" required data-ng-model="contactformData.name"  data-ng-class="{'error' : contactForm.name.$error.pattern || submit && contactForm.name.$invalid}" />
											<i class="fa fa-user" aria-hidden="true"></i>
										</div>
										<div class="input-text-wrap">
											<input type="email" placeholder="Email"  id="email" class="contact-mail" name="email"  required data-ng-model="contactformData.email" data-ng-class="{'error' : contactForm.email.$error.pattern || submit && contactForm.email.$invalid}"/>
											<i class="fa fa-envelope" aria-hidden="true"></i>
										</div>
										<div class="input-text-wrap">
											<input type="text" placeholder="Subject" id="sub" class="contact-subject" name="subject" required data-ng-model="contactformData.subject" data-ng-class="{'error' : contactForm.subject.$error.required && contactForm.subject.$blured || submit && contactForm.subject.$invalid}" />
											<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
										</div>

									</div>
									<div class="col-sm-8">
										<div class="textarea-wrap">
											<textarea placeholder="Your Message or Review" id="message" name="message" data-ng-model="contactformData.message" required data-ng-class="{'error' : contactForm.message.$error.required && contactForm.message.$blured || submit && contactForm.message.$invalid}"></textarea>
											<i class="fa fa-pencil" aria-hidden="true"></i>
										</div>

									</div>

								</div>
								<div class="row">
									<div class="col-sm-4">
										<p>
											Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor. Aenean massa.
										</p>
									</div>
									<div class="col-sm-8">
										<button type="submit"  class="orange-btn"  data-ng-click="submitcontactForm(contactForm.$invalid)" data-ng-disabled="submitButtonDisabled">
											<i class="fa fa-plus-circle" aria-hidden="true"></i>Send a message
										</button>
									</div>
								</div>
							</form>
						<div id="contactSuccess" style="display: none;">
								<span>Hey! Thanks for reaching out. I will get back to you soon</span>
							</div>
						</div>
						<strong class="some-help">Need Some Help?</strong>
					</div>
				</section>
				<section class="need-help-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="need-help">
									<i class="fa fa-headphones"> </i>
									<h2>Need a Help or have a question? <strong> Call Us</strong></h2>
									<a href="callto:88001234567">8 800 12 34 567</a>
								</div>
							</div>
						</div>
						<div class="read-blog-wrapper">
							<div class="row">
								<div class="col-sm-12">
									<figure>
										<img src="assets/images/comma.png" alt="" />
									</figure>
									<h2>Read our <strong> Blog</strong></h2>
									<p>
										Lorem ipsum dolor sit amet, onsectetuer adipiscing elitcommodo ligula eget dolor.
									</p>
									<p>
										Aenean massa. Cum sociis natoque tibus et magnis dis parturient montes.
									</p>
								</div>
							</div>
						</div>

						<div class="read-blog-listing">

							<div class="blog-read-wrap" id="blog-slider">
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i></span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="item">
									<h5>Blog post title</h5>
									<p>
										Fusce vulputate eleifend sapien. stibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
									</p>

									<div class="blog-date-comment">
										<span class="blog-date">06 August 2015</span>
										<span class="blog-favorate"> / 426 <i class="fa fa-heart" aria-hidden="true"></i> </span>
										<span class="blog-comment"> / 12 <i class="fa fa-commenting" aria-hidden="true"></i></span>
									</div>
								</div>

							</div>

							<a href="#" class="button carousal-btn"><i class="fa fa-newspaper-o" aria-hidden="true"></i>view all</a>
						</div>

					</div>
				</section>

				<section class="newsletter-wrap">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-5 padding-right-0">
								<h2>Subscribe <strong>to Newsletter</strong></h2>
							</div>
							<div class="col-xs-12 col-sm-7 ">
								<form action="#" method="get" class="subscribe-form">
									<div class="row">
										<div class="col-xs-12 col-sm-7">
											<div class="subscriber-info">
												<input type="text" name="text" class="newsletter-text" placeholder="Enter your email"/>
												<i class="fa fa-envelope" aria-hidden="true"> </i>
											</div>

										</div>
										<div class="col-xs-12 col-sm-5">
											<input type="submit" value="subscribe now" class="orange-btn" />
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>

				</section>

			</div>
			<!--Content Area End-->

			<!--Footer Section start-->
			<footer id="footer" class="bdr-0">
				<div class="primary-footer">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="about-us-footer">
									<h5 class="view-title-style">About Us</h5>
									<p>
										Envato is proudly based in Melbourne, Australia, but our people and community live and work from all over the world.
									</p>
									<p>
										We believe good ideas deserve a chance to grow. We believe people deserve to earn a living doing what they love.
									</p>
								</div>
							</div>

							<div class="col-xs-12 col-sm-4 text-center footer-img-gap">
								<a href="index.html" class="footer-logo"><img src="assets/images/footer-logo.jpg" alt="lets drive" /></a>
							</div>
							<div class="col-xs-12 col-sm-4 text-right contact-info-footer">
								<h5 class="view-title-style">Contact Us</h5>
								<address>
									PO Box: 16122 Collins Victoria 8007 <span class="line-break"></span>
									Address: 121 King Street, Melbourne<span class="line-break"></span>
									Victoria <span class="line-break"></span>
									3000 Australia <span class="line-break"></span>
									Email:<a href="mailto:mail@letsdrive.com"> mail@letsdrive.com</a><span class="line-break"></span>
									Phone: <a href="tel:88001234567">8 800 12 34 567</a><span class="line-break"></span>
									Fax: <a href="fax:80009876543 ">+8 000 98 76 543 </a><span class="line-break"></span>
								</address>
							</div>
						</div>
					</div>
				</div>

				<div class="footer-bottom text-center">
					<div class="container">
						<span>&copy; All Rights Reserved. Create by <a href=" http://theemon.com">theem'on</a></span>
					</div>
				</div>

			</footer>

			<!--Footer Section End-->
		</div>
		<div class="location-group">
			<div id="location1">
				<div id="Locate_1" class="filter-cars">
					<div class="filter-inner">
						<img alt="" src="assets/images/car13.jpg">

					</div>
					<div class="filter-car-details clearfix">

						<h5>Volkswagen Golf 2015</h5>
						<ul class="filter-car-rating clearfix">
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-half-o"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-o"></i>
							</li>
						</ul>
						<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

					</div>
					<ul class="filter-car-more-info clearfix">
						<li>
							<i aria-hidden="true" class="fa fa-car"></i>2011
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-tachometer"></i>Diesel
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-cog"></i>Auto
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-road"></i>15000
						</li>
						<li class="orange-btn">
							<a href="#"><i aria-hidden="true" class="fa fa-plus-circle"></i>rent now</a>
						</li>
					</ul>

				</div>
			</div>
					<div id="location2">
				<div id="Locate_2" class="filter-cars">
					<div class="filter-inner">
						<img alt="" src="assets/images/car13.jpg">

					</div>
					<div class="filter-car-details clearfix">

						<h5>Volkswagen Golf 2015</h5>
						<ul class="filter-car-rating clearfix">
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-half-o"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-o"></i>
							</li>
						</ul>
						<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

					</div>
					<ul class="filter-car-more-info clearfix">
						<li>
							<i aria-hidden="true" class="fa fa-car"></i>2011
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-tachometer"></i>Diesel
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-cog"></i>Auto
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-road"></i>15000
						</li>
						<li class="orange-btn">
							<a href="#"><i aria-hidden="true" class="fa fa-plus-circle"></i>rent now</a>
						</li>
					</ul>

				</div>
			</div>
			<div id="location3">
				<div id="Locate_3" class="filter-cars">
					<div class="filter-inner">
						<img alt="" src="assets/images/car13.jpg">

					</div>
					<div class="filter-car-details clearfix">

						<h5>Volkswagen Golf 2015</h5>
						<ul class="filter-car-rating clearfix">
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-half-o"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-o"></i>
							</li>
						</ul>
						<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

					</div>
					<ul class="filter-car-more-info clearfix">
						<li>
							<i aria-hidden="true" class="fa fa-car"></i>2011
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-tachometer"></i>Diesel
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-cog"></i>Auto
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-road"></i>15000
						</li>
						<li class="orange-btn">
							<a href="#"><i aria-hidden="true" class="fa fa-plus-circle"></i>rent now</a>
						</li>
					</ul>

				</div>
			</div>
				<div id="location4">
				<div id="Locate_4" class="filter-cars">
					<div class="filter-inner">
						<img alt="" src="assets/images/car13.jpg">

					</div>
					<div class="filter-car-details clearfix">

						<h5>Volkswagen Golf 2015</h5>
						<ul class="filter-car-rating clearfix">
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li>
								<i aria-hidden="true" class="fa fa-star"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-half-o"></i>
							</li>
							<li class="grey-star">
								<i aria-hidden="true" class="fa fa-star-o"></i>
							</li>
						</ul>
						<span>Start from <small> $120</small> <strong>/ Per day</strong></span>

					</div>
					<ul class="filter-car-more-info clearfix">
						<li>
							<i aria-hidden="true" class="fa fa-car"></i>2011
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-tachometer"></i>Diesel
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-cog"></i>Auto
						</li>
						<li>
							<i aria-hidden="true" class="fa fa-road"></i>15000
						</li>
						<li class="orange-btn">
							<a href="#"><i aria-hidden="true" class="fa fa-plus-circle"></i>rent now</a>
						</li>
					</ul>

				</div>
			</div>

		</div>

		<!--Page Wrapper End-->
		<script type="text/javascript" src="{{ asset('frontend/js/angular.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/less.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/app.js') }}"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery.selectBox.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>

		<!-- revolution slider Js -->
		<script type="text/javascript" src="{{ asset('frontend/js//jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery.themepunch.revolution.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery.revolution.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.video.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.slideanims.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.actions.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.layeranimation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.kenburn.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.navigation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.migration.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend/extensions/revolution.extension.parallax.min.js') }}"></script>
		<!--  revolution slider Js -->
        <!-- map                     -->
        <script type="text/javascript" src="{{ asset('frontend/js/map.js') }}"></script>
         <!-- map                     -->
		<script type="text/javascript" src="{{ asset('frontend/js/site.js') }}"></script>

	</body>
</html>