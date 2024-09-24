@extends('admin.layout.master')
@section('title', ((isset($category)) ? 'Edit' : 'New') .' Categories')
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
					       <a href="{{ route('admin.categories.index') }}" class="btn btn-primary float-right"><i class="fa fa-reply"></i> Go Back</a>
					       <h4>@yield('title')</h4>
					   </center>
                    
					<form method="post" action="{{@$category ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}">
						@if(isset($category))
							@method('PUT')
						@endif
					    @csrf
						<div class="form-group">
						 	<label for="coin">Name</label>
						 	<input value="{{ (isset($category) ? $category->name : '')  }}" type="text" class="form-control" name="name" id="name" required>
						 </div>
						 <div class="form-group">
						 	<label for="">Status</label>
						 	<select class="form-control" name="status" id="status">
						 	    <option value="1" {{ @$category->status == 1 ? 'selected' : ''}}>Active</option>
						 	    <option value="2" {{ @$category->status == 2 ? 'selected' : ''}}>Inactive</option>
						 	</select>
						 </div>
						 <div class="form-group">
						 	<button class="btn btn-primary float-right">
								<span><i class="fa fa-save"></i> Submit</span>
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

@push('js')
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
@endpush