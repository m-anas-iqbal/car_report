@extends('admin.layout.master')
@section('title', ((isset($blog)) ? 'Edit' : 'New') .' Blogs')
@section('content')
<style>
    .close-thik {
        color: #777;
        background: red;
        font-size: 70px;
        position: absolute;
        right: 5px;
        text-decoration: none;
        text-shadow: 0 1px 0 #fff;
        top: 5px;
        z-index: 9999;
        width: 25px;
        height: 25px;
        color: white;
        border-radius: 100%;
    }

</style>
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
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary float-right"><i class="fa fa-reply"></i> Go Back</a>
                            <h4>@yield('title')</h4>
                        </center>

                        <form method="post" action="{{@$blog ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" enctype="multipart/form-data">
                            @if(isset($blog))
                            @method('PUT')
                            @endif
                            @csrf

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ @$blog->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="coin">Title</label>
                                <input value="{{ (isset($blog) ? $blog->title : '')  }}" type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="coin">Thumbnail</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if(isset($blog))
                                @if($blog->image)
                                <img src="{{ asset($blog->image) }}" width="100px" height="100px">
                                @else
                                no image found
                                @endif
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="coin">Images</label>
                                <input type="file" class="form-control" name="images[]" id="images" multiple>
                                @if(isset($blog))
                                @if($blog->images)
                                <div class="multi-images my-4">
                                    @foreach($blog->images as $key => $img)
                                    <div class="float-left ml-2 border position-relative">
                                        <a onclick="return confirm('Do you really want to delete this blog ?');" href="{{ route('admin.blogs.image.destroy', $img->id) }}"  class="close-thik"></a>
                                        <img src="{{ asset($img->url) }}" width="200px" height="200px">
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                no image found
                                @endif
                                @endif
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label for="coin">Phone</label>
                                <input value="{{ (isset($blog) ? $blog->phone : '')  }}" type="text" class="form-control" name="phone" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" placeholder="Enter Description" name="description" id="protextarea">{{ (isset($blog) ? $blog->description : '')  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="coin">Meta title</label>
                                <input value="{{ (isset($blog) ? $blog->meta_title : '')  }}" type="text" class="form-control" name="meta_title" id="meta_title" required>
                            </div>
                            <div class="form-group">
                                <label for="coin">Meta description</label>
                                <textarea class="form-control" placeholder="Enter Description" name="meta_description">{{ (isset($blog) ? $blog->meta_description : '')  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1" {{ @$blog->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="2" {{ @$blog->status == 2 ? 'selected' : ''}}>Inactive</option>
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
        selector: 'textarea#protextarea'
        , height: 500
        , branding: false,

        plugins: [
            "advlist autolink lists link image charmap print preview anchor"
            , "searchreplace visualblocks code fullscreen"
            , "insertdatetime media table paste imagetools wordcount"
            , "codesample code"
        , ],

        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample | code | responsivefilemanager | print preview media | forecolor backcolor emoticons fontselect"
        , content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'
            , '//www.tiny.cloud/css/codepen.min.css'
        ]
        , image_advtab: true
    , });

</script>
@endpush
