<header>  
    <nav id="HeaderID">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-8 text-start">
                    <div class="main-logo">
                        <a href="{{route('index')}}">
                            <img src="{{asset('images/logo.png')}}" alt="ourinfoget">
                            <span>LEMN<i style="font-style: normal;color: var(--secondary);">IS</i>CATEZ</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-4 my-auto">
                    <ul class="top-sec-menu text-md-end mb-0">
                        <li><a href="{{route('index')}}" class="active">Home</a></li>
                        <li>
                            <a href="{{route('index')}}/#aboutID">About </a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/#howItWork">How it works?</a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/terms-and-conditions">Terms & condition</a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/pricing">Price</a>
                        </li>
                       
                        <li>
                            <a href="{{route('blogs')}}">Classified</a>
                        </li>
                       
{{--                        <li>
                            <a href="{{route('find_invoice')}}">Find your Invoice</a>
                        </li>
                        <li>--}}
{{--                            <a href="{{route('index')}}/#howitworks">Disclaimer</a>--}}
{{--                        </li>--}}
                    </ul>
                    @auth
                        <div class="main_nav text-end">
                            <ul class="mt-2 me-2">
                                <li class="prepaid-reports-left">
                                    <div class="d-flex align-items-center">
                                        <p>Prepaid reports left</p>
                                        <span>{{auth()->user()->credits}}</span>
                                        <a href="{{route('price')}}" class="booknow getmorereports">Get More</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{route('user.dashboard')}}" class="booknow">My Account</a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    <div class="mob_nav text-end mb-0">
                        <button id="mob_nav_button">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                </div>
            </div>
            <div class="row mob_navigation">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <a href="{{route('index')}}" class="active">Home</a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/#aboutID">About </a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/#howItWork">How it works?</a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/terms-and-conditions">Terms & condition</a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/pricing">Price</a>
                        </li>
                        <li>
                            <a href="{{route('index')}}/sample-report" target="_blank">Sample Report</a>
                        </li>
                        <li>
                            <a href="{{route('blogs')}}">Disclaimer</a>
                        </li>
                        @guest
                        <li>
                            <a href="{{route('user.login')}}" class="booknow">LOG IN</a>
                        </li>
                        @endguest
                        @auth
                        <li class="prepaid-reports-left">
                            <div class="d-flex align-items-center ms-3 my-2">
                                <p>Prepaid reports left</p>
                                <span>{{auth()->user()->credits}}</span>
                            </div>
                            <a href="{{route('price')}}" class="booknow getmorereports mx-2">Get More</a>
                        </li>
                        <li>
                            <a href="{{route('user.dashboard')}}" class="booknow">My Account</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="headerH"></div>
</header>