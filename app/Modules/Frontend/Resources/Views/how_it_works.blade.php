@extends('frontend::layouts.main')

@section('assets')
     <link rel="stylesheet" href="{{asset('css/dark-header.css')}}">
@endsection

@section('content')


<!-- Start page content -->
<div id="page-content" class="page-wrapper">

    <!-- ELEMENTS AREA START -->
    <div class="elements-area ptb-115">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="elements-tab-1">
				                  <h6 class="mb-50 smaller-h6">HOW IT WORKS</h6>
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#car_renters"  data-toggle="tab">Car renters</a></li>
                                <li><a href="#car_owners"  data-toggle="tab">Car owners</a></li>
                                <li><a href="#safety_support"  data-toggle="tab">Support & safety</a></li>
                                <!-- <li><a href="#settings_1"  data-toggle="tab">Settings</a></li> -->
                            </ul>
                        <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active col-md-12" id="car_renters">
									<h3 class="mb-40 mt-50 text-center">Getting a car on Chariot Rentals</h3>
									<div class="col-md-12">
										<div class="col-md-1 col-md-offset-3"><img src="images/icons/sign-up-64px.png" alt="Signs up"></div>
										<div class="col-md-6 mt-10">
											<h4>Sign up</h4>
											<p>Joining Chariot Rentals is a simple process and costs you nothing to create your account. You will need to upload scans of your driver's license or other relevant identity documents.</p>
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-1 col-md-offset-3"><img src="images/icons/tesla_model_s_1.png" alt="Find car"></div>
										<div class="col-md-6 mt-10">
											<h4>Find your ideal car</h4>
											<p>Browse through a diverse listing of cars for all occasions or adventures from regular sedans to luxury SUVs.</p>
										</div>
									</div>
                                  <div class="col-md-12">
                                    <div class="col-md-1 col-md-offset-3"><img src="images/icons/make-booking_1.png" alt="Book a car"></div>
                                    <div class="col-md-6 mt-10">
                                      <h4>Make your booking</h4>
                                      <p>Make your booking and once confirmed with your host, you are ready roll.</p>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="col-md-1 col-md-offset-3"><img src="images/icons/road-trip_1.png" alt="hit the road"></div>
                                    <div class="col-md-6 mt-10">
                                      <h4>Hit the road</h4>
                                      <p>You can pick up a car from an agreed location or have it delivered to you. Always keep in mind the usage rules set by your host.</p>
                                    </div>
                                  </div>
								  <div class="col-md-12">
                                    <div class="col-md-1 col-md-offset-3"><img src="images/icons/hand_shake_1.png" alt="Return car"></div>
                                    <div class="col-md-6 mt-10">
                                      <h4>Return car</h4>
                                      <p>Drop off the car, thank your host and be sure to give a review or any feedback of your experience.</p>
                                    </div>
                                  </div>
								  <!-- Find a Rental Call to action -->
								  <div class="col-md-12 renter-cta">
								      <div class="col-md-6">
                                        <div class="find-home-item renter-area5">
											<p>Whether you're in the need for a small single seater or a car that fits your entire family.</p>
											<p>You'll find it here on Chariots Rentals</p>
                                            <a class="button-1 btn-hover-1" href="#">Find a rental</a>
                                        </div>
									  </div>
									  <div class="col-md-6 renter-area6">
										<img src="images/flat/toyota-hilux-pickup-truck.png">
									  </div>
								  </div>

								   <!-- END Find a Rental Call to action -->
                                </div>
						<!-- Next Tab -->
                                <div class="tab-pane fade" id="car_owners">
									<h3 class="mb-40 mt-50 text-center">Your car on Chariot Rentals, the perfect pair</h3>
									<div class="col-md-12">
										<div class="col-md-1 col-md-offset-3"><img src="images/icons/sign-up-64px.png" alt="Signs up"></div>
										<div class="col-md-6 mt-10">
											<h4>Sign up as a host</h4>
											<p>Register for a free account as a host, upload valid identification documents. Your car will have to undergo a mandatory inspection from a certified Auto Repair Shop/Garage.</p>
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-1 col-md-offset-3"><img src="images/icons/list-cars_1.png" alt="List your car"></div>
										<div class="col-md-6 mt-10">
											<h4>List your cars</h4>
											<p>Log into your dashboard and list your car, upload real photos of your car’s interior and exterior, select or add key features it possesses and finally list your conditions for use if any.</p>
										</div>
									</div>
                                  <div class="col-md-12">
                                    <div class="col-md-1 col-md-offset-3"><img src="images/icons/make-booking_1.png" alt="Schedule car availability"></div>
                                    <div class="col-md-6 mt-10">
                                      <h4>Schedule availability of cars</h4>
                                      <p>Mark out the period of time when your car is available, keep in mind that unscheduled cars will not appear on search listing pages.</p>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="col-md-1 col-md-offset-3"><img src="images/icons/replies_1.png" alt="Respond to requests"></div>
                                    <div class="col-md-6 mt-10">
                                      <h4>Respond to requests</h4>
                                      <p>Be on the look out for notifications of booking inquiries made for your scheduled cars. Respond to them in time and confirm inquiries that are satisfactory to your usage conditions.</p>
                                    </div>
                                  </div>
								  <div class="col-md-12">
                                    <div class="col-md-1 col-md-offset-3"><img src="images/icons/earned_money_1.png" alt="Start earning"></div>
                                    <div class="col-md-6 mt-10">
                                      <h4>Start earning</h4>
                                      <p>Arrange to hand over the keys or deliver your car to the renter as agreed and on-time. Then sit back and start earning.</p>
                                    </div>
                                  </div>
								  <!-- List your car Call to action -->
								  <div class="col-md-12 owner-cta">
								      <div class="col-md-6">
                                        <div class="find-home-item owner-area5">
											<p>Your car is an asset.</p>
											<p>List your car today and join hundreds of car owners on Chariots gracefully raking in that extra cash.</p>
                                            <a class="button-1 btn-hover-1" href="#">Register your car</a>
                                        </div>
									  </div>
									  <div class="col-md-6 ownerr-area6">
										<img src="images/flat/Merc-E-Class.png">
									  </div>
								  </div>

								   <!-- END List your car Call to action -->
                                </div>

						<!-- Next Tab -->
                                <div class="tab-pane fade" id="safety_support">
                                  <!-- SUPPORT AND SAFETY AREA START -->

                                  <div class="experience-inquiry-area pb-115">
                                      <div class="container">
                                          <div class="row">
                                              <h3>Support channels</h3>
                                              <div class="col-sm-6 right-separator">
                                                  <div class="experience">
                                                      <h5><img src="images/icons/phone-call.png" alt="Call Us"></h5>
                                                      <p class="contact-links"><span class="unik-bold">Call:</span> +256 759 123456</p>
                                                  </div>
                                              </div>
                                              <div class="col-sm-6 right-block">
                                                  <div class="experience">
                                                      <h5><img src="images/icons/email_1.png" alt="Email Us"></h5>
                                                      <p class="contact-links"><span class="unik-bold">Email:</span> support@chariotrentals.com</p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="experience-inquiry-area pb-80">
                                      <div class="container">
                                          <div class="row">
                                              <h3>Safety tips</h3>
                                              <div class="col-sm-6">
                                                  <div class="experience">
                                                      <h4>For drivers</h4>
                                                      <div><img src="images/blog/lady-driver.jpg" alt="Car Drivers"></div>
                                                      <i class="fa fa-check col-sm-1"></i><p class="col-sm-11">Ensure the car's insurane policy will be valid for the entire period of your reserved days.</p>
                                                      <i class="fa fa-check col-sm-1"></i><p class="col-sm-11">Inspect the car and ensure it's in good working condition before accepting it.</p>
                                                      <i class="fa fa-check col-sm-1"></i><p class="col-sm-11">After your trip please find time to review and rate your host to gaurantee continuous first class service delivery on the platform.</p>
                                                  </div>
                                              </div>
                                              <div class="col-sm-6">
                                                  <div class="experience">
                                                      <h4>For car owners</h4>
                                                      <div><img src="images/blog/car-owner-couple.jpg" alt="Car Owners"></div>
                                                      <i class="fa fa-check col-sm-1"></i><p class="col-sm-11">We highly recommend a comprehensive insurance policy for all your listed cars. Do not rent our you car if your insurance policy is invalid.</p>
                                                      <i class="fa fa-check col-sm-1"></i><p class="col-sm-11">Always verify the identity of the driver before handing it over to them. Do not hand over your car to anyone other than the officially registered renter.</p>
                                                      <i class="fa fa-check col-sm-1"></i><p class="col-sm-11">Review and rate renters after each trip to ensure continued first class service for you and fellow hosts on the platform.</p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                                  <!-- SUPPORT AND SAFETY AREA END -->
                                </div>
                        <!--        <div class="tab-pane fade" id="settings_1">
                                    <p>4 - Et repellendus enim inventore dolor libero ex assumenda nemo, aspernatur rerum qui Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, aliquid.</p>
                                </div>
    					-->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ELEMENTS AREA END -->
</div>
<!-- End page content -->


@endsection
