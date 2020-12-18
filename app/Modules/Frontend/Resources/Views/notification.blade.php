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
                    <h2>Booking processing</h2>
                    <div class="featured-flat">
                        <div class="row">



                        </div>
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
