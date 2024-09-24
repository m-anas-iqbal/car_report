@extends('layout.master')
@push('css') 
@endpush
@section('content')
<div class="checkout_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">  
                <div class="report_summary text-center"> 
                        <h1 class="text-center mb-1 text-success">Congratulations!</h1>
                        <h4 class="text-center mt-3 mb-1">Your VIN report has been generated, and also been sent on your email</h4> 
                        <p>You can download the report by clicking button below.</p> 
                        <a class="mt-3 btn btn-primary order_report_button" href="/{{$report->report_url}}">
                          <span class="ccbtnmsg"><i class="fas fa-download"></i> Download Report Now</span>
                        </a> 
                            
                    
                        <p class="payment-disclaimer text-center mt-3">By clicking download button you agree to our Terms & Conditions and NMVTIS disclaimer</p>
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
    
  });
</script>
@endpush