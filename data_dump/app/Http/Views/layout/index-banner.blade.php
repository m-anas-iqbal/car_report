<section id="topBanner">
    <div class="topBaannerNew py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 my-auto">
                    <div class="">
                        <div class="title">
                            <h3 class="mb-2">
                                Vehicle Research Made Easy
                            </h3>
                            <h4 class="mb-4">
                                Enter a VIN Below to get started
                            </h4>
                        </div>
                        <div class="newsBox">
                            <form action="{{route('checkout')}}" method="POST">
                                @csrf
                                <!-- <h5 class="mb-2">Remember to check your vehicle before you buy</h5>-->
                                <div class="inputBx">
                                    <input type="text" placeholder="Enter VIN Number" name="vin" required>
                                    <button>Get A Report</button>
                                </div>
                            </form>
                            @if (\Session::has('error'))
                                <div class="alert alert-danger alert-link find-vin pb-0">
                                    <p class="text-danger">{!! \Session::get('error') !!}</p>
                                </div>
                            @endif
                            <div class="find-vin mt-2 d-flex align-items-center">
                                <a href="#" class="lnk">How to find the VIN?</a>
                                <span>
                                    <i class="px-3">-</i>
                                </span>
{{--                                <h3 class=" mb-0">No VIN yet?</h3>--}}
                            </div>
                            <div class="mt-4">
                                <p>
                                    Take the guesswork out of your decision with trusted data sources. Is this vehicle
                                    safe to drive? What is my vehicle worth? Find out instantly with Auto Record Verifier
                                    Reports.
                                </p>
                                <p>
                                    Our proprietary technology estimates your vehicle value based on service, mileage
                                    and condition istory taking into account over 60 checks in each VIN.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 my-auto">
                    <div class="bnr_img ps-3" data-swiper-parallax="-400">
                        <img src="{{asset('images/rv-truck_3.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
