@extends('layout.master')

@section('content')
<div class="pageBanner">
    <h1 style="text-align: center">Contact Us</h1>
    <ul class="list-inline">
        <li class="list-inline-item">
            <a href="/">Home</a>
        </li>
        <li class="list-inline-item">
            /
        </li>
        <li class="list-inline-item active">
            Contact Us
        </li>
    </ul>
</div>
<div class="">
    <div class="container py-5">
        <div class="row">
            {{-- <div class="col-md-12">
                <div class="sma_heading sma_heading_top text-center mb-4">
                    <h3 class="text-center"></h3>
                    <h1></h1>
                </div>
                
            </div> --}}
            <div class="col-lg-4">
                <div class="contactus_info_box">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-sign text-center me-2"></i>
                        <div class="ms-3 contactCont">
                            <h3>Office</h3>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contactus_info_box">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-phone text-center me-2"></i>
                        <div class="ms-3 contactCont">
                            <h3></h3>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contactus_info_box">
                    <div class="d-flex align-items-center">
                        <i class="far fa-envelope text-center me-2"></i>
                        <div class="ms-3 contactCont">
                            <h3>Email</h3>
                            <p class="mb-0"> sale@autoauditzem.ca</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mapBack py-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="location_map ratio ratio-1x1" id="map"></div>
                </div>
                <div class="col-lg-6 contactus_Bx">
                    <div class="contactus_form">
                        <div class="sma_heading sma_heading_top text-center mb-4 mt-3">
                            <h3 class="text-center">{{ config('app.name') }}</h3>
                            <h1>Contact Us</h1>
                        </div>
                        <div class="form">
                            <div class="mb-4">
                                <label for="name" class="mb-1">Your Full Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="mb-1">Your Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="mb-1">Your Message</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <button class="">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="" id="contactHome">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="lineStart text-lg-start text-center mb-lg-0 mb-4">
                    <h2 class="genHead"></h2>
                </div>
            </div>
            <div class="col-lg-6 col-12 text-lg-end text-center my-auto">
                <div class="contCall">
                    <h3 class="mb-2">Call Us For Booking</h3>
                    <a href="tel:"> </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@push('js')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
    src=""
    defer
    ></script>
    <script>
        let map;

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 51.3992435, lng: -0.1972004 },
                zoom: 17,
            });
            const image = "{{asset('images/logo.png')}}";
            const beachMarker = new google.maps.Marker({
            position: { lat: 51.3992435, lng: -0.1972004 },
            map,
            icon: image,
            });

        }

    </script>
@endpush