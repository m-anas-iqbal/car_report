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

					<h4>Recent Generated Reports</h4>
					<table class="table table-bordered mb-5">
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
							@foreach(auth()->user()->receipts()->latest()->take(5)->get() as $receipt)
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
					<h4>Recent Orders</h4>
					<table class="table table-bordered mb-5">
						<thead>
							<tr>
								<th>Report ID</th>
								<th width="120" class="text-center">Download</th>
							</tr>
						</thead>
						<tbody>
							@foreach(auth()->user()->reports()->latest()->take(5)->get() as $report)
							<tr>
								<td>{{$report->report_id}}</td>
								<td class="text-center">
									<a href="/{{$report->report_url}}" class="btn btn-primary btn-sm">Download</a>
								</td>
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