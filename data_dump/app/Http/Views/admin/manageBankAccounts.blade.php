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
			<div class="col-md-12">
		        <div class="card">
					<div class="card-body p-5">
					   <center>
				           <a class="btn btn-primary float-right" href="{{ url('admin/add-bank-account') }}"><i class="fa fa-plus"></i> Add New</a>
					       <h4>Banks List</h4>
					   </center>
					   <br><br>
					   
					   <table class="table table-hover">
					       <tr>
					           <th>No</th>
					           <th>Bank Name</th>
					           <th>Status</th>
					           <th>Created At</th>
					           <th>Action</th>
					       </tr>
					       <?php
					       $i = 1;
					       ?>
					       @foreach($bank_accounts as $bank_account)
					       <tr>
					           <td>{{ $i }}</td>
					           <td>{{ $bank_account->bank_name }}</td>
					           <td>{{ $bank_account->status }}</td>
					           <td>{{ $bank_account->created_at }}</td>
					           <td>
					               <a href="{{ url('admin/edit-bank-account').'/'.$bank_account->id }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
					               
					               <a onclick="return confirm('Do you really want to delete this bank account ?');" href="{{ url('admin/delete-bank-account').'/'.$bank_account->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
					           </td>
					       </tr>
					        @endforeach
					   </table>
					 </div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection