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
                    <h2>Cart</h2>
                    <div class="featured-flat">
                        <div class="row">



                        </div>
                        <div class="row">
               <div class="col-md-12 ticket-card cart">
                 <ul class="list-inline">
                                          <li class="list-inline-item">From: {{ Carbon\Carbon::parse(Session::get('cart')['start_date'] )->format('d-m-Y ')}}</li>
                                          <li class="list-inline-item">To: {{ Carbon\Carbon::parse(Session::get('cart')['end_date'] )->format('d-m-Y ')}}</li>
                                      </ul>
                   <table class="table" summary="Cart Details">
                       <tbody>
                           <tr>
                               <th scope="row">No of Days:</th>
                           <td> {{Session::get('cart')['days']}}</td>
                           </tr>
                           @if(Session::get('cart')['driver_option']==1)
                           <tr>
                               <th scope="row">Daily Self Drive Rate :</th>
                           <td> UGX {{number_format(Session::get('cart')['selfdriverate'],0)}}</td>
                           </tr>
                           <tr>
                               <th scope="row">Self Drive Fee:</th>
                           <td> UGX {{number_format(Session::get('cart')['selfdrive'],0)}}</td>
                           </tr>
                           @else
                           <tr>
                               <th scope="row">Daily Driver  Rate :</th>
                           <td>UGX {{number_format(Session::get('cart')['dailydriverrate'],0)}}</td>
                           </tr>
                           <tr>
                               <th scope="row">Driver Fee :</th>
                           <td>UGX {{number_format(Session::get('cart')['driverrate'],0)}}</td>
                           </tr>

                           @endif
                           <tr>
                               <th scope="row">Trip total</th>
                           <td>UGX {{ number_format(Session::get('cart')['totalcost'],0)}}</td>
                           </tr>
                           <tr>
                               <th scope="row">Trip Fee</th>
                               <td>UGX {{ number_format(Session::get('cart')['tripfee'],0)}}</td>
                           </tr>
                           <tr>
                               <th scope="row">Total Amount</th>
                               <td>UGX {{ number_format(Session::get('cart')['totalamount'],0)}}</td>
                           </tr>
                           <tr class="total-area">
                               <th scope="row">Total to pay</th>
                               <td>UGX {{ number_format(Session::get('cart')['totalamount'],0)}}</td>
                           </tr>
                       </tbody>
                   </table>

                   <button type="submit" class="btn btn-primary mb-2 btn-proceed"><a href="#">Pay for Ticket</a></button>
               </div>
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
