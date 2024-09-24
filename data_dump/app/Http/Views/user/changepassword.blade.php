@extends('layout.master')

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
					<h3 class="text-center mt-4">Change your password</h3>

					<div class="login_page py-5">
						@error('email')
				        	<div class="alert alert-danger">{{ $message }}</div>
				      	@enderror 
						<form action="{{route('user.changepassword')}}" method="POST" id="changePassword">
							@csrf 
							<div class="form-floating mb-3">
			                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="enter your Password" required>
			                    <label for="current_password">Current Password</label>
			                </div>
							<div class="form-floating mb-3">
			                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="enter your Password" required>
			                    <label for="new_password">New Password</label>
			                </div>
							<div class="form-floating mb-3">
			                    <input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm" placeholder="enter your Password" required>
			                    <label for="new_password_confirm">Confirm New Password</label>
			                </div>
			                <div class="d-grid">
			                	<button class="btn btn-primary btn-lg">Login</button>
			                </div>
						</form>
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
		$("#changePassword").on('submit', function(event){
			var new_password = $("#new_password").val();
			var new_password_confirm = $("#new_password_confirm").val();
			if(new_password != new_password_confirm){
				alert('your password does not match');
				event.preventDefault();	
			}


			
		});
	});
</script>
@endpush