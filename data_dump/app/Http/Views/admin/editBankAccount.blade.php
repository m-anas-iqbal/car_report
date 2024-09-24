@extends('admin.layout.master')
@section('content')
<script src="https://cdn.tiny.cloud/1/wwehllxrqhb61kfzdw5sycgfd0rde684v1b9gacglw82zotg/tinymce/5/tinymce.min.js"></script>
  <script type="text/javascript">

      tinymce.init({
  selector: 'textarea#protextarea',
  height: 500,
  branding:false,

  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table paste imagetools wordcount",
    "codesample code",
  ],      

  toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample | code | responsivefilemanager | print preview media | forecolor backcolor emoticons fontselect",
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ],
  image_advtab: true ,
});
      
  </script>
  
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
					       <a href="{{ url('admin/manage-bank-accounts') }}" class="btn btn-primary float-right"><i class="fa fa-reply"></i> Go Back</a>
					       <h4>Edit Bank Account</h4>
					   </center>
                    
					<form method="post">
					    @csrf
						 <div class="form-group">
						 	<label for="coin">Bank Name</label>
						 	<input value="{{ $bank_account->bank_name }}" type="text" class="form-control" name="bank_name" id="bank_name" required>
						 </div>
						 <div class="form-group">
						 	<label for="">Bank Info</label>
						 	<textarea class="form-control" placeholder="Enter Bank Information" name="bank_info" id="protextarea">{{ $bank_account->bank_info }}</textarea>
						 </div>
						 <div class="form-group">
						 	<label for="">Waiting Time (Mints)</label>
						 	<input type="number" value="{{ $bank_account->waiting_time }}" class="form-control" name="waiting_time" id="wallet_time" required>
						 </div>
						 <div class="form-group">
						 	<label for="">Status</label>
						 	<select class="form-control" name="status" id="status" required>
						 	    <option>{{ $bank_account->status }}</option>
						 	    <option>Active</option>
						 	    <option>Inactive</option>
						 	</select>
						 </div>
						 <div class="form-group">
						 	<button class="btn btn-primary float-right" id="generateReport">
								<span><i class="fa fa-save"></i> Update Bank</span>
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