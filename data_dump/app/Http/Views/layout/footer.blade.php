<footer>
    <section class="tj-footer" style="background-color:#333; padding-top: 10px;">
        <div class="container">
            <div class="row" >
                <div class="col-lg-4 col-12 mb-lg-0 mb-4">
                    <div class="about-widget widget">
                        <div class="main-logo py-0 mb-3">
                            <a href="{{route('index')}}">
                                <img src="{{asset('images/logo-footer.png')}}" alt="vehelitelab">
                                <span>LEMN<i style="font-style: normal;color: #FFFFFF;">IS</i>CATEZ</span>
                            </a>
                        </div>
                        <p class="text-white">
                            
                        </p>
                    </div>
                    <div>
                        {{-- <img src="{{asset('images/visamaster.png')}}" alt="">--}}
                    </div>
                </div>
                <div class="col-lg-2 col-12 mb-lg-0 mb-4">
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-4">
                    <div class="contact-info widget">
                        <h2 class="text-white mb-3">OUR SERVICES</h2>
                        <ul class="list-inline footerService">
                            <li class="text-white list-inline pb-2 mb-2">
                                <a href="https://{{ config('app.name') }}.ca/terms-and-conditions" class="text-white">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right text-white me-2"></i>
                                        <span>Terms &amp; Conditions</span>
                                    </div>
                                </a>
                            </li>
                            <li class="text-white list-inline pb-2 mb-2">
                                <a href="https://{{ config('app.name') }}.ca/privacypolicy" class="text-white">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right text-white me-2"></i>
                                        <span>Privacy Policy</span>
                                    </div>
                                </a>
                            </li>
                            <li class="text-white list-inline pb-2 mb-2">
                                <a href="https://{{ config('app.name') }}.ca/delivery-policy" class="text-white">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right text-white me-2"></i>
                                        <span>Delivery Policy</span>
                                    </div>
                                </a>
                            </li>
                           
                            <li class="text-white list-inline pb-2 mb-2">
                                <a href="{{route('index')}}/pricing" class="text-white">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right text-white me-2"></i>
                                        <span>Price</span>
                                    </div>
                                </a>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-4">
                    <div class="contact-info widget">
                        <h2 class="text-white mb-3">CONTACT US</h2>
                        <ul class="list-inline footerService">
                            
                            <li class="text-white list-inline pb-3 mb-3">
                                <a href="mailto:sale@lemniscatez.com" class="text-white">
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-envelope-open me-2"></i>
                                        <span>sale@lemniscatez.com</span>
                                    </div>
                                </a>
                                
                            </li>

                            <li class="text-white list-inline pb-3 mb-3">
                                <a href="#" class="text-white">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-phone-alt me-2 pt-1"></i>
                                        <span>Address: 2200 Fletcher Ave #502, Fort Lee, NJ 07024</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyRight">
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-6 col-12">
                        <p class="text-white text-md-start text-center text-3 mb-0">
                            {{ config('app.name') }} © 2024. All Rights Reserved.
                        </p>
                    </div>
{{--                    <div class="col-md-6 col-12">--}}
{{--                        <p class="text-white text-md-end text-center text-3 mb-0">--}}
{{--                            Design and Developer By <span class="">{{ config('app.name') }}</span>--}}
{{--                        </p>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </section>
</footer>