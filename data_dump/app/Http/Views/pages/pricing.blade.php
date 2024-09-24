@extends('layout.master')

@section('content')
    <div class="priceMainBx">
        <div class="pageBanner">
            <h1 style="text-align: center">Pricing</h1>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="/">Home</a>
                </li>
                <li class="list-inline-item">
                    /
                </li>
                <li class="list-inline-item active">
                    Priceing
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="text-center my-5">
                <h2 class="genHead">Plans & Pricing</h2>
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <p class="genPara pt-4 mt-2">
                        Tailored plans and pricing suits your needs
                    </p>
                </div>
            </div>
            <div class="priceTableBx pb-5">
                <div class="row">
                    <!-- Column #1 -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="priceBx">
                            <div class="list_1">
                                <h3 class="mb-1">Basic</h3>
                                <h4>1 Vehicle Report</h4>
                            </div>
                            <h2><span>$</span>40.00</h2>
                            <div class="list_2">
                                <ul class="list-inline px-3">
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Vehicle Specification</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>DMV Title History</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Safety Recall Status</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Online Listing History</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Junk & Salvage Information</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Accident Information</span>
                                        </div>
                                    </li>
                                </ul>
                                <button class="priceBtn" data-bs-toggle="modal" data-bs-target="#basicPrice">
                                    Purchase Plan
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Column #2 -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="priceBx">
                            <div class="list_1">
                                <h3 class="mb-1">Silver</h3>
                                <h4>2 Vehicle Report</h4>
                            </div>
                            <h2><span>$</span>60.00</h2>
                            <div class="list_2">
                                <ul class="list-inline px-3">
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Vehicle Specification</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>DMV Title History</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Safety Recall Status</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Online Listing History</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Junk & Salvage Information</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Accident Information</span>
                                        </div>
                                    </li>
                                </ul>
                                <button class="priceBtn" data-bs-toggle="modal" data-bs-target="#basicPrice">
                                    Purchase Plan
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Column #3 -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="priceBx">
                            <div class="list_1">
                                <h3 class="mb-1">Gold</h3>
                                <h4>5 Vehicle Report</h4>
                            </div>
                            <h2><span>$</span>120.00</h2>
                            <div class="list_2">
                                <ul class="list-inline px-3">
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Vehicle Specification</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>DMV Title History</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Safety Recall Status</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Online Listing History</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Junk & Salvage Information</span>
                                        </div>
                                    </li>
                                    <li class="list-inline mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check me-3"></i>
                                            <span>Accident Information</span>
                                        </div>
                                    </li>
                                </ul>
                                <button class="priceBtn" data-bs-toggle="modal" data-bs-target="#basicPrice">
                                    Purchase Plan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRICE MODAL -->
            <div class="modal fade" id="basicPrice" data-bs-keyboard="false" tabindex="-1" aria-labelledby="basicPriceLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="topBaannerNew popModal">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--HOW IT WORK SECTION-->
        @include('partials.how-to-works')
    </div>
@endsection