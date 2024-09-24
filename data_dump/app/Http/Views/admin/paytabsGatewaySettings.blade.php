@extends('admin.layout.master')
@section('content')
<div class="content">
	<div class="container">
	    @if(Session::has('success'))
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
        @endif
		<div class="row justify-content-center">
		    
			<div class="col-md-6">
				<div class="card">
					<div class="card-body p-5">
					   <center>
					       <h4>Paytabs API Keys</h4>
					   </center>
                    
					<form method="post">
					    @csrf
						 <div class="form-group">
						 	<label for="api_login_id">Profile Id</label>
						 	<input type="text" class="form-control" name="paytabs_profile_id" value="{{ $settings->paytabs_profile_id }}" id="paytabs_profile_id" required>
						 </div>
						 <div class="form-group">
						 	<label for="">Currency</label>
						 	<input type="text" class="form-control" value="{{ $settings->paytabs_currency }}" name="paytabs_currency" id="paytabs_currency" required>
						 </div>
						 
						 <div class="form-group">
						 	<label for="">Paytabs Authorization Key</label>
						 	<input type="text" class="form-control" value="{{ $settings->paytabs_authorization_key }}" name="paytabs_authorization_key" id="paytabs_authorization_key" required>
						 </div>
						 
						 <div class="form-group">
						 	<label for="">Paytabs Api client Key</label>
						 	<input type="text" class="form-control" value="{{ $settings->paytabs_api_client_key }}" name="paytabs_api_client_key" id="paytabs_api_client_key" required>
						 </div>
						 
						 
						 <div class="form-group">
						 	<button class="btn btn-primary btn-block" id="generateReport">
								<span>Update Keys</span>
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