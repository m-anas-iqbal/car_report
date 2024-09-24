@extends('layout.master')
@section('content')
@section('title', $blog->meta_title)
@section('description', $blog->meta_description)
<style>
    .opacity-1 {
        opacity: 1 !important;
    }

    .blog-entry-meta {
        margin-bottom: 0.625rem;
    }

    .blog-entry-meta li {
        display: inline-block;
        font-size: .875rem;
        color: #999;
        margin-right: 0.9375rem;
    }

    .blog-entry-meta li i {
        margin-right: 0.625rem;
        color: #F57615;
    }
    .topSlideBx {
        position: relative;
        height: 350px;
    }
    .topSlideBx img{
        height: 100%;
        width: 100%;
        object-fit: cover;
        filter: grayscale(100%);
    }
    .topSlideBx:hover img{
        filter: grayscale(0);
    }
    .topSlideCont {
        position: absolute;
        bottom: 2px;
        left: 20px;
    }

.topSlideCont{
    /*margin-left: 15px;*/
}
.topSlideCont h6, #swipCoupon h6 {
    background: #F57614;
    display: inline-flex;
    padding: 4px 9px;
    color: #fff;
    border-radius: 20px;
    font-size: 12px;
}
.topSlideCont h6, #swipCoupon h6 {
    display: inline-flex;
    padding: 4px 9px;
    color: #fff;
    border-radius: 20px;
    font-size: 12px;
    margin-bottom: 10px;
}
#swipCoupon h6 {
    position: absolute;
    top: 10px;
    left: 10px;
}

.coupSlideCont {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 15px;
}
.topSlideCont h2, .coupSlideCont h2 {
    font-size: 16px;
    color: #fff;
    font-weight: 600;
    margin-right: 10px;
    /*position: absolute;*/
    /*bottom: 10%;*/
    /*left: 15px;*/
}
.viewCont ul li {
    color: #fff;
    font-size: 12px;
    margin-right: 10px;
}
    #swip .swiper-button-next:after, #swip .swiper-button-prev:after {
        color: var(--primary);
    }

</style>
@include('layout.index-banner')
<main>
    <section class="py-5 container">
        <div class="row g-5">
            <div class="border col p-4 rounded shadow-sm">
                <h2 class="blog-post-title mb-0 text-main">{{$blog->title}}</h2>
                <article class="blog-post">
                    <ul class="blog-entry-meta border-bottom mt-3 p-0 pb-3">
                        <li class="text-dark"><i class="far fa-calendar-alt"></i>{{\Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}}</li>
                        <li><i class="fas fa-tags"></i><a class="text-dark" href="#">{{$blog->category->name}}</a></li>
                        <li><i class="fas fa-phone-alt"></i><a class="text-dark" href="#">{{$blog->phone}}</a></li>
                    </ul>
                </article>
                <div class="img-div">
                    @if(count($blog->images) > 0)
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            @foreach($blog->images as $key => $img)
                            <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                                <img src="{{asset($img->url)}}" class="border img-fluid rounded shadow-sm w-100" style="height: 500px;object-fit: cover;">
                            </div>
                            @endforeach

                        </div>
                        <button class="carousel-control-prev border-0 opacity-1 rounded" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="height: 60px; width: 30px; background: #F57614; top: 45%; left: 20px; ">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="border-0 carousel-control-next opacity-1 rounded" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="height: 60px; width: 30px; background: #F57614; top: 45%; right: 20px; ">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    @else
                    <img src="{{asset('images/blog-1.jpg')}}" alt="{{$blog->title}}" class="border img-fluid rounded shadow-sm w-100" style="height: 500px;object-fit: cover;">
                    @endif
                </div>
                <div class="mt-3">
                    {!! $blog->description !!}
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mb-5">
            <div class="text-center mb-5">
                <h2 class="genHead"> Related Blogs</h2>
            </div>
            <div class="row g-5">
                <div class="border col p-4 rounded shadow-sm">
                    <div class="swiper" id="swip">
                        <div class="swiper-wrapper">
                            @foreach(@$resentBlogs as $rBlog)
                            <div class="swiper-slide">
                            <a href="{{route('blogs.show', $rBlog->slug)}}">
                                <div class="topSlideBx">
                                    <img src="{{asset($rBlog->image)}}" class="img-fluid" class="img-fluid">
                                    <div class="topSlideCont">
                                        <h6 class=""><a class="text-white" href="{{url('classified')}}?category={{@$rBlog->category->slug}}">{{@$rBlog->category->name}}</a></h6>
                                        <div>
                                            <h2 class="mb-2">{{@$rBlog->title}}</h2>
                                            <div class="viewCont">
                                                <ul class="list-inline">
                                                    <li class="list-inline">
                                                        <span class="mr-2"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                        {{\Carbon\Carbon::parse(@$rBlog->created_at)->format('D M Y')}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev ml-4"></div>
                        <div class="swiper-button-next mr-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partials.how-to-works')
</main>

@endsection
@push('js')
<script>
  var swiper = new Swiper("#swip", {
    slidesPerView: 4,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {

        320: {
          slidesPerView: 1,
        },
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1280: {
            slidesPerView: 4,
        },
      },

  });
  </script>
@endpush