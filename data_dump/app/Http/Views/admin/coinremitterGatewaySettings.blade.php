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
			<div class="col-md-4">
				<div class="card">
					<div class="card-body p-5">
					   <center>
					       <h4>Add Coinremitter Wallet</h4>
					   </center>
                    
					<form action="{{ url('admin/add-coinremitter-wallet') }}" method="post">
					    @csrf
						 <div class="form-group">
						 	<label for="coin">Coin</label>
						 	<input type="text" class="form-control" name="coin" id="coin" required>
						 </div>
						 <div class="form-group">
						 	<label for="">Wallet API Key</label>
						 	<input type="text" class="form-control" name="wallet_api_key" id="wallet_api_key" required>
						 </div>
						 <div class="form-group">
						 	<label for="">Wallet Password</label>
						 	<input type="text" class="form-control" name="wallet_password" id="wallet_password" required>
						 </div>
						 <div class="form-group">
						 	<label for="">Status</label>
						 	<select class="form-control" name="status" id="status" required>
						 	    <option>Active</option>
						 	    <option>Inactive</option>
						 	</select>
						 </div>
						 <div class="form-group">
						 	<button class="btn btn-primary btn-block" id="generateReport">
								<span>Add Wallet</span>
							</button>
						 </div>
					</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
		        <div class="card">
					<div class="card-body p-5">
					   <center>
					       <h4>Wallets List</h4>
					   </center>
					   <table class="table table-responsive">
					       <tr>
					           <th>No</th>
					           <th>Coin</th>
					           <th>Wallet API Key</th>
					           <th>Wallet Password</th>
					           <th>Status</th>
					           <th>Action</th>
					       </tr>
					       <?php 
					       $i = 1;
					       ?>
					       @foreach($wallets as $wallet)
					       <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $wallet->coin }}</td>
                                <td>{{ $wallet->wallet_api_key }}</td>
                                <td>{{ $wallet->wallet_password }}</td>
                                <td>{{ $wallet->status }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-coinremitter-wallet').'/'.$wallet->id }}"><i class="fas fa-edit text-primary"></i></a>
                                    <a href="{{ url('admin/delete-coinremitter-wallet').'/'.$wallet->id }}" onclick="return confirm('Do you really want to delete this wallet ?');"><i class="fa fa-trash text-danger"></i></a>
                                </td>
					       </tr>
					       <?php $i++; ?>
					       @endforeach
					   </table>
					 </div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection