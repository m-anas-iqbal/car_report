@extends('layout.master')
@section('content')
<style>
    .widget-border-title {
        color: var(--secondary);
        /* border-bottom: 0.0625rem solid #e1e1e1; */
        font-size: 18px;
        font-weight: 700;
        text-transform: uppercase;
        position: relative;
    }
    .widget-border-title::before {
        content: '';
        width: 28%;
        height: 3px;
        background: var(--primary);
        position: absolute;
        bottom: -10px;
    }
    .widget-category .category-list {
        /*padding: 1.25rem;*/
    }
    .widget-light-bg {
        background-color: #fff;
        box-shadow: 0 0.0625rem 0.0625rem 0 rgba(0, 0, 0, .1);
        padding: 20px;
    }

    a {
        text-decoration: none;
    }

    .widget-category .category-list ul li a {
        color: #646464;
        padding-left: 1.25rem;
        position: relative;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        text-decoration: none;
    }

    .widget-category .category-list ul li a:before {
        content: "\f105";
        font-family: "Font Awesome 5 Free";
        font-size: .875rem;
        color: #F57615;
        font-weight: 600;
        position: absolute;
        left: 0;
    }

    .pagination-layout nav {
        width: max-content;
        display: block;
        margin: 0 auto;
    }
    li.page-item.active span {
        background: #F57615 !important;
        color: #000;
        border-color: #F57615 !important;
    }
    li.page-item span {
        color: #000;
    }
    a.page-link{
        color:#000;
    }
    a.page-link:hover{
        color:#fff;
        background: #F57615 !important;
        border-color: #F57615 !important;
    }
    .page-link:focus {
        box-shadow: none;
    }
    .blog-box-layout2 .item-content h3.item-title {
        font-size: 1.225rem;
        line-height: 1.225;
        min-height: 55px;
        margin-bottom: 0;
    }
</style>
<section>
    @include('layout.index-banner')
    <section class="bg-light pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row g-3">
                    @foreach($blogs as $key => $blog)
                        <!-- column #1 -->
                        <div class="col-md-6 col-12">
                            <div class="blogbx h-100">
                                <div class="blog-box-layout2 mb-4 h-100">
                                    <div class="item-img">
                                        <a href="{{route('blogs.show', $blog->slug)}}" title="{{$blog->title}}" title="How to look for the best sales in USA">
                                            <img src="{{url($blog->image)}}" class="img-fluid yall-loaded" alt="{{$blog->title}}">
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title mb-3">
                                            <a href="{{route('blogs.show', $blog->slug)}}" title="{{$blog->title}}" title="How to look for the best sales in USA">
                                                {{$blog->title}}
                                            </a>
                                        </h3>
                                        <ul class="blog-entry-meta pb-3">
                                            <li class="text-dark">
                                                <i class="far fa-calendar-alt"></i>{{\Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}}
                                            </li>
                                            <li>
                                                <i class="fas fa-user"></i> By <span class="name"><a href="?category={{$blog->category->slug}}"> {{$blog->category->name}}</a></span>
                                            </li>
{{--                                            <li>--}}
{{--                                                <i class="fas fa-phone-alt"></i> {{$blog->phone}}</span>--}}
{{--                                            </li>--}}
                                        </ul>
                                        <p class="s-des">
                                            {!!\Illuminate\Support\Str::limit(strip_tags($blog->description), 100, '...')!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination-layout pt-3">
                        {{ $blogs->links() }}
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 sidebar-break-sm sidebar-widget-area">
                    <div class="widget-lg widget-light-bg widget-category mb-3">
                        <h3 class="widget-border-title ">Categories List</h3>
                        <div class="category-list">
                            <ul class="list-inline mb-0">
                                @foreach($categories as $key => $category)
                                <li class="list-inline border-top pt-3 mt-3">
                                    <a href="?category={{$category->slug}}" title="{{$category->name}}">
                                        {{$category->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget-lg widget-light-bg widget-category mb-3">
                        <h3 class="widget-border-title mb-4">OUR SERVICES</h3>
                        <div class="category-list">
                            <div class="row">
                                <div class="col-4 mb-2">
                                    <img src="{{asset('images/blog-2.jpg')}}" class="img-fluid" alt="My Elite">
                                </div>
                                <div class="col-4 mb-2">
                                    <img src="{{asset('images/blog-1.jpg')}}" class="img-fluid" alt="My Elite">
                                </div>
                                <div class="col-4 mb-2">
                                    <img src="{{asset('images/blog-3.jpg')}}" class="img-fluid" alt="My Elite">
                                </div>
                                <div class="col-4 mb-2">
                                    <img src="{{asset('images/blog-1.jpg')}}" class="img-fluid" alt="My Elite">
                                </div>
                                <div class="col-4 mb-2">
                                    <img src="{{asset('images/blog-2.jpg')}}" class="img-fluid" alt="My Elite">
                                </div>
                                <div class="col-4 mb-2">
                                    <img src="{{asset('images/blog-3.jpg')}}" class="img-fluid" alt="My Elite">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="widget-lg widget-light-bg widget-category mb-3">
                        <h3 class="widget-border-title mb-4">Tags</h3>
                        <div class="category-list">
                            <div class="blogTags">
                                <h3>
                                    <a href="#">Design</a>
                                </h3>
                                <h3>
                                    <a href="#">User interface</a>
                                </h3>
                                <h3>
                                    <a href="#">SEO</a>
                                </h3>
                                <h3>
                                    <a href="#">WordPress</a>
                                </h3>
                                <h3>
                                    <a href="#">Joomla</a>
                                </h3>
                                <h3>
                                    <a href="#">Development</a>
                                </h3>
                                <h3>
                                    <a href="#">Design</a>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.how-to-works')
</section>
@endsection
