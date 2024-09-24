<?php
 
?>
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
    <link rel="stylesheet" href="{{asset('css/style.css')}}">  
</head>
<body class="checkout"> 
    @include('layout.header')
<div id="precheck" class="pt-4">
    <div class="container-fluid">
        <h1 class="mb-2 mb-lg-4 text-center">
            <span class="text-danger">Sorry!</span> Invalid VIN
        </h1>
        <div class="row">
            <div class="col-xl-12 text-center d-flex-colum">
                <div class="rdc fw-600 text-center mt-2">Your VIN Number is incorrect, but we still can generate VIN Report for you. Purchase credits below.</div>
                <div class="wrapper-email-form pb-4">

                </div>
                <div class="our-reports-packages-wrap mt-4 mb-0 mb-md-4">
                    <div class="our-reports-packages-title">Our Reports Packages</div>
                    <div class="pt-4 pb-4" id="packages_div">
                        <div class="packets row d-flex flex-nowrap">
                            <div class="col px-2 mb-3 packet-item">
                                <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between active" data-id="package1" data-price="25">
                                    <p>1 report</p>
                                    <div class="mb-sm-3 mb-2 mt-sm-3 mt-2 flex-grow-1 d-flex flex-column">
                                        <span class="packet-price">$25</span>
                                        <div class="ext-old ext-old-c mt-auto"></div>
                                        <div class="ext-am">$25</div>
                                    </div>
                                    <a class="select-btn btn btn-outline-primary w-75 mx-auto">
                                        <span class="select-btn-text">Select</span>
                                        <span class="select-btn-text-active">Selected</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col px-2 mb-3 packet-item">
                                <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between " data-id="package2"  data-price="35">
                                    <p>2 Reports</p>
                                    <div class="mb-sm-3 mb-2 mt-sm-3 mt-2 flex-grow-1 d-flex flex-column">
                                        <span class="packet-price">$17.5</span> 
                                        <div class="ext-pr">per report</div>
                                        <div class="sep"></div>
                                        <div class="ext-am">$35</div>
                                        <div class="ext-at">FULL AMOUNT</div>
                                    </div> 
                                    <a class="select-btn btn btn-outline-primary w-75 mx-auto">
                                        <span class="select-btn-text">Select</span>
                                        <span class="select-btn-text-active">Selected</span>
                                    </a>
                                </div>
                            </div> 
                            <div class="col px-2 mb-3 packet-item">
                                <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package3"  data-price="61">
                                    <p>5 Reports</p>
                                    <div class="mb-sm-3 mb-2 mt-sm-3 mt-2 flex-grow-1 d-flex flex-column">
                                        <span class="packet-price">$12.2</span> 
                                        <div class="ext-pr">per report</div>
                                        <div class="sep"></div>
                                        <div class="ext-am">$61</div>
                                        <div class="ext-at">FULL AMOUNT</div>
                                    </div> 
                                    <a class="select-btn btn btn-outline-primary w-75 mx-auto">
                                        <span class="select-btn-text">Select</span>
                                        <span class="select-btn-text-active">Selected</span>
                                    </a>
                                </div>
                            </div>  
                        </div>
                        <div class="packets row d-flex flex-nowrap"> 
                            <div class="col px-2 mb-3 packet-item">
                                <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package4"  data-price="99">
                                    <p>10 Reports</p>
                                    <div class="mb-sm-3 mb-2 mt-sm-3 mt-2 flex-grow-1 d-flex flex-column">
                                        <span class="packet-price">$9.9</span> 
                                        <div class="ext-pr">per report</div>
                                        <div class="sep"></div>
                                        <div class="ext-am">$99</div>
                                        <div class="ext-at">FULL AMOUNT</div>
                                    </div> 
                                    <a class="select-btn btn btn-outline-primary w-75 mx-auto">
                                        <span class="select-btn-text">Select</span>
                                        <span class="select-btn-text-active">Selected</span>
                                    </a>
                                </div>
                            </div> 
                            <div class="col px-2 mb-3 packet-item">
                                <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package5"  data-price="154">
                                    <p>25 Reports</p>
                                    <div class="mb-sm-3 mb-2 mt-sm-3 mt-2 flex-grow-1 d-flex flex-column">
                                        <span class="packet-price">$6.16</span> 
                                        <div class="ext-pr">per report</div>
                                        <div class="sep"></div>
                                        <div class="ext-am">$154</div>
                                        <div class="ext-at">FULL AMOUNT</div>
                                    </div> 
                                    <a class="select-btn btn btn-outline-primary w-75 mx-auto">
                                        <span class="select-btn-text">Select</span>
                                        <span class="select-btn-text-active">Selected</span>
                                    </a>
                                </div>
                            </div> 
                            <div class="col px-2 mb-3 packet-item">
                                <div class="pack pack-pr h-100 text-center  d-flex flex-column justify-content-between" data-id="package6"  data-price="224">
                                    <p>50 reports</p>
                                    <div class="mb-sm-3 mb-2 mt-sm-3 mt-2 flex-grow-1 d-flex flex-column">
                                        <span class="packet-price">$4.48</span> 
                                        <div class="ext-pr">per report</div>
                                        <div class="sep"></div>
                                        <div class="ext-am">$224</div>
                                        <div class="ext-at">FULL AMOUNT</div>
                                    </div> 
                                    <a class="select-btn btn btn-outline-primary w-75 mx-auto">
                                        <span class="select-btn-text">Select</span>
                                        <span class="select-btn-text-active">Selected</span>
                                    </a>
                                </div>
                            </div>  
                        </div>
                    </div>
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
                    <div class="mx-auto txt">{{ config('app.name') }} is an Approved NMVTIS Data Provider - which contains Information from every state
                    </div>
                </div>
                <div class="col adv text-center">
                    <span class="mb-2">
                        <span class="advantage-checkout-icon" style="border: none; background: url('{{asset('images/adv3.svg')}}') no-repeat center"></span>
                    </span>
                    <h5 class="mx-auto">Thousands of Happy Customers</h5>
                    <div class="mx-auto txt">{{ config('app.name') }} provides users with trusted vehicle history
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
                    <h3 class="mt-4 mb-2 pay-opt-title">Payment Options</h3>
                    <ul class="pay-types list-unstyled">
					{{--<li class="p-type p-card mb-1 active" data-payment-type="card">All Credit or Debit cards
                            <span class="p-card-checkout-icon ms-3" style="background: url('/images/visa.svg') no-repeat center"></span>
                            <span class="p-card-checkout-icon ms-1" style="background: url('/images/mc.svg') no-repeat center"></span>
                            <span class="p-card-checkout-icon ms-1" style="background: url('/images/ae.svg') no-repeat center"></span>
                            <span class="p-card-checkout-icon ms-1" style="background: url('/images/ds.svg') no-repeat center"></span>
                        </li> --}}
                        <li class="p-type p-pp mb-1 active " data-payment-type="pp">PayPal
                            <span class="p-card-checkout-icon-pp ms-2"></span>
                        </li> 
                        {{--<li class="p-type p-btc mb-1" data-payment-type="btc">Bitcoin
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
                           {{-- <div class="cardDiv">
<div class="" style="border: 2px solid #ccc;margin: 45px 0 15px;padding-left: 10px;">
                                <div id="card-element">
                                  <!-- A Stripe Element will be inserted here. -->
                                </div>
            
                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>							
                            </div>
                            <div class="PPDiv">
								

                            </div>
                            <div class="btcDIV">
                                
                            </div>--}}
							<div class="mb-3">
								<label>
									<input type="checkbox" name="terms_agreed"> I am agreed with <a href="{{route('terms')}}">Terms of service</a> & <a href="">Refund Policy</a>.
								</label>
							  </div>
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
				{{-- <button class="cc-pay btn pay-btn btn-r position-relative w-100" id="ccPay">
                        Secure Checkout
                    </button> 
                    <button class="grbutton btn pay-btn btn-r position-relative w-100 disabled" id="grbutton" disabled="">
                        <i class="fas fa-spin fa-spinner"></i> Generating Report
                    </button>--}}
                   <div id="id-pp-pay" class="pp-pay"  >
						@include('checkout.paypal_buttons')
					</div>
                   {{--  <button class="btc-pay btn pay-btn btn-r position-relative w-100" id="btcPay">
                        Secure Checkout
                    </button>--}}
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
              type:"package_purchase",
            };

            $(".pack").click(function(){
                $(this).closest('#packages_div').find('.pack.active').removeClass('active');
                $(this).closest('#packages_div').find('.select-btn-text-active').css('display', 'none');
                $(this).closest('#packages_div').find('.select-btn-text').css('display', 'inline-block');
                $(this).addClass('active');
                
                $(this).find('.select-btn-text').css('display', 'none');
                $(this).find('.select-btn-text-active').css('display', 'inline-block');

                
                $("#tot-val").text($(this).find('.ext-am')[0].textContent);
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
                    $("#pay-block").css('overflow-y','hidden');
                    $("#btcPrice").hide(); 
                }else if($(this).data('payment-type') == 'pp'){
                    showPaymentMethod('.PPDiv', '.pp-pay');
                    $("#pay-block").css('overflow-y','scroll');
                    $("#btcPrice").hide();
					showPayPalButton(package);
					
                }else if($(this).data('payment-type') == 'btc'){
                    showPaymentMethod('.btcDIV', '.btc-pay');
                    $("#pay-block").css('overflow-y','hidden');
                    $("#btcPrice").show();
                    getBTCPrice(price);
                }
            });
			/*var stripe = Stripe('pk_live_51Iv3sRB5ekxWoAVgk6URFxjoG81R1ATooil7uC6sMI1XHfpcrFiZp6O1vpMgJVdLyv1D3WR8qMWzHawoFCZskQmu00O1Ddlq7P');
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
					  $.post("{{route('charge_from_card_no_vin')}}", {
						_token: "{{Session::token()}}",
						data: formData,
						stripe_token: token,
						price: price,
						package: package
					  }).done(function(data){
						//console.log(data)
						if(data['success'] == true){
						  //Go TO Finish Order Screen
						  window.location.href = "{{route('index')}}/finish_package_order/"+data['report_id'];
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
                /*}else{

                }                
            }); */

			/*
            $("#ccPay").click(function(){
                if(validateForm() == true){
					console.log(formData);
                    $.post("{{route('initpayment')}}",{
						_token: "{{Session::token()}}",
						data: formData,
						package: package,
						price: price * 0.71						
					}).done(function(data){
						var pdata = JSON.parse(data);
						if(pdata.Success == true){
							//console.log(pdata.OrderCode);
							window.location.href = "https://www.vivapayments.com/web/checkout?ref="+pdata.OrderCode;
						}else{
							
						}
					});
                
                }else{

                }
                
            });*/
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
				  type:"package_purchase",
                };

                return true;
            }


            function showPaymentMethod($type, $type2){
                $('.cardDiv, .PPDiv, .btcDIV, .cc-pay, .pp-pay, .btc-pay').hide();   
                $($type).show();   
                $($type2).show();
            }

            function getBTCPrice(price){
                $.get("https://blockchain.info/tobtc?currency=USD&value="+price).done(function(data){
                    $("#btcPrice i").text(data);
                });
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
			
			/*$(".paypalForm").submit(function(event){
				var cookieData = {
					'name': $("#name").val(),
					'phone': $("#phone").val(),
					'email': $("#email").val(),
					'password': $("#password").val(),
					'type': 'package_purchase',
				}
				console.log(cookieData);
				
				//return false;
				//event.preventDefault();
				if(validateForm() == true){
					document.cookie = "order_data="+JSON.stringify(cookieData); 
					$(".paypalForm").submit();
					return;
					
				}else{
					return false;
				}
			});*/
			
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