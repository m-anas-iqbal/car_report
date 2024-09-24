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
					       <h4>Authorize.Net API Keys</h4>
					   </center>
                    
					<form method="post">
					    @csrf
						 <div class="form-group">
						 	<label for="api_login_id">API Login Id</label>
						 	<input type="text" class="form-control" name="authorizeNet_api_login_id" value="{{ $settings->authorizeNet_api_login_id }}" id="authorizeNet_api_login_id" required>
						 </div>
						 <div class="form-group">
						 	<label for="">API Transaction Key</label>
						 	<input type="text" class="form-control" value="{{ $settings->authorizeNet_transaction_key }}" name="authorizeNet_transaction_key" id="authorizeNet_transaction_key" required>
						 </div>
						 
						 <div class="form-group">
						 	<label for="">Status</label>
						 	<select class="form-control" name="authorizeNet" id="status" required>
						 	    @if($settings->authorizeNet == 1)
						 	    <option value="1">Active</option>
						 	    @else
						 	    <option value="0">Inactive</option>
						 	    @endif
						 	    <option value="1">Active</option>
						 	    <option value="0">Inactive</option>
						 	</select>
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