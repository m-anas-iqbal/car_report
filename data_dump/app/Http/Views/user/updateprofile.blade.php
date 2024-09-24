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
					<h3 class="text-center mt-4">Update your profile</h3>

					<div class="login_page py-5">
						@error('email')
				        	<div class="alert alert-danger">{{ $message }}</div>
				      	@enderror 
						<form action="{{route('user.myprofilesettings')}}" method="POST" id="changePassword">
							@csrf 
							<div class="form-floating mb-3">
			                    <input type="text" class="form-control" id="update_profile_name" name="update_profile_name" placeholder="enter your Password" required value="{{auth()->user()->name}}">
			                    <label for="update_profile_name">Your name</label>
			                </div>
							<div class="form-floating mb-3">
			                    <input type="email" class="form-control" id="update_profile_email" name="update_profile_email" placeholder="enter your Password" readonly="" value="{{auth()->user()->email}}">
			                    <label for="update_profile_email">Your Email</label>
			                </div>
							<div class="form-floating mb-3">
			                    <input type="text" class="form-control" id="update_profile_phone" name="update_profile_phone" placeholder="enter your Password" required value="{{auth()->user()->phone_number}}">
			                    <label for="update_profile_phone">Your Phone Number</label>
			                </div>
			                <div class="d-grid">
			                	<button class="btn btn-primary btn-lg">Update</button>
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
<script> </script>
@endpush