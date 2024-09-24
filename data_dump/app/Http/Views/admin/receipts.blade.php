@extends('admin.layout.master')

@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body p-0">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>ID</th>
									<th>Order ID</th>
									<th>User</th>
									<th>Amount</th>
									<th>Package</th>
									<th>Payment Method</th>
									<th>Transaction ID</th>
									<th>Payment Status</th>
									<th>VIN</th>
									<th>Date</th>
									<!--copy-->
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($receipts as $receipt)
									<tr>
										<td>{{$receipt->id}}</td>
										<td>{{$receipt->order_id}}</td>
										<td>{{$receipt->user->name}}</td>
										<td>${{$receipt->amount}}</td>
										<td>{{$receipt->package}}</td>
										<td>{{$receipt->payment_method}}</td>
										<td>{{$receipt->transaction_id}}
										    @if($receipt->bank_payment_screenshot)
										    <a href="{{ asset('payment-screenshots').'/'.$receipt->bank_payment_screenshot }}" target="_blank">View Screenhot</a>
										    <br>
										    <br>
										    <a onclick="return confirm('Do you really want to approve this payment ?');" href="{{ url('admin/approve-receipt').'/'.$receipt->id }}" class="btn btn-success btn-sm">Approve</a>
										    <a onclick="return confirm('Do you really want to decline this payment ?');" href="{{ url('admin/decline-receipt').'/'.$receipt->id }}" class="btn btn-danger btn-sm">Decline</a>
										    @endif
										   
										   @if($receipt->authorizeNet_payment_details)
										   
										   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#authorizeNet_payment_details_modal_{{  $receipt->id }}">
  Other Details
</button>

<!-- Modal -->
<div class="modal fade" id="authorizeNet_payment_details_modal_{{  $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transaction Details :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! $receipt->authorizeNet_payment_details !!}
      </div>
      
    </div>
  </div>
</div>

										   
						
										   @endif
										   
										</td>
										<td>{{$receipt->payment_status}}</td>
										<td>{{$receipt->vin}}</td>
										<td>{{$receipt->created_at->format('d-m-Y')}}</td>
										<!--copy,-->
    									<td> 
        										<a href="{{url('admin/send-invoice', $receipt->id)}}" class="btn btn-default btn-outline-danger btn-sm">
                                              <i class="fa fa-arrow-alt-circle-right"></i> Invoice
                                            </a>
                                            
                                        </td>
                                    <!--copy,-->
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="card-footer">
                        <div class="card-tools">
                            {{ $receipts->links() }}
                          </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection