<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Chariots | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/icons/favicon.png')}}">

    <!-- All css files are included here. -->
	<!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('css/core.css')}}">
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<!-- nivo slider CSS -->
    <link rel="stylesheet" href="{{asset('lib/css/nivo-slider.css')}}"/>
    
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
	<!-- <link rel="stylesheet" href="css/fontawesome.min.css"> 
	<link rel="stylesheet" href="css/solid.min.css">
	<link rel="stylesheet" href="css/regular.min.css"> -->
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Template color css -->
    <link href="{{asset('css/color/color-core.css')}}" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">


    <!-- Modernizr JS -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
	<script src="{{asset('js/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type='text/javascript'></script>
	<script src="{{asset('js/svg-with-js.min.css')}}" type='text/javascript'></script>
	
	<link href="{{asset('js/datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel='stylesheet' type='text/css'>
	
	@yield('assets')
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
	
        <!-- HEADER AREA START -->
        <header class="header-area header-wrapper">
            <div class="header-top-bar bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="logo">
                                <a href="{{url('/')}}">
                                    <!-- <img src="images/logo/logo.png" alt=""> -->
									CHARIOTS
                                </a>
                            </div>
                        </div>
<!--                        <div class="col-md-6 hidden-sm hidden-xs">
                            <div class="company-info clearfix">
                                <div class="company-info-item">
                                    <div class="header-icon">
                                        <img src="images/icons/phone.png" alt="">
                                    </div>
                                    <div class="header-info">
                                        <h6>+88 (012) 564 979 56</h6>
                                        <p>We are open 9 am - 10pm</p>
                                    </div>
                                </div>
                                <div class="company-info-item">
                                    <div class="header-icon">
                                        <img src="images/icons/mail-open.png" alt="">
                                    </div>
                                    <div class="header-info">
                                        <h6><a href="mailto:hnasir770@gmail.com">info@Chariots.com</a></h6>
                                        <p>You can mail us</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="header-search clearfix">
                                <form action="#">
                                    <button class="search-icon" type="submit">
                                        <img src="images/icons/search.png" alt="">
                                    </button>
                                    <input type="text" placeholder="Search...">
                                </form>
                            </div>
                        </div>
						-->
                    </div>
                </div>
            </div>
			
            <div id="sticky-header" class="header-middle-area  transparent-header hidden-xs dark-header">
                <div class="container">
                    <div class="full-width-mega-drop-menu">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sticky-logo">
                                    <a href="{{url('/')}}">
                                        <!-- <img src="images/logo/logo.png" alt=""> -->
										<span>CHARIOTS</span>
                                    </a>
                                </div>
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="{{url('how-it-works')}}">How it works</a></li>
                                        <li><a href="#">List your car</a></li>
                                        <li><a href="#">Sign up</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">EN-UK</a>
                                            <ul class="drop-menu menu-right">
                                                <li><a href="#">Français</a></li>
                                                <li><a href="#">Swahili</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER AREA END -->

        <!-- MOBILE MENU AREA START -->
        <div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="{{url('how-it-works')}}">How it works</a></li>
                                    <li><a href="#">List your car</a></li>
                                    <li><a href="#">Sign up</a></li>
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">EN-UK</a>
                                        <ul>
                                            <li><a href="#">Français</a></li>
                                            <li><a href="#">Swahili</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- MOBILE MENU AREA END -->
		@yield('content')

			<!-- SLIDER SECTION START -->
               

        <!-- Start footer area -->
        <footer id="footer" class="footer-area bg-2 bg-opacity-black-90">
            <div class="footer-top pt-110 pb-80">
                <div class="container">
                    <div class="row">
                        <!-- footer-address -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget">
                                <h6 class="footer-titel">GET IN TOUCH</h6>
                                <ul class="footer-address">
                                    <li>
                                        <div class="address-icon">
                                            <img src="images/icons/location-2.png" alt="">
                                        </div>
                                        <div class="address-info">
                                            <span>12 Semawata Place </br>(Kimera Road Entrance),</span>
                                            <span>Ntinda, Kampala,</span>
											<span>Uganda.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="address-icon">
                                            <img src="images/icons/phone-3.png" alt="">
                                        </div>
                                        <div class="address-info">
                                            <span>Telephone : (256) 4242  4343</span>
                                            <span>Telephone : (256) 7040  0000</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="address-icon">
                                            <img src="images/icons/world.png" alt="">
                                        </div>
                                        <div class="address-info">
                                            <span>Email : enquiries@chariotapp.com</span>
                                            <span>Web :<a href="#" target="_blank"> www.chariotapp.com</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- footer-latest-news -->
                        <div class="col-lg-3 col-md-5 hidden-sm col-xs-12">
                            <div class="footer-widget middle">
                                <h6 class="footer-titel">CHARIOTS</h6>
                                <ul class="footer-latest-news">
                                    <li>
                                        <div class="latest-news-info">
                                            <h6><a href="#">About us</a></h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-news-info">
                                            <h6><a href="#">Get help</a></h6>
                                        </div>
                                    </li>
									                                    <li>
                                        <div class="latest-news-info">
                                            <h6><a href="#">FAQs</a></h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-news-info">
                                            <h6><a href="#">Terms</a></h6>
                                        </div>
                                    </li>
									<li>
                                        <div class="latest-news-info">
                                            <h6><a href="#">Privacy</a></h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-5 hidden-sm col-xs-12">
                            <div class="footer-widget middle">
                                <h6 class="footer-titel">Learn more</h6>
                                <ul class="footer-latest-news">
                                    <li>
                                        <div class="latest-news-info">
                                            <h6><a href="{{url('how-it-works')}}">How it works</a></h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-news-info">
                                            <h6><a href="#">List your car</a></h6>
                                        </div>
                                    </li>
									                                    <li>
                                        <div class="latest-news-info">
                                            <h6><a href="#">Earn more</a></h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- footer-contact -->
						<div class="col-lg-3 col-md-5 hidden-sm col-xs-12">
                            <div class="footer-widget middle">
                                <div class="col-md-4">
									<i class ="fa fa-facebook fa-2x"></i>
								</div>
								<div class="col-md-4">
									<i class ="fa fa-instagram fa-2x"></i>
								</div>
								<div class="col-md-4">
									<i class ="fa fa-twitter fa-2x"></i>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright text-center">
                                <p>Copyright &copy; 2020 | <span style="color:#aa00ff;">CHARIOTS</span> | All rights reserved. Powered by <a href="http://www.wizimara.com" target="_blank"><b style="color:#00ADEF;">WIZIMARA</b></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->




    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{asset('js/vendor/jquery-3.1.1.min.js')}}"></script>
	<!-- Moment js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Nivo slider js -->    
    <script src="{{asset('lib/js/jquery.nivo.slider.js')}}"></script>
    <!-- ajax-mail js -->
    <script src="{{asset('js/ajax-mail.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('js/main.js')}}"></script>
	<!-- Date/Time Picker --> 
	<script type="text/javascript">
		$(".form_datetime").datetimepicker({
			format: "dd MM yyyy - hh:ii",
			autoclose: true,
			todayBtn: true,
			pickerPosition: "bottom-left"
		});
	</script>            

</body>

</html>