@extends('frontend::layouts.main')

@section('assets')
     <link rel="stylesheet" href="{{asset('css/dark-header.css')}}">
@endsection

@section('content')


<!-- Start page content -->
<div id="page-content" class="page-wrapper">

    <!-- CONTACT AREA START -->
    <div class="contact-area pt-115 pb-115 mt-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-xs-12">
                    <!-- get-in-toch -->
                    <div class="get-in-toch">
                        <div class="section-title mb-30">
                            <h3>GET IN TOUCH</h3>
                        </div>
                        <div class="contact-desc mb-50">
                            <p>Our support teams are just a call away</p>
                        </div>
                        <ul class="contact-address">
                            <li>
                                <div class="contact-address-icon">
                                    <img src="images/icons/location-3.png" alt="">
                                </div>
                                <div class="contact-address-info">
                                    <span>12 Semawata Place (Kimera Road Entrance),</span>
                                    <span>Ntinda, Kampala, Uganda.</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-address-icon">
                                    <img src="images/icons/phone-4.png" alt="">
                                </div>
                                <div class="contact-address-info">
                                    <span>Telephone : (+256) 000 000000</span>
                                    <span>Telephone : (+256) 111 111111</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-address-icon">
                                    <img src="images/icons/world-1.png" alt="">
                                </div>
                                <div class="contact-address-info">
                                    <span>Email : enquiries@chariotrentals.com</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <div class="contact-messge contact-bg">
                        <!-- blog-details-reply -->
                        <div class="leave-review">
                            <h5>Leave a Message</h5>
                            <form  id="contact-form" action="mail.php" method="post">
                                <input type="text" name="name" placeholder="Your name">
                                <input type="email" name="email" placeholder="Email">
                                <textarea name="message" placeholder="Write here"></textarea>
                                <button type="submit" class="submit-btn-1">SUBMIT</button>
                            </form>
                            <p class="form-messege mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT AREA END -->

</div>


@endsection
