<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AUTOVINREGISTER | OUR PACKAGES.</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://www.paypal.com/sdk/js?client-id=AWpZTyxRtgC5t0JFNRptayS_twYHovefNqa4cScaYjaIR7UTXI7T7i0beHv8eDwORMgPvfe98v6kaE3M&currency=USD"></script> 
    <script src="https://js.stripe.com/v3/"></script>
    <style>
      .blc {
    color: #F57615;
}
    </style>
</head>
<body> 
    @include('layout.header')
<div id="precheck" class="pt-4">
    <div class="container-fluid">
        <h1 class="mb-0 mb-lg-0 text-center">
            <span class="blc">Great!</span> Your order has been created and waiting for payment <br>
            <span class="blc h-vin">BTC {{$receipt->amount}} </span> 
        </h1>
        <div class="row">
            <div class="col-xl-12 text-center d-flex-colum">
                <div class=" fw-600 text-center mt-0">Please transfer the mentioned BTC amount into the following BTC Address.</div>
                <div class="rdc fw-600 text-center mt-0">Note: Please send the transaction screen shot on payments@autovinregister.com after confirmations. You report will be emailed to you and extra credits will be added into your account.</div>
                <div class="wrapper-email-form pb-4 mt-2"> 
                       <input type="text" class="form-control text-center" value="17whiXxMmjFC4DUAbNmGbnitoaHudmZ4y4" readonly="">
                        <p class="mt-4 mb-4">Or</p>
                        <img src="{{asset('images/btcqr.png')}}" alt="">
                </div> 

                <div class="mt-4 mb-4 d-none d-lg-block">
                    <div class="include">
                        <p>Maximum information in each report:</p>
                        <div class="row row-cols-4">
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Major Accidents</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Open Recalls</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Odometer readings</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Auction Sales</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Total Loss</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Airbag Deployment</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Recalls</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Insurance Information</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Vehicle Services</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Warranty Information</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Title Brands</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Theft Records</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Branded a Lemon</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Length of Ownership</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Salvage Information</div>
                            <div class="d-flex col"><img src="{{asset('images/check-green.svg')}}" alt="Green check sign" class="me-3">Ownership Cost</div>
                        </div>
                    </div>
                </div>
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
                    <div class="mx-auto txt">AUTOVINREGISTER is an Approved NMVTIS Data Provider - which contains Information from every state
                    </div>
                </div>
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv3.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Thousands of Happy Customers</h5>
                    <div class="mx-auto txt">AUTOVINREGISTER provides users with trusted vehicle history
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

    
    @stack('js')
</body>
</html>