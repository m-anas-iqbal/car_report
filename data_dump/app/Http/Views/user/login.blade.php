@extends('layout.master')

@section('content')
<section class="p-3">
	<div class="container">
		@include('layout.alerts')
		<div class="row justify-content-center">
			<div class="col-6">
				<div class="login_page py-5">
					@error('email')
			        	<div class="alert alert-danger">{{ $message }}</div>
			      	@enderror
					<h1 class="text-center mb-3">Login</h1>
					<form action="{{route('user.login')}}" method="POST">
						@csrf
						<div class="form-floating mb-3">
		                    <input type="email" class="form-control" id="floatingInput2" name="email" placeholder="name@example.com" required>
		                    <label for="floatingInput2">Email address</label>
		                </div>
						<div class="form-floating mb-3">
		                    <input type="password" class="form-control" id="floatingInput2" name="password" placeholder="enter your Password" required>
		                    <label for="floatingInput2">Password</label>
		                </div>
		                <div class="d-grid">
		                	<button class="btn btn-primary btn-lg">Login</button>
		                </div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection