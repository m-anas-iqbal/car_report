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
					<h1>Dashboard</h1> 
					<h4>My Receipts</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Package</th>
								<th>Payment Method</th>
								<th>Payment Status</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							@foreach(auth()->user()->receipts()->latest()->get() as $receipt)
								<tr>
									<td>{{$receipt->transaction_id}}</td>
									<td>{{$receipt->package}}</td>
									<td>{{$receipt->payment_method}}</td>
									<td>{{$receipt->payment_status}}</td>
									<td>${{$receipt->amount}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection