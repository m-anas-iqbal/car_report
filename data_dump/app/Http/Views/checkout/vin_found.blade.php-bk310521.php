<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VINSUPERINFO | OUR PACKAGES.</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"> 
    
    <style>
        #precheck{
            max-width: 100%;
        }
        #pay-block{
            overflow-y: scroll;
        }
        #precheck .sep {
            height: 1px;
            background-position: 0 0;
            background-repeat: repeat-x;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAABCAQAAAAVg2TsAAAAFUlEQVR4AWNgkARCHgYY4AHxSREDADINAadV3xmbAAAAAElFTkSuQmCC);
            margin: 20px 0 20px;
        }
        .s-card {
            box-shadow: 0 30px 60px rgba(0,0,0,.14);
        }
        .s-card {
            max-width: 480px;
        }
        .s-card .s-head {
            border-radius: 10px 10px 0 0;
            background: #e7e7e7;
            height: 30px;
            display: flex;
            padding-left: 20px;
            padding-right: 20px;
            justify-content: flex-end;
            align-items: center;
        }
        .s-card .s-body {
            background: #fff;
        }
        .rep-sample .s-body {
            padding: 20px;
            overflow: hidden;
        }
        .rep-sample .logo {
            max-width: 40px;
        }
        .rep-sample .title {
            color: #a2a2a2;
            font-size: .95rem;
            text-transform: uppercase;
        }
        #precheck h3 {
            font-size: 1.375rem;
            font-weight: 800;
            color: #000;
            margin-bottom: 15px;
        }
        .rep-sample p {
            font-size: .95rem;
        }
        .rep-sample .pan {
            padding: 1rem .8rem;
            background: #f5f5f5;
            border-radius: 10px;
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 100%;
            text-align: center;
        }
        .rep-sample .pan span {
            width: 55px;
            height: 55px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 7px;
            position: relative;
        }
        .rep-sample .pan:not(.fail) span::before {
            content: url(/images/check-green-cr.svg);
            width: 28px;
            height: 28px;
            position: absolute;
            border-radius: 50%;
            box-shadow: 0 3px 8px rgba(0,0,0,.12);
            top: -3px;
            left: calc(50% - 43px);
        }
        .rep-sample h5 {
            color: #000;
            font-weight: 800;
            max-width: 180px;
            font-size: 1rem;
            line-height: 1.1;
            margin-bottom: 5px;
        }
        .rep-sample .pan i {
            display: none;
        }
        div.report-pan-icon {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-size: contain !important;
        }
        .s-col::after {
            background: linear-gradient(0deg,#fff 0,#fff 40%,rgba(255,255,255,0) 100%);
            height: 230px;
            content: "";
            position: absolute;
            bottom: -25px;
            left: -20px;
            right: -20px;
        }
        .rep-sample .title {
            color: #a2a2a2;
            font-size: .95rem;
            text-transform: uppercase;
        }
        #precheck h3 {
            font-size: 1.375rem;
            font-weight: 800;
            color: #000;
            margin-bottom: 15px;
        }
        .blc {
            color: #F57615;
        }
        .fw-800 {
            font-weight: 800 !important;
        }
        .fw-900 {
            font-weight: 900 !important;
        }
        .report_prev .btn-copy::after, .btn-r::after {
            content: "";
            width: 16px;
            height: 30%;
            background: url(/img/fontawesome-icon/chevron-right-solid.svg) no-repeat center;
            right: 1rem;
            top: calc(50%) !important;
            transform: translateY(-50%) !important;
            font-size: 20px;
            line-height: 20px;
            position: absolute;
        }
        .report_prev .btn-outline-primary.btn-r::after {
            background: url(/img/fontawesome-icon/chevron-right-solid-blue.svg) no-repeat center;
            right: 12px;
        }
        .report_prev .btn {
            border-radius: 50px;
            color: #fff;
            font-weight: 800;
            font-size: 1.125rem;
            outline: 0 none !important;
            padding: .6rem 2rem;
            transition: all ease .3s;
        }
        .btn-spl {
            position: relative;
            z-index: 1;
            top: -20px;
            background: #fff;
        }
        .btn-outline-primary {
            border: 2px solid #0493d3;
            color: #0493d3 !important;
        }
        .rep_logo_pre{
            font-weight: 900;
            margin-left: 0px;
            color: #182C53;
            font-size: 20px;
        }
        .rep_logo_pre img{
            max-width: 40px;
            position: relative;
            top: 4px;
            margin-right: 10px;
        }
        .rep_logo_pre i{
            color: #F57615;
            font-style: normal;
        }
        .pack .btn{
            display: none;
        }
        .pack {
            padding: .85rem .7rem;
        }
        .pack p {
            color: #000;
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            margin: 0 auto 7px;
        }
        .pack span {
            color: #000;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 0;
            line-height: 24px;
            display: block;
        }
        .pack span.packet-price {
            font-size: 24px;
        }
        .pack .sep {
    margin: 8px 0 8px !important;
    display: block !important;
}
.pack .ext-am {
    font-weight: 800;
    color: #0493d3;
    font-size: 13px;
}
.pack .ext-at {
    font-weight: 600;
    color: #666;
    font-size: 10px;
    margin-top: 0;
}
#precheck h3.rdc {
    color: #F57615;
}
span.pay-norton-icon {
    display: inline-block;
    width: 90px;
    align-self: center;
    height: 30px;
    background: url(/images/norton.svg) no-repeat center;
        background-size: auto;
    background-size: contain !important;
}
.c-999 {
    color: #999;
}
.fw-600 {
    font-weight: 600 !important;
}
#pay-block{
    overflow-y: scroll;
}

</style>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="checkout"> 
@include('layout.header')
<div id="precheck" class="pt-4">
    <div class="container-fluid">
        <h1 class="mb-2 mb-lg-4">
            <span class="blc">Great!</span> Here is your free vehicle history report for {!!$title!!}
            <span class="blc h-vin">#{{$vin}}</span> 
        </h1>
        <div class="row report_prev">
            <div class="col-xl-6 text-center text-lg-start shr-col order-1 order-lg-0">
                <div class="row specs-row">
                    <div class="col-6 mb-2">
                        <div class="media media-check">
                            <span class="media-check-spec-icon me-0 me-lg-3 mb-2 mb-lg-0 align-self-center" style="background: url('/images/engine.svg') no-repeat center"></span>

                            <div class="media-body">
                                Vehicle Engine
                                <h5 class="mt-0">{{$engine}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="media media-check">
                            <span class="media-check-spec-icon me-0 me-lg-3 mb-2 mb-lg-0 align-self-center" style="background: url('/images/marker.svg') no-repeat center"></span>

                            <div class="media-body">
                                Country
                                <h5 class="mt-0">{{$country}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="media media-check">
                            <span class="media-check-spec-icon me-0 me-lg-3 mb-2 mb-lg-0 align-self-center" style="background: url('/images/speed.svg') no-repeat center"></span>

                            <div class="media-body">
                                Last odometer reading
                                <h5 class="mt-0">TBC</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="media media-check">
                            <span class="media-check-spec-icon me-0 me-lg-3 mb-2 mb-lg-0 align-self-center" style="background: url('/images/price.svg') no-repeat center"></span>

                            <div class="media-body">
                                Manufacturer
                                <h5 class="mt-0">{{$make}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sep"></div>
                <div class="include">
                    <p>Each report includes the following information:</p>
                    <div class="row row-cols-2">
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Major Accidents</div>
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Open Recalls</div>
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Total Loss</div>
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Airbag Deployment</div>
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Vehicle Services</div>
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Warranty Information</div>
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Branded as Lemon</div>
                        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Ownership Information</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 text-center s-col relative order-0 order-lg-1" style="position: relative;">
                <div class="rep-sample text-center mt-4 mt-lg-0">
                    <div class="s-card mx-auto">
                        <div class="s-head"></div>
                        <div class="s-body">
                            <div class="row top-row">
                                <div class="col-lg text-center text-lg-start order-0 order-lg-1">
                                    <span class="rep_logo_pre"><img src="/images/logo.png" class="logo mb-3" alt="">AUTO<i>VIN</i>REGISTER</span>
                                    <div class="title fw-900 mb-1 mb-lg-2">Vehicle History Report</div>
                                    <h3 class="mb-0">{!!$title!!}</h3>
                                    <p class="fw-800 blc">VIN {{$vin}}</p>
                                </div>
                            </div>
                            <div class="row mt-3 mx-n2 row-cols-1 row-cols-xl-3 pan-row">
                                <div class="col px-2 mb-3">
                                    <div class="pan">
                                        <span class="">
                                            <div class="report-pan-icon" style="background: url('/images/auction.svg') no-repeat center;"></div>
                                        </span>
                                        <h5 class="text-center c-000">Auction sales</h5><i>-</i>
                                    </div>
                                </div>
                                <div class="col px-2 mb-3">
                                    <div class="pan ">
                                        <span class="">
                                            <div class="report-pan-icon" style="background: url('/images/odometer.svg') no-repeat center;"></div>
                                        </span>
                                        <h5 class="text-center c-000">Odometer</h5><i>-</i>
                                    </div>
                                </div>

                                <div class="col px-2 mb-3">
                                    <div class="pan ">
                                        <span class="">
                                            <div class="report-pan-icon" style="background: url('/images/damage.svg') no-repeat center;"></div>
                                        </span>
                                        <h5 class="text-center c-000">Accidents</h5><i>-</i>
                                    </div>
                                </div>

                                <div class="col px-2 mb-3">
                                    <div class="pan ">
                                        <span class="">
                                            <div class="report-pan-icon" style="background: url('/images/safety.svg') no-repeat center;"></div>
                                        </span>
                                        <h5 class="text-center c-000 d-block d-xl-none">Open Recalls</h5><i>-</i>
                                        <h5 class="text-center c-000 d-none d-xl-block">Open Safety Recalls</h5><i>-</i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <a href="#pay-block" class="btn btn-outline-primary btn-r btn-spl show-blink sc-md" id="sample-btn">View Full Report</a>
            </div>
        </div>

        <div class="advantage mt-4 mb-lg-2 d-none d-lg-block">
            <div class="row">
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv1.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Instant Access</h5>
                    <div class="mx-auto txt">Get your vehicle history report in under a minute. Enter the VIN, pay, get your report.
                    </div>
                </div>
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv4.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Safe Checkout Guaranteed</h5>
                    <div class="mx-auto txt">We protect your privacy. Your information is confidential
                    </div>
                </div>
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv5.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Official NMVTIS Source</h5>
                    <div class="mx-auto txt">VINSUPERINFO is an Approved NMVTIS Data Provider - which contains Information from every state
                    </div>
                </div>
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv3.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Thousands of Happy Customers</h5>
                    <div class="mx-auto txt">VINSUPERINFO provides users with trusted vehicle history
                    </div>
                </div>
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv2.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">100% Money Back Guarantee</h5>
                    <div class="mx-auto txt">You are welcome to request a refund within 14 days.
                    </div>
                </div>
            </div>
        </div>

        

        <div id="pay-block" class="mt-3 mt-lg-0 pay-cc">
            <div class="pay-hold h-100 d-flex flex-column">
                <div class="pay-in d-flex flex-column flex-grow">
                    <div class="packages">
                       <div class="our-reports-packages-wrap mt-4 mb-0 ">
                        <h3 class="d-flex mb-2 lh-10 rdc">Upgrade your free report to get more information!
                            <span class="pay-norton-icon ml-auto"></span>
                        </h3>
                        <div class="c-999 fw-600 mb-1 f-15">Choose your Package</div>
                        <div class=" " id="packages_div">
                            <div class="packets row d-flex flex-nowrap">
                                <div class="col px-2 mb-3 packet-item">
                                    <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between active" data-id="package1" data-price="25">
                                        <p>1 report</p> 
                                            <span class="packet-price">$25</span>
                                            <div class="ext-old ext-old-c mt-auto"></div>
                                            <div class="ext-am" style="display: none;">$25</div>  
                                    </div>
                                </div>
                                <div class="col px-2 mb-3 packet-item">
                                    <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between " data-id="package2"  data-price="35">
                                        <p>2 Reports</p> 
                                            <span class="packet-price">$17.5</span> 
                                            <div class="ext-pr">per report</div>
                                            <div class="sep"></div>
                                            <div class="ext-am">$35</div>
                                            <div class="ext-at">FULL AMOUNT</div>  
                                    </div>
                                </div> 
                                <div class="col px-2 mb-3 packet-item">
                                    <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package3"  data-price="61">
                                        <p>5 Reports</p> 
                                            <span class="packet-price">$12.2</span> 
                                            <div class="ext-pr">per report</div>
                                            <div class="sep"></div>
                                            <div class="ext-am">$61</div>
                                            <div class="ext-at">FULL AMOUNT</div>  
                                    </div>
                                </div>  
                            </div>
                            <div class="packets row d-flex flex-nowrap"> 
                                <div class="col px-2 mb-3 packet-item">
                                    <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package4"  data-price="99">
                                        <p>10 Reports</p> 
                                            <span class="packet-price">$9.9</span> 
                                            <div class="ext-pr">per report</div>
                                            <div class="sep"></div>
                                            <div class="ext-am">$99</div>
                                            <div class="ext-at">FULL AMOUNT</div> 
                                    </div>
                                </div> 
                                <div class="col px-2 mb-3 packet-item">
                                    <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package5"  data-price="154">
                                        <p>25 Reports</p> 
                                            <span class="packet-price">$6.16</span> 
                                            <div class="ext-pr">per report</div>
                                            <div class="sep"></div>
                                            <div class="ext-am">$154</div>
                                            <div class="ext-at">FULL AMOUNT</div> 
                                    </div>
                                </div> 
                                <div class="col px-2 mb-3 packet-item">
                                    <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package6"  data-price="224">
                                        <p>50 reports</p> 
                                            <span class="packet-price">$4.48</span> 
                                            <div class="ext-pr">per report</div>
                                            <div class="sep"></div>
                                            <div class="ext-am">$224</div>
                                            <div class="ext-at">FULL AMOUNT</div> 
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="  mb-2 pay-opt-title">Payment Options</h3>
                <ul class="pay-types list-unstyled">
				<li class="p-type p-card mb-1 active" data-payment-type="card">All Credit or Debit cards
                        <span class="p-card-checkout-icon ms-3" style="background: url('/images/visa.svg') no-repeat center"></span>
                        <span class="p-card-checkout-icon ms-1" style="background: url('/images/mc.svg') no-repeat center"></span>
                        <span class="p-card-checkout-icon ms-1" style="background: url('/images/ae.svg') no-repeat center"></span>
                        <span class="p-card-checkout-icon ms-1" style="background: url('/images/ds.svg') no-repeat center"></span>
                    </li>
                    {{--<li class="p-type p-pp mb-1 active" data-payment-type="pp">PayPal
                        <span class="p-card-checkout-icon-pp ms-2"></span>
                    </li> 
                    <li class="p-type p-btc mb-1" data-payment-type="btc">Bitcoin
                        <span class="p-card-checkout-icon-pp ms-2"></span>
                    </li> --}}
                </ul>
                <div id="card-block">
                    <form method="POST" id="payment-form">
                        @guest
                        <div class="mb-3">
                            <label for="name">Your Full Name</label>
                            <input type="text" class="form-control" name="name" id="name"  required="">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required="">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required="">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required="">
                        </div>
                        @endguest
                        <div class="cardDiv">
							<div class="" style="border: 2px solid #ccc;margin: 45px 0 15px;padding-left: 10px;">
                                <div id="card-element">
                                  <!-- A Stripe Element will be inserted here. -->
                                </div>
            
                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
						</div>
				  {{--
				  <div class="PPDiv">
                  </div>
                  <div class="btcDIV">                    
				  </div>--}}
            </form>
        </div>
        <div class="d-flex total mt-auto flex-column">
            <div class="d-flex">
                <span>Total</span>
                <span class="ms-auto" id="btcPrice">BTC <i></i> </span>
                <span class="ms-auto" id="tot-val">$25</span>
            </div>
        </div>
    </div>
    <div  id="pay-btn">
	 <button class="cc-pay btn pay-btn btn-r position-relative w-100" id="ccPay">
            Secure Checkout
        </button> 
		 <button class="grbutton btn pay-btn btn-r position-relative w-100 disabled" id="grbutton" disabled="">
            <i class="fas fa-spin fa-spinner"></i> Generating Report
        </button>
		{{--
        <button class="grbutton btn pay-btn btn-r position-relative w-100 disabled" id="grbutton" disabled="">
            <i class="fas fa-spin fa-spinner"></i> Generating Report
        </button>
		<div id="id-pp-pay" class="pp-pay"  >
						@include('checkout.paypal_buttons')
					</div>
        <div id="paypal-button-container" class="pp-pay"  ></div>
        <button class="btc-pay btn pay-btn btn-r position-relative w-100" id="btcPay">
            Secure Checkout
        </button>--}}
    </div>
</div>
</div>
<div class="advantage mt-4 mb-lg-2 d-block d-lg-none">
    <div class="row"> 
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv4.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Safe Checkout Guaranteed</h5>
                    <div class="mx-auto txt">We protect your privacy. Your information is confidential
                    </div>
                </div> 
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv3.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Thousands of Happy Customers</h5>
                    <div class="mx-auto txt">VINSUPERINFO provides users with trusted vehicle history
                    </div>
                </div>
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv2.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">100% Money Back Guarantee</h5>
                    <div class="mx-auto txt">You are welcome to request a refund within 14 days.
                    </div>
                </div>
            </div>
</div>
<div class="footer-short pt-3 pb-3 mt-3 mt-lg-4">
    <div class=" d-flex justify-content-center align-items-center">
        <span><span class="footer-icon pp"></span></span>
        <span><span class="footer-icon visa"></span></span>
        <span><span class="footer-icon mc"></span></span>
        <span><span class="footer-icon norton"></span></span>
    </div>
    <div class="copy text-center f-14 c-999">
        © 2021 All rights reserved.
    </div>
</div>

</div>

<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var price = 25;
        var package = 'package1';
        $("#mob_nav_button").click(function(){
            $(".mob_navigation").slideToggle();
        });
        var formData = {
          name:$("#name").val(),
          phone:$("#phone").val(),
          email:$("#email").val(),
          password:$("#password").val(),
          vin:"{{request()->vin}}",
		  type:"vin_report",
        };

        $(".pack").click(function(){
            $(this).closest('#packages_div').find('.pack.active').removeClass('active');
            $(this).closest('#packages_div').find('.select-btn-text-active').css('display', 'none');
            $(this).closest('#packages_div').find('.select-btn-text').css('display', 'inline-block');
            $(this).addClass('active');

            $(this).find('.select-btn-text').css('display', 'none');
            $(this).find('.select-btn-text-active').css('display', 'inline-block');


            $("#tot-val").text($(this).find('.ext-am')[0].textContent);
            console.log($(this).data('id'));
            console.log($(this).data('price'));
            price = $(this).data('price');
            package = $(this).data('id');
            getBTCPrice(price);
			
			showPayPalButton(package);

        });

        $(".p-type").click(function(){
            $(this).closest('.pay-types').find('.p-type.active').removeClass('active');
            $(this).addClass('active');
            if($(this).data('payment-type') == 'card'){
                showPaymentMethod('.cardDiv', '.cc-pay'); 
                $("#btcPrice").hide();
                //$("#pay-block").css('overflow-y','hidden');
            }else if($(this).data('payment-type') == 'pp'){
                showPaymentMethod('.PPDiv', '.pp-pay');
                $("#btcPrice").hide();
               // $("#pay-block").css('overflow-y','scroll');
			   showPayPalButton(package);
            }else if($(this).data('payment-type') == 'btc'){
                showPaymentMethod('.btcDIV', '.btc-pay');
                $("#btcPrice").show();
                getBTCPrice(price);
               // $("#pay-block").css('overflow-y','hidden');
            }
        });     
		var stripe = Stripe('pk_live_51Iv3sRB5ekxWoAVgk6URFxjoG81R1ATooil7uC6sMI1XHfpcrFiZp6O1vpMgJVdLyv1D3WR8qMWzHawoFCZskQmu00O1Ddlq7P');
		var elements = stripe.elements();
		var card = elements.create('card', {
				 style: {
				base: {
				  iconColor: '#666EE8',
				  color: '#31325F',
				  lineHeight: '40px',
				  fontWeight: 300, 
				  fontSize: '16px',
				  '::placeholder': {
					color: '#aaa',
				  },
				},
			  }
		});
		card.mount('#card-element');
		var stripeForm = document.getElementById('payment-form');
            $("#ccPay").click(function(){
				
                if(validateForm() == true){ 
					
					stripe.createToken(card).then(function(result){
						if(result.error){
							card.update({disabled: false});
							var errorElement = document.getElementById('card-errors');
							errorElement.textContent = result.error.message;
						}else{
							$("#ccPay").hide();
							$("#grbutton").show();
							stripeTokenHandler(result.token); 
						}
					});
					
					function stripeTokenHandler(token) {
					  $.post("{{route('charge_from_card')}}", {
						_token: "{{Session::token()}}",
						data: formData,
						stripe_token: token,
						price: price,
						package: package
					  }).done(function(data){
						//console.log(data)
						if(data['success'] == true){
						  //Go TO Finish Order Screen
						  window.location.href = "{{route('index')}}/finish_order/"+data['report_id'];
						}else{

						}
					  });
					}
					/*
					
					$.post("{{route('initpayment')}}",{
						_token: "{{Session::token()}}",
						data: formData,
						package: package,
						price: price						
					}).done(function(data){
						var pdata = JSON.parse(data);
						if(pdata.Success == true){ 
							window.location.href = "https://www.vivapayments.com/web/checkout?ref="+pdata.OrderCode;
						}else{
							
						}
					}); */
                }else{

                }                
            }); 
            //////////////////////////////////////////////////////
            /// 
            
            ///////////////////////////////////////////////////// 
            /////////////////////////////////////////////////////
            
            /////////////////////////////////////////////////////
            $("#btcPay").click(function(){
                if(validateForm() == true){
                    $("#btcPay").hide();
                    $("#grbutton").show();
                    $.post("{{route('charge_from_btc')}}",{
                        _token: "{{Session::token()}}",  
                        data: formData,            
                        price: price,
                        package: package,
                    }).done(function(data){
                        if(data['success'] == true){
                            window.location.href = "{{route('index')}}/btc_order/"+data['transaction_id'];
                        }
                    });
                }
            });
            /////////////////////////////////////////////////////



            

            function validateForm(){
                var tfname  = $("input[name='name']");
                var tfemail = $("input[name='email']");
                var tfpassword = $("input[name='password']");
                var tfphone = $("input[name='phone']");
                if(tfname.val() == ''){
                    tfname.addClass('is-invalid');
                    tfname.focus();
                    return false;
                }else{
                    tfname.removeClass('is-invalid');
                    tfname.addClass('is-valid');
                    
                }                
                if(tfphone.val() == ''){
                    tfphone.addClass('is-invalid');
                    tfphone.focus();
                    return false;
                }else{
                    tfphone.removeClass('is-invalid');
                    tfphone.addClass('is-valid');
                    
                }
                if(tfemail.val() == ''){
                    tfemail.addClass('is-invalid');
                    tfemail.focus();
                    return false;
                }else{
                    tfemail.removeClass('is-invalid');
                    tfemail.addClass('is-valid');
                    
                }
                if(tfpassword.val() == ''){
                    tfpassword.addClass('is-invalid');
                    tfpassword.focus();
                    return false;
                }else{
                    tfpassword.removeClass('is-invalid');
                    tfpassword.addClass('is-valid');
                    
                }
                formData = {
                  name:$("#name").val(),
                  phone:$("#phone").val(),
                  email:$("#email").val(),
                  password:$("#password").val(),
                  vin:"{{request()->vin}}",
				  type:"vin_report",
                };

                return true;
            }

            function getBTCPrice(price){
                $.get("https://blockchain.info/tobtc?currency=USD&value="+price).done(function(data){
                    $("#btcPrice i").text(data);
                });
            }


            function showPaymentMethod($type, $type2){
                $('.cardDiv, .PPDiv, .btcDIV, .cc-pay, .pp-pay, .btc-pay').hide();   
                $($type).show();   
                $($type2).show();   
            }
			
			function showPayPalButton(package){
				$('#package_one_button, #package_two_button, #package_three_button, #package_four_button, #package_five_button, #package_six_button').hide();   
				if(package == 'package1'){
					$("#package_one_button").show();
				}
				if(package == 'package2'){
					$("#package_two_button").show();
				}
				if(package == 'package3'){
					$("#package_three_button").show();
				}
				if(package == 'package4'){
					$("#package_four_button").show();
				}
				if(package == 'package5'){
					$("#package_five_button").show();
				}
				if(package == 'package6'){
					$("#package_six_button").show();
				}
			}
			orderCreated = false;
			
			$(".paypalForm").submit(function(event){
				var thisForm = $(this);
				/*
				var cookieData = {
					'name': $("#name").val(),
					'phone': $("#phone").val(),
					'email': $("#email").val(),
					'password': $("#password").val(),
					'vin': "{{request()->vin}}",
					'type': 'vin_report',
				}
				console.log(cookieData);
				*/
				
				//return false;
				if(orderCreated){
					
				}else{
					event.preventDefault();
					if(validateForm() == true){
					console.log(formData);					
					$.post("{{route('initpppayment')}}",{
						_token: "{{Session::token()}}",  
                        data: formData,
						price: price,
                        package: package,
					}).done(function(data){
						console.log(data);
						orderCreated = true;
						document.cookie = "order_id="+JSON.stringify(data); 
						if(package == 'package1'){
							$("#package_1_invoice").val(JSON.stringify(data));
						}else if(package == 'package2'){
							$("#package_2_invoice").val(JSON.stringify(data));
						}else if(package == 'package3'){
							$("#package_3_invoice").val(JSON.stringify(data));
						}else if(package == 'package4'){
							$("#package_4_invoice").val(JSON.stringify(data));
						}else if(package == 'package5'){
							$("#package_5_invoice").val(JSON.stringify(data));
						}else if(package == 'package6'){
							$("#package_6_invoice").val(JSON.stringify(data));
						}
						thisForm.submit();						 
					}); 
						//document.cookie = "order_data="+JSON.stringify(cookieData); 
					}else{
						return false;
					}
				}
				
				
				
			});
        });
    </script>
    @stack('js')
</body>
</html>