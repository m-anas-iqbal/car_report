<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | OUR PACKAGES.</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css'.'?ver='.mt_rand())}}">
    <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
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

        .report_prev .btn-copy::after,
        .btn-r::after {
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

        input:not(input[type=checkbox]),
        select {
            height: 46px !important;
        }

        input:focus,
        select:focus {
            outline: none !important;
            border: 1px solid var(--primary) !important;
            box-shadow: none !important;
        }

        label {
            font-weight: 600 !important;
            margin-bottom: 6px !important;
        }
        
.sellfy-buy-button {
    top: -60px;
}

.sellfy-buy-button .price {
    display: none;
}

div#sellfy_buy_button {
    width: 80% !important;
}

button#bankPay2, button#bankPay1 {
    margin-left: 45px;
    margin-bottom: 20px;
    color: white !important;
    background: black !important;
    border-radius: 33px;
    font-weight: 500;
    font-size: 20px;
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
                    <span class="blc">Great!</span> Here is your Vehicle Report for {!!str_ireplace('incomplete','', $title)!!}
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
                        <!--<div class="include mb-4">-->
                        <!--    <p>Each report includes the following information:</p>-->
                        <!--    <div class="row row-cols-4">-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Major-->
                        <!--            Accidents-->
                        <!--        </div>-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Open-->
                        <!--            Recalls-->
                        <!--        </div>-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Total-->
                        <!--            Loss-->
                        <!--        </div>-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Airbag-->
                        <!--            Deployment-->
                        <!--        </div>-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Vehicle-->
                        <!--            Services-->
                        <!--        </div>-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Warranty-->
                        <!--            Information-->
                        <!--        </div>-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Branded-->
                        <!--            as -->
                        <!--        </div>-->
                        <!--        <div class="d-flex col"><img src="/images/check-green.svg" alt="Green check sign" class="me-3">Ownership-->
                        <!--            Information-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <!--<div class="col-12 text-center s-col relative order-0 order-lg-1" style="position: relative;">-->
                    <!--    <div class="rep-sample text-center mt-4 mt-lg-0">-->
                    <!--        <div class="col-xl-10 col-md-11 col-12 mx-auto">-->
                    <!--            <div class="s-card">-->
                    <!--                <div class="s-head"></div>-->
                    <!--                <div class="s-body">-->
                    <!--                    <div class="row top-row">-->
                    <!--                        <div class="col-lg-9 col-md-11 col-12 mx-auto text-center order-0 order-lg-1">-->
                    <!--                            <span class="rep_logo_pre">-->
                    <!--                                <img src="/images/logo.png" class="logo mb-3" alt="">-->
                    <!--                                AUTO<i>TRUST</i>hub-->
                    <!--                            </span>-->
                    <!--                            <div class="title fw-900 mb-3">Vehicle History Report</div>-->
                    <!--                            <h3 class="mb-3">{!!str_ireplace('incomplete','', $title)!!}</h3>-->
                    <!--                            <p class="fw-800 blc">VIN {{$vin}}</p>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="row mt-3 mx-n2 row-cols-1 row-cols-md-2 pan-row">-->
                    <!--                        <div class="col px-2 mb-3">-->
                    <!--                            <div class="pan">-->
                    <!--                                <span class="">-->
                    <!--                                    <div class="report-pan-icon" style="background: url('/images/auction.svg') no-repeat center;">-->
                    <!--                                    </div>-->
                    <!--                                </span>-->
                    <!--                                <h5 class="text-center c-000">Auction sales</h5><i>-</i>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="col px-2 mb-3">-->
                    <!--                            <div class="pan ">-->
                    <!--                                <span class="">-->
                    <!--                                    <div class="report-pan-icon" style="background: url('/images/odometer.svg') no-repeat center;">-->
                    <!--                                    </div>-->
                    <!--                                </span>-->
                    <!--                                <h5 class="text-center c-000">Odometer</h5><i>-</i>-->
                    <!--                            </div>-->
                    <!--                        </div>-->

                    <!--                        <div class="col px-2 mb-3">-->
                    <!--                            <div class="pan ">-->
                    <!--                                <span class="">-->
                    <!--                                    <div class="report-pan-icon" style="background: url('/images/damage.svg') no-repeat center;">-->
                    <!--                                    </div>-->
                    <!--                                </span>-->
                    <!--                                <h5 class="text-center c-000">Accidents</h5><i>-</i>-->
                    <!--                            </div>-->
                    <!--                        </div>-->

                    <!--                        <div class="col px-2 mb-3">-->
                    <!--                            <div class="pan ">-->
                    <!--                                <span class="">-->
                    <!--                                    <div class="report-pan-icon" style="background: url('/images/safety.svg') no-repeat center;">-->
                    <!--                                    </div>-->
                    <!--                                </span>-->
                    <!--                                <h5 class="text-center c-000 d-block d-xl-none">Open Recalls</h5><i>-</i>-->
                    <!--                                <h5 class="text-center c-000 d-none d-xl-block">Open Safety Recalls</h5><i>-</i>-->
                    <!--                            </div>-->
                    <!--                        </div>-->

                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <a href="#paymentOpt" id="viewfullrepbutton" class="btn btn-outline-primary btn-r btn-spl show-blink sc-md">View-->
                    <!--                Full Report</a>-->
                    <!--        </div>-->
                    <!--    </div>-->

                    <!--</div>-->
                </div>
                <!--<div class="advantage mt-5 pt-5 mb-lg-2 d-none d-lg-block">-->
                <!--    <div class="instantBx">-->
                <!--        <div class="col adv text-center">-->
                <!--            <h5 class="mx-auto mb-2">Instant Access</h5>-->
                <!--            <div class="mx-auto txt">Get your vehicle history report in under a minute. Enter the VIN, pay, get-->
                <!--                your report.-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col adv text-center">-->
                <!--            <h5 class="mx-auto mb-2">Safe Checkout Guaranteed</h5>-->
                <!--            <div class="mx-auto txt">We protect your privacy. Your information is confidential-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col adv text-center">-->
                <!--            <h5 class="mx-auto mb-2">Official NMVTIS Source</h5>-->
                <!--            <div class="mx-auto txt">{{ config('app.name') }} is an Approved NMVTIS Data Provider - which-->
                <!--                contains Information from every state-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col adv text-center">-->
                <!--            <h5 class="mx-auto mb-2">Thousands of Happy Customers</h5>-->
                <!--            <div class="mx-auto txt">{{ config('app.name') }} provides users with trusted vehicle history-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col adv text-center">-->
                <!--            <h5 class="mx-auto mb-2">Money Back Guarantee</h5>-->
                <!--            <div class="mx-auto txt">You are welcome to request a refund within 5 days.-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
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
                                                <div class="pack pack-pr h-100 active" data-id="package2" data-price="60">
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
                                            
                                            <!--<div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">-->
                                            <!--    <div class="pack pack-pr h-100" data-id="package2" data-price="60">-->
                                            <!--        <div class="d-flex justify-content-between mb-5">-->
                                            <!--            <div class="mt-2">-->
                                            <!--                <span class="packet-price">$30</span>-->
                                            <!--                <div class="ext-pr">per report</div>-->
                                            <!--            </div>-->
                                            <!--            <p class="pactTxt">2 Reports</p>-->
                                            <!--        </div>-->
                                            <!--        <div class="sep"></div>-->
                                            <!--        <div class="d-flex align-items-center">-->
                                            <!--            <div class="ext-am">$60</div>-->
                                            <!--            <div class="ext-at">FULL AMOUNT</div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">-->
                                            <!--    <div class="pack pack-pr h-100" data-id="package2" data-price="60">-->
                                            <!--        <div class="d-flex justify-content-between mb-5">-->
                                            <!--            <div class="mt-2">-->
                                            <!--                <span class="packet-price">$24</span>-->
                                            <!--                <div class="ext-pr">per report</div>-->
                                            <!--            </div>-->
                                            <!--            <p class="pactTxt">5 Reports</p>-->
                                            <!--        </div>-->
                                            <!--        <div class="sep"></div>-->
                                            <!--        <div class="d-flex align-items-center">-->
                                            <!--            <div class="ext-am">$120</div>-->
                                            <!--            <div class="ext-at">FULL AMOUNT</div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">-->
                                            <!--    <div class="pack pack-pr h-100" data-id="package2" data-price="60">-->
                                            <!--        <div class="d-flex justify-content-between mb-5">-->
                                            <!--            <div class="mt-2">-->
                                            <!--                <span class="packet-price">$20</span>-->
                                            <!--                <div class="ext-pr">per report</div>-->
                                            <!--            </div>-->
                                            <!--            <p class="pactTxt">10 Reports</p>-->
                                            <!--        </div>-->
                                            <!--        <div class="sep"></div>-->
                                            <!--        <div class="d-flex align-items-center">-->
                                            <!--            <div class="ext-am">$200</div>-->
                                            <!--            <div class="ext-at">FULL AMOUNT</div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">-->
                                            <!--    <div class="pack pack-pr h-100" data-id="package2" data-price="60">-->
                                            <!--        <div class="d-flex justify-content-between mb-5">-->
                                            <!--            <div class="mt-2">-->
                                            <!--                <span class="packet-price">$18</span>-->
                                            <!--                <div class="ext-pr">per report</div>-->
                                            <!--            </div>-->
                                            <!--            <p class="pactTxt">25 Reports</p>-->
                                            <!--        </div>-->
                                            <!--        <div class="sep"></div>-->
                                            <!--        <div class="d-flex align-items-center">-->
                                            <!--            <div class="ext-am">$450</div>-->
                                            <!--            <div class="ext-at">FULL AMOUNT</div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-lg-4 col-md-6 col-12 px-2 mb-3 packet-item">-->
                                            <!--    <div class="pack pack-pr h-100" data-id="package2" data-price="60">-->
                                            <!--        <div class="d-flex justify-content-between mb-5">-->
                                            <!--            <div class="mt-2">-->
                                            <!--                <span class="packet-price">$15</span>-->
                                            <!--                <div class="ext-pr">per report</div>-->
                                            <!--            </div>-->
                                            <!--            <p class="pactTxt">50 Reports</p>-->
                                            <!--        </div>-->
                                            <!--        <div class="sep"></div>-->
                                            <!--        <div class="d-flex align-items-center">-->
                                            <!--            <div class="ext-am">$750</div>-->
                                            <!--            <div class="ext-at">FULL AMOUNT</div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mb-3 mt-5 pay-opt-title" id="paymentOpt">Fill your detail</h3>
                            {{-- <ul class="pay-types list-unstyled">
                                <li class="p-type p-bank mb-1" data-payment-type="bank">Credit/Debit Card
                                    <span class="p-card-checkout-icon-bank ms-2"></span>
                                </li>
                            </ul> --}}
                            <div id="card-block">
                                <form method="POST" id="payment-form" action="javascript:;">
                                    {{-- @guest --}}
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

                                    {{-- @endguest --}}

                                    <div class="mb-3">

                                        <div class="form-check">
                                            {{-- <input type="checkbox" name="terms_agreed" class="form-check-input"> --}}
                                            <label>
                                               
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <p><span style="color: red;">Note:</span> After completion of payment, please wait for
                                            redirect back to our website to get your report automatically in your email.</p>
                                    </div>
                                    <div class="d-flex total mt-auto flex-column">
                                        <div class="d-flex">
                                            <span>Total : </span>
                                            <span class="ms-auto" id="btcPrice">BTC <i></i> </span>
                                            <span class="ms-5" id="tot-val">$40</span>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="" id="pay-btn">
                            <!--<button type="button" class="bank-pay btn pay-btn btn-r position-relative w-100 mb3" id="bankPayOld">-->
                            <!--    Pay Using Debit/Credit Card-->
                            <!--</button>-->
                            
                            <!--<button type="button" class="bank-pay btn pay-btn btn-r position-relative mb3" id="bankPay1">-->
                            <!--    continue-->
                            <!--</button>-->
                            
                            <button type="button" class="bank-pay btn pay-btn btn-r position-relative mb3" id="bankPay2">
                                Confirm
                                
                            </button>
                            <div class="text-center" id="paymentFrame" style="display:none;">
                                <iframe id="paymentIframe" src="" frameborder="0" width="100%" height="500"></iframe>
                                @if($button_url)
                                <a href="{{ $button_url }}" data-text="" id="{{ $button_id }}" class="sellfy-buy-button"></a>
                                @endif
                                
                                <script src="https://sellfy.com/js/api_buttons.js"></script>
                            </div>
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
    <script>
        $(document).ready(function() {

            $('#viewfullrepbutton').click(function(event) {
                event.stopPropagation();
                $("#name").focus();
            })

            var price = 40;
            var package = 'package1';
            $("#mob_nav_button").click(function() {
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

            $(".pack").click(function() {
                $(this).closest('#packages_div').find('.pack.active').removeClass('active');
                $(this).closest('#packages_div').find('.select-btn-text-active').css('display', 'none');
                $(this).closest('#packages_div').find('.select-btn-text').css('display', 'inline-block');
                $(this).addClass('active');

                $(this).find('.select-btn-text').css('display', 'none');
                $(this).find('.select-btn-text-active').css('display', 'inline-block');

                $("#tot-val").text($(this).find('.ext-am')[0].textContent);

                var price = $(this).data('price');
                var package = $(this).data('id');
            });


            $(".p-type").first().addClass('active');


            // $("#bankPayOld").click(function() {
            //     console.log('bankPay6');
            //     if (validateForm() == true) {
            //         $.post("{{url('generate-bankaccount-payment-link')}}", {
            //             _token: "{{Session::token()}}",
            //             data: formData,
            //             price: price,
            //             checktwo: false,
            //             bank_account: 4,
            //             package: package,
            //         }).done(function(data) {
            //             if (data['success'] == true) {
            //                 window.location.href = data['invoice_url'];
            //             }
            //         });

            //     }
            // });
            
            // $("#bankPay1").click(function() {
            //     console.log('bankPay6');
            //     if (validateForm() == true) {
            //         $.post("{{url('generate-bankaccount-payment-link')}}", {
            //             _token: "{{Session::token()}}",
            //             data: formData,
            //             price: price,
            //             checktwo: false,
            //             bank_account: 4,
            //             package: package,
            //         }).done(function(data) {
            //             if (data['success'] == true) {
            //                 window.location.href = data['invoice_url'];
            //             }
            //         });

            //     }
            // });
            
            $("#bankPay2").click(function() {
                if (validateForm()) {
                    $.post("{{url('generate-bankaccount-payment-link')}}", {
                        _token: "{{Session::token()}}",
                        data: formData,
                        price: price,
                        checktwo: false,
                        bank_account: 4,
                        package: package,
                    }).done(function(data) {
                        if (data['success'] == true) {
                            // Set the source of the iFrame
                            $('#paymentIframe').attr('src', data['invoice_url']);
                            
                            // Show the iFrame container
                            $('#paymentFrame').show();
                            $("#bankPay2").hide();
                        }
                    }).fail(function() {
                        alert("Error: Unable to load payment interface");
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
                if (tfemail.val() != '') {
                    var email = tfemail.val();
                    var atposition = email.indexOf("@");
                    var dotposition = email.lastIndexOf(".");
                    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
                        tfemail.addClass('is-invalid');
                        tfemail.focus();
                        return false;
                    } else {
                        tfemail.removeClass('is-invalid');
                        tfemail.addClass('is-valid');
                    }
                }
               // if (!$('input[name="terms_agreed"]').is(':checked')) {
                 //   $('input[name="terms_agreed"]').addClass('is-invalid');
                   // $('input[name="terms_agreed"]').focus();
                    //return false;
                //} else {
                  //  $('input[name="terms_agreed"]').removeClass('is-invalid');
                    //$('input[name="terms_agreed"]').addClass('is-valid');
                //}
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
            $("#viewfullrepbutton").click(function() {
                $("#name").focus();
            });
        });

        function scrollToPayBlock() {
            $('#pay-block').animate({
                scrollTop: $('#pay-block')[0].scrollHeight
            }, 1500);
        }
    </script>
<!--Start of Tawk.to Script-->


<!--End of Tawk.to Script-->

    {{-- google translate --}}
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
