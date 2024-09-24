@extends('layout.master')
@push('css')
  <script src="https://www.paypal.com/sdk/js?client-id=AWpZTyxRtgC5t0JFNRptayS_twYHovefNqa4cScaYjaIR7UTXI7T7i0beHv8eDwORMgPvfe98v6kaE3M&currency=USD"></script> 
  <script src="https://js.stripe.com/v3/"></script>
@endpush
@section('content')
<div class="checkout_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">  
                <div class="report_summary"> 
                        @if($error_code == '0')
                        <div class="summary_status_success">
                          <h1 class="text-center mb-1"><i class="fas fa-check-circle" aria-hidden="true"></i> Congratulations!</h1>
                          <h4 class="text-center mb-3">Your vehicle's report has been summarized.</h4>
                          <table class="table table-striped ">
                              <tr>
                                  <td>VIN</td>
                                  <th  colspan="3">{{$vin}}</th>
                              </tr>
                              <tr >
                                  <td>Vehicle</td>
                                  <th colspan="3">{{$vehicle}}</th>
                              </tr>
                              <tr>
                                  <td>Engine</td>
                                  <th>{{$engine}}</th>
                                  <td>Made In</td>
                                  <th>{{$made_in}}</th>
                              </tr>
                              <tr>
                                  <td>Photos</td>
                                  <th  colspan="3"> No photos are available for this vehicle </th>
                              </tr>
                          </table> 
                        </div>
                        @else
                        <div class="summary_status_error">
                          <h1 class="text-center mb-1"><i class="fas fa-exclamation-circle"></i> Sorry!</h1>
                          <h4 class="text-center mb-3">Your VIN Number is incorrect, but we still can generate VIN Report for you. Purchase credits below.</h4>
                        </div>
                        @endif 
                        <div class="downArrowForSignup">
                          <i class="fas fa-arrow-down"></i>
                        </div>
                        <div class="summary_status_signup">
                          <h1 class="text-center mb-1"><i class="far fa-user"></i> Sign Up & Get Full Report </h1>
                        <h4 class="text-center mb-3">Create your account to get full report instantly!</h4>
                        <div class="checkout_user_info_form"> 
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput1" name="name" placeholder="John Doe" required value="{{request()->name}}">
                                  <label for="floatingInput1">Your name</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput2" name="phone" placeholder="+1123456789" required value="{{request()->phone}}">
                                  <label for="floatingInput2">Phone number</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-floating mb-3">
                                  <input type="email" class="form-control" id="floatingInput3" name="email" placeholder="" required value="{{request()->email}}">
                                  <label for="floatingInput3">Email address</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-3">
                                  <input type="password" class="form-control" id="floatingInput4" name="password" placeholder="" required autofocus="">
                                  <label for="floatingInput4">Password</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput5" name="vin" placeholder="" required value="{{request()->vin}}">
                                  <label for="floatingInput5">VIN Number</label>
                                </div></div> 
                            </div> 
                        </div>
                        
                        <div class="package_chooser">
                          <h3>1.  How Many Clearvin Report Credits Do You Need? </h3>
                          <ul>
                            <li>
                              <label for="package1">
                                <input type="radio" 
									value="package1" 
									name="package" 
									id="package1" 
									data-price="25" 
									required 
									@if($selected_package == 'package1') checked @endif>
                                <span> 1 Report <strong>$25</strong>  </span>
                              </label>
                            </li>
                            <li>
                              <label for="package2">
                                <input type="radio" value="package2" name="package" id="package2" data-price="35"  required @if($selected_package == 'package2') checked @endif>
                                <span> 2 Reports <strong>$35</strong>   </span>
                              </label>
                            </li>
                            <li>
                              <label for="package3">
                                <input type="radio" value="package3" name="package" id="package3" data-price="61"  required @if($selected_package == 'package3') checked @endif>
                                <span> 5 Reports <strong>$61</strong>  </span>
                              </label>
                            </li>
                            <li>
                              <label for="package4">
                                <input type="radio" value="package4" name="package" id="package4" data-price="99"  required @if($selected_package == 'package4') checked @endif>
                                <span> 10 Reports <strong>$99</strong>   </span>
                              </label>
                            </li>
                            <li>
                              <label for="package5">
                                <input type="radio" value="package5" name="package" id="package5"  data-price="154" required @if($selected_package == 'package5') checked @endif>
                                <span> 25 Reports <strong>$154</strong>   </span>
                              </label>
                            </li>
                            <li>
                              <label for="package6">
                                <input type="radio" value="package6" name="package" id="package6" data-price="224"  required @if($selected_package == 'package6') checked @endif>
                                <span> 50 Reports <strong>$224</strong>   </span>
                              </label>
                            </li> 
                          </ul>
                        </div>
                        <div class="payment_method_selector">
                          <h3>2.  How Would You Like to Pay for Your Report Credits? </h3>
                              
                                
						  
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fa fa-credit-card" aria-hidden="true"></i> Credit / Debit Card
                              </button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="fab fa-paypal" aria-hidden="true"></i> PayPal
                              </button>
                            </li> 
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <form action="{{route('charge_from_card')}}" method="post" id="payment-form">
                              <div class="" style="border: 2px solid #ccc;margin: 45px 0 15px;padding-left: 10px;">
                                <div id="card-element">
                                  <!-- A Stripe Element will be inserted here. -->
                                </div>
            
                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                              </div>
                              <button class="mt-3 btn btn-primary order_report_button" id="orderReportButtonForCC">
                                <span class="ccbtnmsg">Order Report Now <small>after the payment you will be redirected to your report</small></span>
                                <span class="ccbtnloader">
                                  <i class="fas fa-spin fa-spinner"></i> Please wait... your report is being generated.
                                </span>
                                
                              </button>
                            </form>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div id="paypal-button-container" style="margin-top:45px;"></div>
                              <button class="mt-3 btn btn-primary order_report_button " id="orderReportButtonForPP" disabled="true" style="display: none;" > 
                                <span >
                                  <i class="fas fa-spin fa-spinner"></i> Please wait... your report is being generated.
                                </span>
                                
                              </button>
                            </div> 
                          </div>
                          


                        </div>
                        </div>
                        

                        {{-- <div class="" style="display: table;width: 100%;">
                          <div class="form-floating">
                            <select class="form-select" id="floatingSelect12" aria-label="Floating label select example" required name="payment_method">
                              <option selected disabled>Select Payment Method</option>
                              <option value="paypal">Paypal</option>
                            </select>
                            <label for="floatingSelect12">Select Payment Method</label>
                          </div>
                        </div> 
                        <button class="mt-5" id="test">Test </button>--}}
                            
                        <p class="payment-disclaimer text-center mt-3">By clicking Go To Payment you agree to our Terms & Conditions and NMVTIS disclaimer</p>
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="what_in_the_report">
                    <h3>What's in the report?</h3>
                    <ul class="mt-2">
                        <li>
                          <span>Vehicle Specifications</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Current and Historical States of Title</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Title Brand History</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Insurance Total Loss Records</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Junk & Salvage Information</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Lien/Impound/Theft Records</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Retail/Trade in/Loan Values</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Detailed Auction Sales History</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Safety Recalls Data</span>  <i class="fas fa-check"></i>
                        </li>
                        <li>
                          <span>Odometer Events</span>  <i class="fas fa-check"></i>
                        </li>
                    </ul>
                    <img src="{{asset('images/guarantee.png')}}" alt="" class="mt-5" >
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection



@push('js')

<script>
  $(document).ready(function(){
    $("#{{$selected_package}}").prop("checked", true);
    var price = 25;
    var package = '{{$selected_package}}';

    $("input[name='package']").change(function(){
      price = $(this).data('price');
      package = $(this).val();
    });



    var formData = {
      name:$("#floatingInput1").val(),
      phone:$("#floatingInput2").val(),
      email:$("#floatingInput3").val(),
      password:$("#floatingInput4").val(),
      vin:$("#floatingInput5").val(),
    };

    $("#floatingInput4").keyup(function(){
      formData.password = $(this).val();
    });

    //var stripe = Stripe('pk_test_51I8uLdH2bhOP6mplTToWVFN1RZuRWltQlmdaEkhFyaDhrhxpf3QHEIpwg8wWc5miz09zPukJOVFrwoulNfiSAMx0002QKWjopN');
    var stripe = Stripe('pk_live_51IQIzGCssUlQAYjYDYFg5gCVguvi2NWtgn3T3liQyYMklsTQmsiETlz2KMdTf1g6R9CCLNvczPEYljJ5MHdghoOG00DDN4PnLY');
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
    stripeForm.addEventListener('submit', function(event) {
      event.preventDefault();
      stripe.createToken(card).then(function(result) {
        if (result.error) {
        
          // Inform the customer that there was an error.
        //$("#ccpaybutton").attr('disabled', false);
        //$("#ccpaybutton").removeClass('disabled');
        card.update({disabled: false});
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
          $("#ccpaybutton").attr('disabled', true);
          $("#ccpaybutton").addClass('disabled');
          card.update({disabled: true});
            // Send the token to your server. 
            $("#orderReportButtonForCC").attr('disabled', true);
            $(".ccbtnmsg").hide()
            $(".ccbtnloader").show()
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
    });
    /////////////////////////////////////////////////////

	 var FUNDING_SOURCES = [
        paypal.FUNDING.PAYPAL, 
        paypal.FUNDING.CARD
    ];
	
	 FUNDING_SOURCES.forEach(function(fundingSource) {
		var button = paypal.Buttons({
            fundingSource: fundingSource,
			createOrder: function(data, actions){
				return actions.order.create({
					purchase_units: [{
					  amount: {
						value: price 
					  }
					}]
				  });
			  },
			  onApprove: function(data, actions) {
				return actions.order.capture().then(function(details) {
				  $("#paypal-button-container").hide();
				  $("#orderReportButtonForPP").show();
				  // This function shows a transaction success message to your buyer.
				  //console.log(details);
				  
				  //console.log(details.purchase_units[0].payments.captures[0].id);
				  //console.log(data);
				  //console.log('Transaction completed by ' + details.payer.name.given_name);
				  $.post("{{route('charge_from_paypal')}}", {
					_token: "{{Session::token()}}",
					transaction_id: details.purchase_units[0].payments.captures[0].id,
					status: details.status,
					payer_email_address: details.payer.email_address,
					data: formData,            
					price: price,
					package: package
				  }).done(function(data){
					if(data['success'] == true){
					  //Go TO Finish Order Screen
					  window.location.href = "{{route('index')}}/finish_order/"+data['report_id'];
					}else{

					}
				  });
				});
			  }
        });
		if (button.isEligible()) {
			button.render('#paypal-button-container');
		}
	 });
	/*
    paypal.Buttons({
      //fundingSource: paypal.FUNDING.PAYPAL, 
      createOrder: function(data, actions){
        return actions.order.create({
            purchase_units: [{
              amount: {
                value: price 
              }
            }]
          });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          $("#paypal-button-container").hide();
          $("#orderReportButtonForPP").show();
          // This function shows a transaction success message to your buyer.
          //console.log(details);
          
          //console.log(details.purchase_units[0].payments.captures[0].id);
          //console.log(data);
          //console.log('Transaction completed by ' + details.payer.name.given_name);
          $.post("{{route('charge_from_paypal')}}", {
            _token: "{{Session::token()}}",
            transaction_id: details.purchase_units[0].payments.captures[0].id,
            status: details.status,
            payer_email_address: details.payer.email_address,
            data: formData,            
            price: price,
            package: package
          }).done(function(data){
            if(data['success'] == true){
              //Go TO Finish Order Screen
              window.location.href = "{{route('index')}}/finish_order/"+data['report_id'];
            }else{

            }
          });
        });
      }
      }).render('#paypal-button-container'); */

    $("#test").click(function(){ 
      console.log(formData);
    });
  });
</script>
@endpush