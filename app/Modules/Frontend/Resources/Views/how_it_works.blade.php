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
                                    <li><a href="#safety_support"  data-toggle="tab">Safety & support </a></li>
                                    <!-- <li><a href="#settings_1"  data-toggle="tab">Settings</a></li> -->
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active col-md-12" id="car_renters">
										<h3 class="mb-40 mt-50 text-center">Getting a rental on Chariots</h3>
										<div class="col-md-12">
											<div class="col-md-1 col-md-offset-3"><img src="images/icons/user-sign-up-64px.png" alt="Car renter signs up"></div>
											<div class="col-md-6 mt-10">
												<h5>Sign up for Chariots</h5>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et repellendus enim inventore dolor libero ex assumenda nemo, aspernatur rerum qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, aliquid.</p>
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-1 col-md-offset-3"><img src="images/icons/user-sign-up-64px.png" alt="Car renter signs up"></div>
											<div class="col-md-6 mt-10">
												<h5>Find your ideal car</h5>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et repellendus enim inventore dolor libero ex assumenda nemo, aspernatur rerum qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, aliquid.</p>
											</div>
										</div>
                                    </div>
                                    <div class="tab-pane fade" id="car_owners">
                                        <p>2 - Consectetur adipisicing elit. Et repellendus enim inventore dolor libero ex assumenda nemo, aspernatur rerum quirem ipsum dolor sit amet Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, aliquid.</p>
                                    </div>
                                    <div class="tab-pane fade" id="safety_support">
                                        <p>3 - Dipisicing elit. Et repellendus enim inventore dolor libero ex assumenda nemo, aspernatur rerum qui Lorem ipsum dolor sit amet, consectetur a. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, aliquid.</p>
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