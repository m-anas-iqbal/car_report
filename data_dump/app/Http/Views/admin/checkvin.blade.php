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
						 	<label for="email">VIN Number</label>
						 	<input type="text" class="form-control" name="vin" id="vin" required>
						 </div>
						 <div class="form-group">
						 	<button class="btn btn-primary btn-block" id="generateReport">
								<span>Check VIN Number</span>
								<span> <i class="fas fa-spin fa-spinner"></i> Generating Report</span>
							</button>
						 </div>
						 <br />
						 <ul>
							<li><strong>Manufacturer</strong>: <span id="Manufacturer"></span></li>
							<li><strong>Make</strong>: <span id="Make"></span></li>
							<li><strong>Model</strong>: <span id="Model"></span></li>
							<li><strong>ModelYear</strong>: <span id="ModelYear"></span></li>
							<li><strong>PlantCountry</strong>: <span id="PlantCountry"></span></li>
							<li><strong>VehicleType</strong>: <span id="VehicleType"></span></li> 
						 </ul>
						 <button type="button" class="btn btn-success d-none" id="updateCode">Update Database</button>
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
	var error_code = '';
	$("#sendReportViaEmailForm").on('submit',function(e){
		e.preventDefault();
		$("#generateReport").prop('disabled', true);
		$("#generateReport span:first-child").hide();
		$("#generateReport span:last-child").show();
		
		var email 	= $("#email").val();
		var vin		= $("#vin").val();
		
		$.post("{{route('admin.checkvin')}}",{
			_token: "{{Session::token()}}",
			vin: vin 
		}).done(function(data){
			$("#generateReport").prop('disabled', false);
			$("#generateReport span:first-child").show();
			$("#generateReport span:last-child").hide();
			console.log(data);
			if(data['success'] == true){
				$("#email").val('');
				$("#vin").val(''); 
				$("#Manufacturer").text(data['Manufacturer']);
				$("#Make").text(data['Make']);
				$("#Model").text(data['Model']);
				$("#ModelYear").text(data['ModelYear']);
				$("#PlantCountry").text(data['PlantCountry']);
				$("#VehicleType").text(data['VehicleType']); 
				error_code = data['ErrorCode'];
				$("#updateCode").removeClass('d-none');
				
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
	
	$("#updateCode").click(function(){
		console.log(error_code);  
		$.post("https://nmvtis.vehiclehistorydata.com/speical_api_new/checkvin/updateerrorcode", {
			'error_code':error_code
		}).done(function(data){
			alert('The database updated successfully!');
		}).fail(function(){
			alert('The database is already updated!');
		});
	});
});
</script>
@endpush