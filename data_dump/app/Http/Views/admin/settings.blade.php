@extends('admin.layout.master')

@push('css')
<style> 
</style>
@endpush

@section('content')
<div class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body p-5">
					<form id="sendReportViaEmailForm" action="{{route('admin.settings')}}" method="POST">
						@csrf
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-4 col-form-label">Paypal</label>
							<div class="col-sm-8">
							  <div class="form-check  col-form-label">
								<input class="form-check-input" type="checkbox" id="gridCheck1" name="paypal" @if($setting->paypal) checked="" @endif>
								<label class="form-check-label" for="gridCheck1">
								  Enable Paypal
								</label>
							  </div>
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputPassword" class="col-sm-4 col-form-label">Stripe</label>
							<div class="col-sm-8">
							  <div class="form-check  col-form-label">
								<input class="form-check-input" type="checkbox" id="gridCheck2" name="stripe" @if($setting->stripe) checked="" @endif>
								<label class="form-check-label" for="gridCheck2">
								  Enable Stripe
								</label>
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group row">
							<label for="inputPassword" class="col-sm-4 col-form-label">Authorize Net</label>
							<div class="col-sm-8">
							  <div class="form-check  col-form-label">
								<input class="form-check-input" type="checkbox" id="gridCheck3" name="authorizeNet" @if($setting->authorizeNet) checked="" @endif>
								<label class="form-check-label" for="gridCheck3">
								  Enable Authorize.Net
								</label>
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group row">
							<label for="inputPassword" class="col-sm-4 col-form-label">Paytabs (Checkout)</label>
							<div class="col-sm-8">
							  <div class="form-check  col-form-label">
								<input class="form-check-input" type="checkbox" id="gridCheck4" name="paytabs" @if($setting->paytabs) checked="" @endif>
								<label class="form-check-label" for="gridCheck4"> 
								  Enable Paytabs (Checkout)
								</label>
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group row">
							<label for="inputPassword" class="col-sm-4 col-form-label">Paytabs (Hosted)</label>
							<div class="col-sm-8">
							  <div class="form-check  col-form-label">
								<input class="form-check-input" type="checkbox" id="gridCheck5" name="paytabs_hosted" @if($setting->paytabs_hosted) checked="" @endif>
								<label class="form-check-label" for="gridCheck5">
								  Enable Paytabs (Hosted)
								</label>
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group row">
							<label for="inputPassword" class="col-sm-4 col-form-label">Report type</label>
							<div class="col-sm-8">
							  <div class="form-check  col-form-label">
								<select class="form-control" name="report_type">
									<option value="normal" {{$setting->report_type == 'normal' ? 'selected' : ''}}>Normal</option>
									<option value="vini" {{$setting->report_type == 'vini' ? 'selected' : ''}}>Vini</option>
									<option value="carfax" {{$setting->report_type == 'carfax' ? 'selected' : ''}}>Carfax</option>
								<select>
							  </div>
							</div>
						  </div>
						  
						  
						 <div class="form-group">
						 	<button class="btn btn-primary btn-block" >
								<span>Update Settings</span> 
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
</script>
@endpush