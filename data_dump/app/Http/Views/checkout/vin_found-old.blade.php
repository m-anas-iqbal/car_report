<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | OUR PACKAGES.</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css'.'?ver='.mt_rand())}}">
    <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    @if($settings->stripe == 1)
    <script src="https://js.stripe.com/v3/"></script>
    @endif
    <style>
        #precheck {
            max-width: 100%;
            padding-top: 82px !important;
        }

        #pay-block {
            /*overflow-y: scroll !important;*/
        }

        #precheck .sep {
            height: 1px;
            background-position: 0 0;
            background-repeat: repeat-x;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAABCAQAAAAVg2TsAAAAFUlEQVR4AWNgkARCHgYY4AHxSREDADINAadV3xmbAAAAAElFTkSuQmCC);
            margin: 20px 0 20px;
        }

        .s-card {
            box-shadow: 0 30px 60px rgba(0, 0, 0, .14);
        }

        .s-card {
            /*max-width: 480px;*/
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
            font-size: 36px;
            font-weight: 800;
            color: var(--secondary);
            margin-bottom: 15px;
        }

        .rep-sample p {
            font-size: .95rem;
        }

        .rep-sample .pan {
            background: #f576151a;
            border-radius: 10px;
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 100%;
            text-align: center;
            padding: 30px 0;
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
            box-shadow: 0 3px 8px rgba(0, 0, 0, .12);
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
            filter: brightness(0) saturate(100%) invert(61%) sepia(62%) saturate(4053%) hue-rotate(351deg) brightness(99%) contrast(96%);
        }

        .s-col::after {
            background: linear-gradient(0deg, #fff 0, #fff 40%, rgba(255, 255, 255, 0) 100%);
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
            border-radius: 4px;
            color: #fff;
            font-weight: 600;
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
            border: 2px solid var(--primary);
            color: var(--primary) !important;
        }
        .btn-outline-primary:hover {
            color: #fff !important;
            background: var(--primary);
            border: 2px solid var(--primary);
        }

        .rep_logo_pre {
            font-weight: 900;
            margin-left: 0px;
            color: #182C53;
            font-size: 20px;
        }

        .rep_logo_pre img {
            max-width: 40px;
            position: relative;
            top: 4px;
            margin-right: 10px;
        }

        .rep_logo_pre i {
            color: #F57615;
            font-style: normal;
        }

        .pack .btn {
            display: none;
        }

        .pack {
            padding: 20px;
        }

        .pack p {
            color: #000;
            font-size: 16px;
            font-weight: 800;
            text-transform: uppercase;
            /*margin: 0 auto 7px;*/
        }
        .pack p.pactTxt {
            position: absolute;
            top: 23px;
            right: 31px;
        }

        .pack span {
            color: #000;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 0;
            /*line-height: 24px;*/
            display: block;
        }

        .pack span.packet-price {
            font-size: 42px;
            /*margin-bottom: 13px;*/
        }

        .pack .sep {
            margin: 8px 0 8px !important;
            display: block !important;
        }

        .pack .ext-am {
            font-weight: 800;
            color: var(--primary) !important;
            font-size: 20px;
            margin-right: 14px;
        }

        .pack .ext-at {
            font-weight: 600;
            color: #666;
            font-size: 12px;
            margin-top: 0;
        }

        #precheck h3.rdc {
            color: var(--secondary);
            font-size: 30px;
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
            color: var(--textGray);
        }

        .fw-600 {
            font-weight: 600 !important;
        }

        #pay-block {
            /*overflow-y: scroll;*/
        }
        .language-selector {
            position: fixed;
            bottom: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            border: 1px solid #000;
            padding: 8px;
            border-radius: 4px;
            z-index: 111;
            background: #fff;
        }

        .language-selector span {
            margin-right: 5px;
        }

        .language-selector span img {
            width: 35px;
            height: 25px;
            border-radius: 4px;
            border: 1px solid;
        }

        .language-selector select {
            padding: 5px;
            background: transparent;
            border: none;
        }
        .media.media-check {
            border: 1px dashed gray;
            padding: 18px;
            display: block !important;
        }
        span.media-check-spec-icon img {
            height: 50px;
            margin-bottom: 16px;
        }
        input:not(input[type=checkbox]), select {
            height: 46px !important;
        }
        input:focus, select:focus {
            outline: none !important;
            border: 1px solid var(--primary) !important;
            box-shadow: none !important;
        }
        label{
            font-weight: 600 !important;
            margin-bottom: 6px !important;
        }
    </style>
</head>
<body class="checkout">
    <div id="google_element" style="display:none;"></div>
    <div class="language-selector">
            <span id="langImage">
                <img src="{{asset('images/en.png')}}" alt="English Lang">
            </span>
        <select id="langSelect" onchange="changeLanguage()">
            <option value="en">EN</option>
            <option value="fr">FR</option>
        </select>
    </div>
    <section class="checkOutMain">
        @include('layout.header')
        <div id="precheck" class="pt-4">
            <div class="container">
                <h1 class="mb-2 mb-lg-4">
                    <span class="blc">Great!</span> Here is your Vehicle Report for {!!$title!!}
                    <span class="blc h-vin">#{{$vin}}</span>
                </h1>
                <div class="row report_prev mt-5">
                    <div class="col-12 text-center text-lg-start shr-col order-1 order-lg-0">
                        <div class="row specs-row">
                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="media media-check h-100">
                                    <span class="media-check-spec-icon me-0 me-lg-3 mb-3">
                                        <img class="img-fluid" src="{{asset('images/engine.svg')}}" alt="">
                                    </span>
                                    <div class="media-body">
                                        Vehicle Engine
                                        <h5 class="mt-1">{{$engine}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="media media-check h-100">
                                    <span class="media-check-spec-icon me-0 me-lg-3 mb-3">
                                        <img class="img-fluid" src="{{asset('images/marker.svg')}}" alt="">
                                    </span>
                                    <div class="media-body">
                                        Country
                                        <h5 class="mt-1">{{$country}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="media media-check h-100">
                                    <span class="media-check-spec-icon me-0 me-lg-3 mb-3">
                                        <img class="img-fluid" src="{{asset('images/speed.svg')}}" alt="">
                                    </span>
                                    <div class="media-body">
                                        Last odometer reading
                                        <h5 class="mt-1">-</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="media media-check h-100">
                                    <span class="media-check-spec-icon me-0 me-lg-3 mb-3">
                                        <img class="img-fluid" src="{{asset('images/price.svg')}}" alt="">
                                    </span>
                                    <div class="media-body">
                                        Manufacturer
                                        <h5 class="mt-1">{{$make}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sep"></div>
                        <div class="include mb-4">
                            <p>Each report includes the following information:</p>
                            <div class="row row-cols-4">
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Major
                                    Accidents
                                </div>
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Open
                                    Recalls
                                </div>
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Total
                                    Loss
                                </div>
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Airbag
                                    Deployment
                                </div>
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Vehicle
                                    Services
                                </div>
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Warranty
                                    Information
                                </div>
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Branded
                                    as Lemon
                                </div>
                                <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Ownership
                                    Information
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center s-col relative order-0 order-lg-1" style="position: relative;">
                        <div class="rep-sample text-center mt-4 mt-lg-0">
                            <div class="col-xl-10 col-md-11 col-12 mx-auto">
                                <div class="s-card">
                                    <div class="s-head"></div>
                                    <div class="s-body">
                                        <div class="row top-row">
                                            <div class="col-lg-9 col-md-11 col-12 mx-auto text-center order-0 order-lg-1">
                                                <span class="rep_logo_pre">
                                                    <img src="/images/logo.png" class="logo mb-3" alt="">
                                                    LEMN<i>IS</i>CATEZ
                                                </span>
                                                <div class="title fw-900 mb-3">Vehicle History Report</div>
                                                <h3 class="mb-3">{!!$title!!}</h3>
                                                <p class="fw-800 blc">VIN {{$vin}}</p>
                                            </div>
                                        </div>
                                        <div class="row mt-3 mx-n2 row-cols-1 row-cols-md-2 pan-row">
                                            <div class="col px-2 mb-3">
                                                <div class="pan">
                                                    <span class="">
                                                        <div class="report-pan-icon"
                                                             style="background: url('/images/auction.svg') no-repeat center;">
                                                        </div>
                                                    </span>
                                                    <h5 class="text-center c-000">Auction sales</h5><i>-</i>
                                                </div>
                                            </div>
                                            <div class="col px-2 mb-3">
                                                <div class="pan ">
                                                    <span class="">
                                                        <div class="report-pan-icon"
                                                             style="background: url('/images/odometer.svg') no-repeat center;">
                                                        </div>
                                                    </span>
                                                    <h5 class="text-center c-000">Odometer</h5><i>-</i>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-3">
                                                <div class="pan ">
                                                    <span class="">
                                                        <div class="report-pan-icon"
                                                             style="background: url('/images/damage.svg') no-repeat center;">
                                                        </div>
                                                    </span>
                                                    <h5 class="text-center c-000">Accidents</h5><i>-</i>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-3">
                                                <div class="pan ">
                                                    <span class="">
                                                        <div class="report-pan-icon"
                                                             style="background: url('/images/safety.svg') no-repeat center;">
                                                        </div>
                                                    </span>
                                                    <h5 class="text-center c-000 d-block d-xl-none">Open Recalls</h5><i>-</i>
                                                    <h5 class="text-center c-000 d-none d-xl-block">Open Safety Recalls</h5><i>-</i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <a href="#paymentOpt" id="viewfullrepbutton" class="btn btn-outline-primary btn-r btn-spl show-blink sc-md">View
                                    Full Report</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="advantage mt-5 pt-5 mb-lg-2 d-none d-lg-block">
                    <div class="instantBx">
                        <div class="col adv text-center">
                            <h5 class="mx-auto mb-2">Instant Access</h5>
                            <div class="mx-auto txt">Get your vehicle history report in under a minute. Enter the VIN, pay, get
                                your report.
                            </div>
                        </div>
                        <div class="col adv text-center">
                            <h5 class="mx-auto mb-2">Safe Checkout Guaranteed</h5>
                            <div class="mx-auto txt">We protect your privacy. Your information is confidential
                            </div>
                        </div>
                        <div class="col adv text-center">
                            <h5 class="mx-auto mb-2">Official NMVTIS Source</h5>
                            <div class="mx-auto txt">{{ config('app.name') }} is an Approved NMVTIS Data Provider - which
                                contains Information from every state
                            </div>
                        </div>
                        <div class="col adv text-center">
                            <h5 class="mx-auto mb-2">Thousands of Happy Customers</h5>
                            <div class="mx-auto txt">{{ config('app.name') }} provides users with trusted vehicle history
                            </div>
                        </div>
                        <div class="col adv text-center">
                            <h5 class="mx-auto mb-2">Money Back Guarantee</h5>
                            <div class="mx-auto txt">You are welcome to request a refund within 5 days.
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pay-block" class="mt-3 mt-lg-5 pay-cc">
                    <div class="pay-hold h-100 d-flex flex-column">
                        <div class="pay-in d-flex flex-column flex-grow mb-4">
                            <div class="packages">
                                <div class="our-reports-packages-wrap mt-4 mb-0 px-md-0 px-3">
                                    <h3 class="d-flex mb-3 lh-10 rdc">Upgrade your full report to get more information!
                                        <span class="pay-norton-icon ml-auto"></span>
                                    </h3>
                                    <div class="c-999 fw-600 mb-1 f-15 mb-3">Choose your Package</div>
                                    <div class=" " id="packages_div">
                                        <div class="packets row">
                                            <div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">
                                                <div class="pack pack-pr h-100 active"
                                                     data-id="package2" data-price="60">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="mt-2">
                                                            <span class="packet-price">$40</span>
                                                            <div class="ext-pr">per report</div>
                                                        </div>
                                                        <p class="pactTxt">1 Reports</p>
                                                    </div>
                                                    <div class="sep"></div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ext-am">$40</div>
                                                        <div class="ext-at">FULL AMOUNT</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">
                                                <div class="pack pack-pr h-100"
                                                     data-id="package2" data-price="60">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="mt-2">
                                                            <span class="packet-price">$30</span>
                                                            <div class="ext-pr">per report</div>
                                                        </div>
                                                        <p class="pactTxt">2 Reports</p>
                                                    </div>
                                                    <div class="sep"></div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ext-am">$60</div>
                                                        <div class="ext-at">FULL AMOUNT</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">
                                                <div class="pack pack-pr h-100"
                                                     data-id="package2" data-price="60">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="mt-2">
                                                            <span class="packet-price">$24</span>
                                                            <div class="ext-pr">per report</div>
                                                        </div>
                                                        <p class="pactTxt">5 Reports</p>
                                                    </div>
                                                    <div class="sep"></div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ext-am">$120</div>
                                                        <div class="ext-at">FULL AMOUNT</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">
                                                <div class="pack pack-pr h-100"
                                                     data-id="package2" data-price="60">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="mt-2">
                                                            <span class="packet-price">$20</span>
                                                            <div class="ext-pr">per report</div>
                                                        </div>
                                                        <p class="pactTxt">10 Reports</p>
                                                    </div>
                                                    <div class="sep"></div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ext-am">$200</div>
                                                        <div class="ext-at">FULL AMOUNT</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">
                                                <div class="pack pack-pr h-100"
                                                     data-id="package2" data-price="60">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="mt-2">
                                                            <span class="packet-price">$18</span>
                                                            <div class="ext-pr">per report</div>
                                                        </div>
                                                        <p class="pactTxt">25 Reports</p>
                                                    </div>
                                                    <div class="sep"></div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ext-am">$450</div>
                                                        <div class="ext-at">FULL AMOUNT</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">
                                                <div class="pack pack-pr h-100"
                                                     data-id="package2" data-price="60">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="mt-2">
                                                            <span class="packet-price">$15</span>
                                                            <div class="ext-pr">per report</div>
                                                        </div>
                                                        <p class="pactTxt">50 Reports</p>
                                                    </div>
                                                    <div class="sep"></div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ext-am">$750</div>
                                                        <div class="ext-at">FULL AMOUNT</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mb-3 mt-5 pay-opt-title" id="paymentOpt">Payment Options</h3>
                            <ul class="pay-types list-unstyled">
                                @if($settings->stripe == 1)
                                    <li class="p-type p-card mb-1 active" data-payment-type="card">All Credit or Debit cards
                                        <span class="p-card-checkout-icon ms-3"
                                              style="background: url('/images/visa.svg') no-repeat center"></span>
                                        <span class="p-card-checkout-icon ms-1"
                                              style="background: url('/images/mc.svg') no-repeat center"></span>
                                        <span class="p-card-checkout-icon ms-1"
                                              style="background: url('/images/ae.svg') no-repeat center"></span>
                                        <span class="p-card-checkout-icon ms-1"
                                              style="background: url('/images/ds.svg') no-repeat center"></span>
                                    </li>
                                @endif
                                @if($settings->paypal == 1)
                                    <li class="p-type p-pp mb-1" data-payment-type="pp">PayPal
                                        <span class="p-card-checkout-icon-pp ms-2"></span>
                                    </li>
                                @endif

                                @if($coinremitter_wallet_count > 0)
                                    <li class="p-type p-cr mb-1" data-payment-type="cr">Coinremitter
                                        <span class="p-card-checkout-icon-cr ms-2"></span>
                                    </li>
                                @endif

                                @if($settings->authorizeNet == 1)
                                    <li class="p-type p-an  mb-1" data-payment-type="an">Credit/Debit Card
                                        <span class="p-card-checkout-icon-an ms-2"></span>
                                    </li>
                                @endif

                                @if($bank_accounts_count > 0)
                                    <li class="p-type p-bank mb-1" data-payment-type="bank">Credit/Debit Card
                                        <span class="p-card-checkout-icon-bank ms-2"></span>
                                    </li>
                                @endif

                                @if($settings->paytabs == 1)
                                    <li class="p-type p-paytabs mb-1" data-payment-type="paytabs">
                                        <span class="p-card-checkout-icon-bank ms-2"></span> Paytabs (Checkout)
                                    </li>
                                @endif

                                @if($settings->paytabs_hosted == 1)
                                    <li class="p-type p-paytabs_hosted mb-1" data-payment-type="paytabs_hosted">
                                        <span class="p-card-checkout-icon-bank ms-2"></span> Paytabs (Hosted)
                                    </li>
                                @endif

                            </ul>
                            <div id="card-block">
                                <form method="POST" id="payment-form" action="javascript:;">
                                    @guest
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb-3">
                                                <div class="">
                                                    <label class="mb-2 fw-600" for="name">Your Full Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-3">
                                                <div class="">
                                                    <label class="mb-2 fw-600" for="phone">Phone Number</label>
                                                    <input type="tel" class="form-control" name="phone" id="phone" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-3">
                                                <div class="">
                                                    <label class="mb-2 fw-600" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" required>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6 col-12 mb-3">
                                                <div class="">
                                                    <label class="mb-2 fw-600" for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" required="">
                                                </div>
                                            </div> --}}
                                        </div>

                                    @endguest

                                    <div id="paytabsDIV" class="paytabsDIV">

                                    </div>
                                    @if($settings->paytabs == 1)
                                    <div id="paytabs_hostedDIV" class="paytabs_hostedDIV">

                                        <script src="https://secure.paytabs.com/payment/js/paylib.js"></script>
                                        <!--<label>Phone</label>-->
                                        <!--<input type="text" name="paytabs_phone" id="paytabs_phone" class="input form-control" placeholder="Phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>-->
                                        <!--<br>-->
                                        <label>Address</label>
                                        <textarea class="input form-control" placeholder="Address" name="paytabs_address"
                                                  id="paytabs_address"></textarea>
                                        <br>
                                        <label>City</label>
                                        <input type="text" name="paytabs_city" id="paytabs_city" class="input form-control"
                                               placeholder="City">
                                        <br>
                                        <label>State</label>
                                        <input type="text" name="paytabs_state" id="paytabs_state" class="input form-control"
                                               placeholder="State">
                                        <br>
                                        <label>Country</label>
                                        <select name="paytabs_country" id="paytabs_country" class="form-control">
                                            <option value="">Select a country</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curaçao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten (Dutch part)</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>

                                        <br>
                                        <span id="paytabs_paymentErrors" style="color:red;font-weight:bolder;"></span>
                                        <br>
                                        <label>Card Number</label>
                                        <input id="paytabs_card_number" placeholder="XXXX XXXX XXXX XXXX"
                                               class="input form-control" type="text" data-paylib="number" maxlength="19"
                                               size="20">
                                        <br>

                                        <label>Expiry Date (MM/YYYY)</label>
                                        <input id="paytabs_expiry_month" placeholder="MM" class="input form-control" type="text"
                                               data-paylib="expmonth" size="2" maxlength="2">
                                        <br>
                                        <input placeholder="YYYY" id="paytabs_expiry_year" class="input form-control"
                                               type="text" data-paylib="expyear" maxlength="4" size="4">
                                        <br>
                                        <label>Security Code</label>
                                        <input id="paytabs_cvc" placeholder="XXX" maxlength="4" type="text"
                                               class="input form-control" data-paylib="cvv" size="4">
                                        <br>
                                        <input type="hidden" id="paytabs_payment_token" name="paytabs_payment_token" value="">


                                        <script>

                                            // 	paytabs libray code
                                            var myform = document.getElementById('payment-form');

                                            // Add event listener to prevent default form submission
                                            myform.addEventListener('submit', function (event) {
                                                event.preventDefault();
                                            });


                                            paylib.inlineForm({
                                                'key': '{{ $settings->paytabs_api_client_key }}',
                                                'form': myform,
                                                'autoSubmit': false, // Disable automatic form submission
                                                'callback': function (response) {
                                                    document.getElementById('paytabs_paymentErrors').innerHTML = '';

                                                    if (response.error) {
                                                        paylib.handleError(document.getElementById('paytabs_paymentErrors'), response);
                                                    } else {
                                                        $("#paytabs_payment_token").val(response.token);

                                                    }
                                                }
                                            });

                                        </script>
                                    </div>
                                    @endif

                                    @if($settings->stripe == 1)
                                        <div class="cardDiv">
                                            <div class=""
                                                 style="border: 2px solid #ccc;margin: 45px 0 15px;padding-left: 10px;">
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>

                                                <!-- Used to display Element errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($settings->paypal == 1)
                                        <div id="PPDiv" class="PPDiv">
                                        </div>
                                    @endif
                                    @if($settings->authorizeNet == 1)
                                        <div id="ANDiv" class="ANDiv">
                                            <label>Country</label>
                                            <select id="country" name="country" class="input form-control" required>
                                                <option>United States of America</option>
                                                <option>Canada</option>
                                            </select>
                                            <br>
                                            <label>City</label>
                                            <input type="text" class="input form-control" id="city" name="city"
                                                   placeholder="Please Enter City" required>
                                            <br>
                                            <label>State</label>
                                            <input type="text" class="input form-control" id="state" name="state"
                                                   placeholder="Please Enter State" required>
                                            <br>
                                            <label>Zip Code</label>
                                            <input type="text" class="input form-control" id="zip_code" name="zip_code"
                                                   placeholder="Zip Code" required>
                                            <br>
                                            <label>Street Address</label>
                                            <input type="text" class="input form-control" id="street_address"
                                                   name="street_address" placeholder="Street Address" required>
                                            <br>
                                            <hr>
                                            <label>Card Number</label>
                                            <input type="text" maxlength="16"
                                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                                   class="input form-control" id="card" name="card"
                                                   placeholder="XXXXXXXXXXXXXXXX" required>
                                            <br>
                                            <label>Expiration Month</label>
                                            <select class="input form-control" id="card_exp_month" name="card_exp_month"
                                                    required>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <br>
                                            <label>Expiration Year</label>
                                            <select class="input form-control" id="card_exp_year" name="card_exp_year" required>
                                                    <?php
                                                    echo $firstYear = (int)date('Y');
                                                    $lastYear = $firstYear + 10;
                                                    for ($i = $firstYear; $i <= $lastYear; $i++) {
                                                        echo '<option value=' . $i . '>' . $i . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                            <br>
                                            <label>CVV / CVC</label>
                                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                                   maxlength="4" name="cvc" id="cvc" class="input form-control"
                                                   placeholder="XXXX" required>
                                            <br>
                                            <br>
                                        </div>
                                    @endif
                                    @if($coinremitter_wallet_count > 0)
                                        <div id="CRDiv" class="CRDiv">

                                            <label>Select Coinremitter Coin</label>
                                            <br>
                                            <select id="coinremitter_coin" name="coinremitter_coin" class="input form-control">
                                                    <?php
                                                    $wallets = \App\Models\CoinremitterWallet::where("status", "Active")->get();
                                                    ?>
                                                @foreach($wallets as $wallet)
                                                    <option value="{{ $wallet->id }}">{{ $wallet->coin }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <div class="alert alert-danger">
                                                <b>Note : </b> The best way to buy bitcoin with a credit card is through
                                                MoonPay.com payment service.</b>
                                                <br>


                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                    @if($bank_accounts_count > 0)
                                        <div id="BankDiv" class="BankDiv">

                                            <label class="mb-2 fw-600">Select Bank Account</label>
                                            <br>
                                            <select id="bank_account" name="bank_account" class="input form-control">
                                                    <?php
                                                    $bank_accounts = \App\Models\BankAccounts::where("status", "Active")->get();
                                                    ?>
                                                @foreach($bank_accounts as $bank_account)
                                                    <option value="{{ $bank_account->id }}">{{ $bank_account->bank_name }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                        </div>
                                    @endif
                                    <div class="btcDIV"></div>


                                    <div class="mb-3">

                                        <div class="form-check">
                                            <input type="checkbox" name="terms_agreed" class="form-check-input  ">
                                            <label>
                                                I am agreed with <a href="{{route('terms')}}">Terms of service</a> & <a
                                                        href="{{route('refundpolicy')}}">Refund Policy</a>.
                                            </label>
                                            <div id="invalidCheck3Feedback" class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <p><span style="color: red;">Note:</span> After completion of payment, please wait for
                                            redirect back to our website to get your report automatically in your email.</p>
                                    </div>
                                    <div class="d-flex total mt-auto flex-column">
                                        <div class="d-flex">
                                            <span>Total</span>
                                            <span class="ms-auto" id="btcPrice">BTC <i></i> </span>
                                            <span class="ms-auto" id="tot-val">$40</span>
                                        </div>
                                        <button class="paytabs_hosted-pay btn pay-btn btn-r position-relative w-100" id="paytabs_hostedPay">
                                            Pay Using Paytabs (Hosted)
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <div id="pay-btn">
                            @if($settings->stripe == 1)
                                <button type="button" class="cc-pay btn pay-btn btn-r position-relative w-100 mb3" id="ccPay">
                                    Secure Checkout (Stripe)
                                </button>
                            @endif

                            <button type="button" class="cr-pay btn pay-btn btn-r position-relative w-100 mb3" id="crPay">
                                Pay Using Coinremitter
                            </button>

                            <button type="button" class="bank-pay btn pay-btn btn-r position-relative w-100 mb3" id="bankPay">
                                Pay Using Debit/Credit Card
                            </button>
                            @if($settings->paytabs == 1)
                            <button type="button" class="paytabs-pay btn pay-btn btn-r position-relative w-100 mb3" id="paytabsPay">
                                Pay Using Paytabs (Checkout)
                            </button>
                            @endif

                            @if($settings->authorizeNet == 1)
                                <button type="button" class="an-pay btn pay-btn btn-r position-relative w-100 mb3" id="anPay">
                                    Pay Now
                                </button>
                            @endif

                            <button type="button" class="grbutton btn pay-btn btn-r position-relative w-100 mb3 disabled" id="grbutton"
                                    disabled="">
                                <i class="fas fa-spin fa-spinner"></i> Generating Report
                            </button>
                            {{--
                            <button class="grbutton btn pay-btn btn-r position-relative w-100 disabled" id="grbutton" disabled="">
                                <i class="fas fa-spin fa-spinner"></i> Generating Report
                            </button>
                            --}}
                            {{--<div id="id-pp-pay" class="pp-pay"  >
                                            @include('checkout.paypal_buttons')
                                        </div>--}}

                            <div id="paypal-button-container" class="pp-pay"></div>

                            {{--<button class="btc-pay btn pay-btn btn-r position-relative w-100" id="btcPay">
                                Secure Checkout
                            </button>--}}
                        </div>
                    </div>
                    <div class="checkoutpaymentcomplete">
                        <div class="">
                            <i class="far fa-check-circle"></i>
                            <h3>Congratulations!</h3>
                            <h5>Your payment for the VIN Report has been completed.</h5>
                            <p>Please wait while we are generating your VIN Report.</p>
                            <i class="fas fa-spinner fa-spin"></i>
                        </div>
                    </div>
                </div>
                <div class="advantage mt-4 mb-lg-2 d-block d-lg-none px-3">
                    <div class="row row-cols-lg-5 row-cols-md-3 row-cols-2">
                        <div class="col adv text-center border p-3">
                            <h5 class="mx-auto mb-2"> Instant Access</h5>
                            <div class="mx-auto txt">
                                Get your vehicle history report in under a minute. Enter the VIN, pay, get your report.
                            </div>
                        </div>
                        <div class="col adv text-center border p-3">
                            <h5 class="mx-auto mb-2">Safe Checkout Guaranteed</h5>
                            <div class="mx-auto txt">We protect your privacy. Your information is confidential
                            </div>
                        </div>
                        <div class="col adv text-center border p-3">
                            <h5 class="mx-auto mb-2"> Official NMVTIS Source</h5>
                            <div class="mx-auto txt">
                                Myeliteglobal is an Approved NMVTIS Data Provider - which contains Information from every state
                            </div>
                        </div>
                        <div class="col adv text-center border p-3">
                            <h5 class="mx-auto mb-2">Thousands of Happy Customers</h5>
                            <div class="mx-auto txt">{{ config('app.name') }} provides users with trusted vehicle history
                            </div>
                        </div>
                        <div class="col adv text-center border p-3">
                            <h5 class="mx-auto mb-2"> Money Back Guarantee</h5>
                            <div class="mx-auto txt">You are welcome to request a refund within 5 days.
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
                </div>
            </div>
        </div>
        @include('layout.footer')
    </section>

    <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    @if($settings->paypal == 1)
        <script src="https://www.paypal.com/sdk/js?client-id=AS-jOTLP6dCZkDL_28e3VRJdDMgjHm-PrpbgWTMa4xUvtWoBckVEEn9TfLKGo6bugeN8dps8AheOG6dd&currency=USD"
                data-sdk-integration-source="button-factory"></script>
        <script src="https://www.paypal.com/sdk/js?client-id={{config('app.paypal_client_id')}}&currency=USD"
                data-sdk-integration-source="button-factory"></script>
    @endif
    <script>
    
        $(document).ready(function () {
            
            $('#viewfullrepbutton').click(function (event) {
                event.stopPropagation();
                $("#name").focus();
            })
            @if(($settings->stripe == 1 && $settings->paypal == 1) )
            $("#paypal-button-container").hide();
            @endif


            $("#CRDiv").hide();
            $("#crPay").hide();

            $("#ANDiv").hide();
            $("#anPay").hide();

            $("#BankDiv").hide();
            $("#bankPay").hide();


            $("#paytabsDIV").hide();
            $("#paytabsPay").hide();

            $("#paytabs_hostedDIV").hide();
            $("#paytabs_hostedPay").hide();

            var price = 40;
            var package = 'package1';
            $("#mob_nav_button").click(function () {
                $(".mob_navigation").slideToggle();
            });
            var formData = {
                name: $("#name").val(),
                phone: $("#phone").val(),
                email: $("#email").val(),
                password: $("#password").val(),
                vin: "{{request()->vin}}",
                type: "vin_report",
            };

            $(".pack").click(function () {
                $(this).closest('#packages_div').find('.pack.active').removeClass('active');
                $(this).closest('#packages_div').find('.select-btn-text-active').css('display', 'none');
                $(this).closest('#packages_div').find('.select-btn-text').css('display', 'inline-block');
                $(this).addClass('active');

                $(this).find('.select-btn-text').css('display', 'none');
                $(this).find('.select-btn-text-active').css('display', 'inline-block');


                $("#tot-val").text($(this).find('.ext-am')[0].textContent);
                console.log($(this).data('id'));
                console.log($(this).data('price'));
                var price = $(this).data('price');
                var package = $(this).data('id');
                getBTCPrice(price);

                showPayPalButton(package);

            });


            @if($settings->paypal == 1 && $settings->stripe == 0)
            $(".p-type").first().addClass('active');
            showPaymentMethod('.PPDiv', '.pp-pay');
            showPayPalButton(package);
            @endif
            @if($bank_accounts_count > 0)
                $(".p-type").first().addClass('active');
                showPaymentMethod(".BankDiv", "#bankPay");
                $("#btcPrice").hide();
            @endif
            $(".p-type").click(function () {
                $(this).closest('.pay-types').find('.p-type.active').removeClass('active');
                $(this).addClass('active');
                if ($(this).data('payment-type') == 'card') {
                    showPaymentMethod('.cardDiv', '.cc-pay');
                    $("#btcPrice").hide();
                    //$("#pay-block").css('overflow-y','hidden');
                } else if ($(this).data('payment-type') == 'pp') {
                    showPaymentMethod('.PPDiv', '.pp-pay');
                    $("#btcPrice").hide();
                    // $("#pay-block").css('overflow-y','scroll');
                    showPayPalButton(package);
                } else if ($(this).data('payment-type') == 'cr') {
                    showPaymentMethod('.CRDiv', '#crPay');
                    $("#btcPrice").hide();
                } else if ($(this).data('payment-type') == 'bank') {
                    showPaymentMethod(".BankDiv", "#bankPay");
                    $("#btcPrice").hide();
                } else if ($(this).data('payment-type') == 'paytabs') {
                    showPaymentMethod("#paytabsDIV", "#paytabsPay");
                    $("#btcPrice").hide();
                } else if ($(this).data('payment-type') == 'paytabs_hosted') {
                    showPaymentMethod("#paytabs_hostedDIV", "#paytabs_hostedPay");
                    $("#btcPrice").hide();
                } else if ($(this).data('payment-type') == 'btc') {
                    showPaymentMethod('.btcDIV', '.btc-pay');
                    $("#btcPrice").show();
                    getBTCPrice(price);
                    // $("#pay-block").css('overflow-y','hidden');
                } else if ($(this).data('payment-type') == 'an') {
                    showPaymentMethod('#ANDiv', '#anPay');
                    $("#btcPrice").hide();
                }
            });
            @if($settings->stripe == 1)
            
            var stripe = Stripe('pk_live_51Naic7Fqtn9pmbBo2c30MFRur9ZfGWhkApFHSuRNzI2eIBzEbRxUw9iy8Bz0cW7KwrrQK5xJWjgPICvMTpw5tvSx00sqCxhAJy');

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
            
            $("#ccPay").click(function () {
                console.log('ccPay1');
                if (validateForm() == true) {
            
                    stripe.createToken(card).then(function (result) {
                        if (result.error) {
                            card.update({disabled: false});
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
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
                        }).done(function (data) {
                            if (data['success'] == true) {
                                //Go TO Finish Order Screen
                                window.location.href = "{{route('index')}}/finish_order/" + data['report_id'];
                            } else {
                                alert(data.error);
                            }
                        });
                    }


                    // 	$.post("{{route('initpayment')}}",{
                    // 		_token: "{{Session::token()}}",
                    // 		data: formData,
                    // 		package: package,
                    // 		price: price
                    // 	}).done(function(data){
                    // 		var pdata = JSON.parse(data);
                    // 		if(pdata.Success == true){
                    // 			window.location.href = "https://www.vivapayments.com/web/checkout?ref="+pdata.OrderCode;
                    // 		}else{

                    // 		}
                    // 	});
                } else {

                }
            });
            // code uncommented by yazdan ends from here
            @endif
            //////////////////////////////////////////////////////
            ///

            /////////////////////////////////////////////////////
            /////////////////////////////////////////////////////

            /////////////////////////////////////////////////////
            $("#btcPay").click(function () {
                console.log('btcPay2');
                if (validateForm() == true) {
                    $("#btcPay").hide();
                    $("#grbutton").show();
                    $.post("{{route('charge_from_btc')}}", {
                        _token: "{{Session::token()}}",
                        data: formData,
                        price: price,
                        package: package,
                    }).done(function (data) {
                        if (data['success'] == true) {
                            window.location.href = "{{route('index')}}/btc_order/" + data['transaction_id'];
                        }
                    });
                }
            });
            ///////////coinremitter pay by yazdan haider///////////////////
            $("#crPay").click(function () {
                console.log('crPay3');
                if (validateForm() == true) {
                    if ($("#coinremitter_coin").val() == '') {
                        alert('Please Select Coinremitter Coin First');
                    } else {
                        $("#crPay").hide();
                        $("#grbutton").show();

                        $.post("{{url('generate-coinremitter-payment-link')}}", {
                            _token: "{{Session::token()}}",
                            data: formData,
                            price: price,
                            wallet: $("#coinremitter_coin").val(),
                            package: package,
                        }).done(function (data) {
                            // console.log(data);
                            if (data['success'] == true) {
                                window.location.href = data['invoice_url'];
                            }
                        });
                    }
                }
            });

            // authorize.net code by work
            $("#anPay").click(function () {
                console.log('anPay4');
                if (validateForm() == true) {

                    if ($("#country").val() == '') {
                        alert('Please add country !');
                    } else if ($("#city").val() == '') {
                        alert('Please add city !');
                    } else if ($("#state").val() == '') {
                        alert('Please add State !');
                    } else if ($("#zip_code").val() == '') {
                        alert('Please add Zip Code !');
                    } else if ($("#street_address").val() == '') {
                        alert('Please add Street Address !');
                    } else if ($("#card").val() == '') {
                        alert('Please add card number !');
                    } else if ($("#card").val().length < 16) {
                        alert('Card number is incorrect !');
                    } else if ($("#card_exp_month").val() == '') {
                        alert('Please add card expiry month !');
                    } else if ($("#card_exp_year").val() == '') {
                        alert('Please add expiry year !');
                    } else if ($("#cvc").val() == '') {
                        alert('Please add CVC / CVV !');
                    } else if ($("#cvc").val().length < 3) {
                        alert("CVC is incorrect !");
                    } else {
                        $("#anPay").hide();
                        $("#grbutton").show();

                        $.post("{{url('make-authorizenet-payment')}}", {
                            _token: "{{Session::token()}}",
                            data: formData,
                            price: price,
                            card: $("#card").val(),
                            card_exp_month: $("#card_exp_month").val(),
                            card_exp_year: $("#card_exp_year").val(),
                            cvc: $("#cvc").val(),
                            country: $("#country").val(),
                            city: $("#city").val(),
                            state: $("#state").val(),
                            zip_code: $("#zip_code").val(),
                            street_address: $("#street_address").val(),
                            package: package,
                        }).done(function (data) {
                            // console.log(data);
                            if (data['success'] == true) {
                                // alert(data['tid']);
                                window.location.href = '{{ url("finish_order") }}/' + data['report_id'];
                            } else {
                                window.location.href = '{{ url("authorizeNet/failed") }}';
                            }
                        });
                    }
                }
            });
            
            @if($settings->paytabs == 1)
                $("#paytabs_hostedPay").click(function () {
                    console.log('paytabs_hostedPay5');
                    if (validateForm() == true) {
                        $("#paytabs_hostedPay").hide();
                        $("#grbutton").show();

                        paytabs_ajax_loop = 1;


                        var intervalId = setInterval(function () {
                            var paymentToken = $("#paytabs_payment_token").val();
                            if (paymentToken) {
                                clearInterval(intervalId); // Stop the interval
                                // Run the AJAX request
                                $.post("{{url('charge_from_paytabs_card')}}", {
                                    _token: "{{Session::token()}}",
                                    data: formData,
                                    payment_token: paymentToken,
                                    price: price,
                                    address: $("#paytabs_address").val(),
                                    city: $("#paytabs_city").val(),
                                    state: $("#paytabs_state").val(),
                                    country: $("#paytabs_country").val(),
                                    package: package
                                }).done(function (response) {
                                    if (response.error) {
                                        alert(response.error);
                                        location.reload();
                                    } else {
                                        window.open(response, '_self');
                                    }
                                });
                            }
                        }, 1000);


                    }
                });
            @endif

            $("#bankPay").click(function () {
                console.log('bankPay6');
                if (validateForm() == true) {
                    if ($("#bank_account").val() == '') {
                        alert('Please Select Bank Account First');
                    } else {
                        $("#bankPay").hide();
                        $("#grbutton").show();

                        $.post("{{url('generate-bankaccount-payment-link')}}", {
                            _token: "{{Session::token()}}",
                            data: formData,
                            price: price,
                            checktwo: false,
                            bank_account: $("#bank_account").val(),
                            package: package,
                        }).done(function (data) {
                            if (data['success'] == true) {
                                window.location.href = data['invoice_url'];
                            }
                        });
                    }
                }
            });

            $("#paytabsPay").click(function () {
                console.log('paytabsPay7');
                if (validateForm() == true) {

                    $("#paytabsPay").hide();
                    $("#grbutton").show();

                    $.post("{{url('generate-paytabs-payment-link')}}", {
                        _token: "{{Session::token()}}",
                        data: formData,
                        price: price,
                        package: package,
                    }).done(function (data) {
                        console.log('data',data)
                        return;
                        if (data['success'] == true) {
                            window.location.href = data['redirect_url'];
                        }
                    });
                }
            });


            function validateForm() {
                console.log('validateForm8');
                var tfname = $("input[name='name']");
                var tfemail = $("input[name='email']");
                var tfpassword = $("input[name='password']");
                var tfphone = $("input[name='phone']");
                if (tfname.val() == '') {
                    tfname.addClass('is-invalid');
                    tfname.focus();
                    return false;
                } else {
                    tfname.removeClass('is-invalid');
                    tfname.addClass('is-valid');

                }
                if (tfphone.val() == '') {
                    tfphone.addClass('is-invalid');
                    tfphone.focus();
                    return false;
                } else {
                    tfphone.removeClass('is-invalid');
                    tfphone.addClass('is-valid');

                }
                if (tfemail.val() == '') {
                    tfemail.addClass('is-invalid');
                    tfemail.focus();
                    return false;
                } else {
                    tfemail.removeClass('is-invalid');
                    tfemail.addClass('is-valid');
                }
                if(tfemail.val() != '') {
                    var email = tfemail.val();
                    var atposition=email.indexOf("@");
                    var dotposition=email.lastIndexOf(".");
                    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){
                        tfemail.addClass('is-invalid');
                        tfemail.focus();
                        return false;
                    } else {
                        tfemail.removeClass('is-invalid');
                        tfemail.addClass('is-valid');
                    }
                }

                if (tfpassword.val() == '') {
                    tfpassword.addClass('is-invalid');
                    tfpassword.focus();
                    return false;
                } else {
                    tfpassword.removeClass('is-invalid');
                    tfpassword.addClass('is-valid');

                }

                if (!$('input[name="terms_agreed"]').is(':checked')) {
                    $('input[name="terms_agreed"]').addClass('is-invalid');
                    $('input[name="terms_agreed"]').focus();
                    return false;
                } else {
                    $('input[name="terms_agreed"]').removeClass('is-invalid');
                    $('input[name="terms_agreed"]').addClass('is-valid');
                }
                formData = {
                    name: $("#name").val(),
                    phone: $("#phone").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    vin: "{{request()->vin}}",
                    type: "vin_report",
                };

                return true;
            }

            function getBTCPrice(price) {
                $.get("https://blockchain.info/tobtc?currency=USD&value=" + price).done(function (data) {
                    $("#btcPrice i").text(data);
                });
            }


            function showPaymentMethod($type, $type2) {
                $('.cardDiv, .PPDiv, .CRDiv , .ANDiv , #crPay , #anPay , .btcDIV, .cc-pay, #bankPay, .BankDiv, .pp-pay, .btc-pay ,#paytabsPay , #paytabsDIV, #paytabs_hostedPay,  #paytabs_hostedDIV').hide();
                $($type).show();
                $($type2).show();
            }

            function showPayPalButton(package) {
                $('#package_one_button, #package_two_button, #package_three_button, #package_four_button, #package_five_button, #package_six_button').hide();
                if (package == 'package1') {
                    $("#package_one_button").show();
                }
                if (package == 'package2') {
                    $("#package_two_button").show();
                }
                if (package == 'package3') {
                    $("#package_three_button").show();
                }
                if (package == 'package4') {
                    $("#package_four_button").show();
                }
                if (package == 'package5') {
                    $("#package_five_button").show();
                }
                if (package == 'package6') {
                    $("#package_six_button").show();
                }
            }

            orderCreated = false;

            $(".paypalForm").submit(function (event) {
                var thisForm = $(this);
        
                if (orderCreated) {

                } else {
                    event.preventDefault();
                    console.log('paypalForm9');
                    if (validateForm() == true) {
                        console.log(formData);
                        $.post("{{route('initpppayment')}}", {
                            _token: "{{Session::token()}}",
                            data: formData,
                            price: price,
                            package: package,
                        }).done(function (data) {
                            orderCreated = true;
                            document.cookie = "order_id=" + JSON.stringify(data);
                            if (package == 'package1') {
                                $("#package_1_invoice").val(JSON.stringify(data));
                            } else if (package == 'package2') {
                                $("#package_2_invoice").val(JSON.stringify(data));
                            } else if (package == 'package3') {
                                $("#package_3_invoice").val(JSON.stringify(data));
                            } else if (package == 'package4') {
                                $("#package_4_invoice").val(JSON.stringify(data));
                            } else if (package == 'package5') {
                                $("#package_5_invoice").val(JSON.stringify(data));
                            } else if (package == 'package6') {
                                $("#package_6_invoice").val(JSON.stringify(data));
                            }
                            thisForm.submit();
                        });
                        //document.cookie = "order_data="+JSON.stringify(cookieData);
                    } else {
                        return false;
                    }
                }


            });
            @if($settings->paypal == 1)
                var FUNDING_SOURCES = [
                    paypal.FUNDING.PAYPAL,
                    paypal.FUNDING.CARD
                ];
                var orderSent = false;
                FUNDING_SOURCES.forEach(function (fundingSource) {
                    var ppaction;
                    var invoiceId;
                    var button = paypal.Buttons({
                        fundingSource: fundingSource,
                        createOrder: function (data, actions) {
                            console.log('createOrder10');
                            if (validateForm() == true) {
                                console.log('validated');
                                if (orderSent == false) {
                                    ppaction.enable();
                                    orderSent = true;
                                    $.post("{{route('initpppayment')}}", {
                                        _token: "{{Session::token()}}",
                                        data: formData,
                                        price: price,
                                        package: package,
                                    }).done(function (data) {
                                        console.log(data);
                                        invoiceId = data;
                                    });
                                }
                                scrollToPayBlock();
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: price
                                        },
                                        description: 'DIGITALELITECHECK HISTORY REPORT',
                                    }]
                                });
                            } else {
                                console.log('not validated');
                            }
                        },
                        onInit: function (data, actions) {
                            ppaction = actions;
                            ppaction.enable();
                        },
                        onClick: function () {
                            console.log('clcik')

                            //ppaction.enable();

                        },
                        onApprove: function (data, actions) {
                            console.log('approeve');
                            return actions.order.capture().then(function (details) {
                                console.log(details);
                                // $("#paypal-button-container").hide();
                                //$("#orderReportButtonForPP").show();
                                // This function shows a transaction success message to your buyer.
                                //console.log(details);

                                //console.log(details.purchase_units[0].payments.captures[0].id);
                                //console.log(data);
                                //console.log('Transaction completed by ' + details.payer.name.given_name);
                                if (details.status == 'COMPLETED') {
                                    //$(".pay-hold").css('display', 'none!important');
                                    $(".pay-hold")[0].style.setProperty('display', 'none', 'important');
                                    $(".checkoutpaymentcomplete").css('display', 'flex');
                                    $.post("{{route('charge_from_paypal')}}", {
                                        _token: "{{Session::token()}}",
                                        transaction_id: details.purchase_units[0].payments.captures[0].id,
                                        status: details.status,
                                        payer_email_address: details.payer.email_address,
                                        data: formData,
                                        price: price,
                                        package: package
                                    }).done(function (data) {
                                        if (data['success'] == true) {
                                            //Go TO Finish Order Screen
                                            window.location.href = "{{route('index')}}/finish_order/" + data['report_id'];
                                        } else {

                                        }
                                    });
                                }

                            });
                        }
                    });
                    if (button.isEligible()) {
                        button.render('#paypal-button-container');
                    }
                });
            @endif
            $("#viewfullrepbutton").click(function () {
                $("#name").focus();
            });
        });

        function scrollToPayBlock() {
            $('#pay-block').animate({
                scrollTop: $('#pay-block')[0].scrollHeight
            }, 1500);
        }

    </script>

    {{--  google translate --}}
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_element');
        }

        var flags = document.getElementsByClassName('flag_link');


        function changeLanguage() {
            var langSelect = document.getElementById('langSelect');
            var langImage = document.getElementById('langImage');
            var lang = langSelect.value;
            var svgEn = `<img src="{{asset('images/en.png')}}" alt="English Lang">`;
            var svgFr = `<img src="{{asset('images/fr.png')}}" alt="French Lang">`;

            langImage.innerHTML = lang == 'en' ? svgEn : svgFr;

            var languageSelect = document.querySelector("select.goog-te-combo");
            languageSelect.value = lang;
            languageSelect.dispatchEvent(new Event("change"));

        }
    </script>
</body>
</html>
