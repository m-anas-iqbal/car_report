@extends('admin.layout.master')
@section('title', 'Blogs')
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
				           <a class="btn btn-primary float-right" href="{{ route('admin.blogs.create') }}"><i class="fa fa-plus"></i> Add New</a>
					       <h4>@yield('title') List</h4>
					   </center>
					   <br><br>
					   
					   <table class="table table-hover">
					       <tr>
					           <th>No</th>
							   <th>Category</th>
					           <th>Title</th>
							   <th>Phone</th>		
					           <th>Status</th>
					           <th>Created At</th>
					           <th>Action</th>
					       </tr>
				
					       @foreach($blogs as $blog)
					       <tr>
					           <td>{{ $loop->iteration }}</td>
					           <td>{{ $blog->category->name }}</td>
					           <td>{{ $blog->title }}</td>
					           <td>{{ $blog->phone }}</td>
					           <td>{{ $blog->status ? 'Active' : 'Inactive' }}</td>
					           <td>{{ $blog->created_at }}</td>
					           <td>
					               <a href="{{ route('admin.blogs.edit' , $blog->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
					               
					               <a onclick="return confirm('Do you really want to delete this blog ?');" href="{{ route('admin.blogs.destroy', $blog->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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