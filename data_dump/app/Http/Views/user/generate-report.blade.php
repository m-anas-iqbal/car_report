@extends('layout.master')

@push('css')
<style> 
	:is(.user_report_generation_error, .user_report_generated, .user_start_generating_report){
		display: none;
	}
</style>
@endpush

@section('content')
<section class="p-3 user_page">
	<div class="container">
		@include('layout.alerts')
		<div class="row ">
			<div class="col-md-4">
				@include('user.sidemenu')
			</div>
			<div class="col-md-8">
				<div class="user_page_content">
					<h3 class="text-center mt-4">Generate new VIN report</h3>
					<h5 class="text-center">You can generate <span class="user_credits">{{auth()->user()->credits}}</span> report(s)</h5>
					<div class="login_page py-5">
						@error('email')
				        	<div class="alert alert-danger">{{ $message }}</div>
				      	@enderror 
				      	<div class="user_report_generation_error text-center text-danger">
				      		<i class="fas fa-check-circle mb-2" style="font-size: 40px"></i>
				      		<p>Your VIN Number is not correct. Please contact support or enter correct VIN Number</p>
				      	</div>
						<form action="{{route('user.generatenewreport')}}" method="POST" id="generateReportForm">
							@csrf 
							<div class="form-floating mb-3">
			                    <input type="text" class="form-control" id="vin" name="vin" placeholder="enter your vin number" required>
			                    <label for="vin">VIN Number</label>
			                </div> 
			                <div class="d-grid">
			                	<button class="btn btn-primary btn-lg user_generate_report_button" @if(auth()->user()->credits < 1) disabled  @endif >
				                	<span class="generatemessage">Generate Report</span>
				                	<span class="user_start_generating_report">
				                		<i class="fas fa-spin fa-spinner"></i> Please wait... your report is being generated.
				                	</span>
				                </button>
			                </div>
						</form>
						<div class="user_report_generated text-center">
							<i class="fas fa-check-circle mb-2 text-success" style="font-size: 40px"></i>
				      		<p>Congratulations! Your VIN report has been generated. Please download your report by clicking the button below</p>
				      		<div class="d-grid">
			                	<a class="btn btn-success btn-lg" role="button" id="userReportDownloadButton">
			                		<i class="fas fa-download"></i> 
			                	Download Report</a>
			                </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection

@push('js')
<script>
	$(document).ready(function(){
		$("#generateReportForm").on('submit', function(e){
			var vin = $("#vin").val();
			e.preventDefault();
			$(".user_generate_report_button").attr('disabled', true);
			$(".generatemessage").hide();
			$(".user_start_generating_report").show();
			$.post("{{route('user.generatenewreport')}}", {
				_token: "{{Session::token()}}",
				vin: vin
			}).done(function(data){
				if(data['success'] == true){
					$(".user_report_generation_error").hide();
					$("#generateReportForm").hide();
					$(".user_report_generated").show();
					$("#userReportDownloadButton").attr('href', '/'+data['report_url']);
					$(".user_credits").html(data['user_remaining_credits']);
				}else{
					$(".user_generate_report_button").attr('disabled', false);
					$(".user_report_generation_error").show();
					$("#vin").val('');
					$("#vin").focus();
					$(".user_generate_report_button").attr('disabled', false);
				$(".generatemessage").show();
				$(".user_start_generating_report").hide();
				}
			}).fail(function(){
				$(".user_generate_report_button").attr('disabled', false);
				$(".generatemessage").show();
				$(".user_start_generating_report").hide();
				alert('Server Error, Please try again or contact support.');
			});
		});
	});
</script>
@endpush