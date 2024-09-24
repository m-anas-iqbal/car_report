@extends('admin.layout.master')

@push('css')
<style>
	#generateReport{}
	#generateReport span:first-child{}
	#generateReport span:last-child{
		display: none;
	}
</style>
@endpush

@section('content')
<div class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body p-5">
					<form id="sendReportViaEmailForm">
						 <div class="form-group">
						 	<label for="email">Email</label>
						 	<input type="email" class="form-control" name="email" id="email" required>
						 </div>
						 <div class="form-group">
						 	<label for="email">VIN Number</label>
						 	<input type="text" class="form-control" name="vin" id="vin" required>
						 </div>
						 <div class="form-group">
						 	<button class="btn btn-primary btn-block" id="generateReport">
								<span>Generate Report</span>
								<span> <i class="fas fa-spin fa-spinner"></i> Generating Report</span>
							</button>
						 </div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function(){
	$("#sendReportViaEmailForm").on('submit',function(e){
		e.preventDefault();
		$("#generateReport").prop('disabled', true);
		$("#generateReport span:first-child").hide();
		$("#generateReport span:last-child").show();
		
		var email 	= $("#email").val();
		var vin		= $("#vin").val();
		
		$.post("{{route('admin.send_report')}}",{
			_token: "{{Session::token()}}",
			vin: vin,
			email: email
		}).done(function(data){
			$("#generateReport").prop('disabled', false);
			$("#generateReport span:first-child").show();
			$("#generateReport span:last-child").hide();
			if(data['success'] == true){
				$("#email").val('');
				$("#vin").val('');
				$("#email").focus();
				alert('Report generated successfully & sent via email!');
			}else{
				$("#email").val('');
				$("#vin").val('');
				$("#email").focus();
				alert('Your VIN number is not correct, please enter correct VIN number.');
			}
			
		}).fail(function(){
			$("#email").val('');
			$("#vin").val('');
			$("#email").focus();
			$("#generateReport").prop('disabled', false);
			$("#generateReport span:first-child").show();
			$("#generateReport span:last-child").hide();
			alert('Error occured!');
		});
	});
});
</script>
@endpush