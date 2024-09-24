@extends('layout.master')
@push('css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endpush

@section('content')
{{--<section> --}}
    @include('layout.index-banner')
    <section id="aboutID" class="py-5">
        <div class="container">
            <div class="text-center">
                <h2 class="genHead">Always check the history of a car before buying it!</h2>
                <p class="genPara pt-5">An {{ config('app.name') }} Vehicle History Report will reveal:</p>
            </div>
            <div class="row mt-5">
                <!-- Column #1 -->
                <div class="col-lg-4 com-md-6 col-12 mb-5">
                    <div class="carHistoryBx h-100">
                        <h6 class="number">1</h6>
                        <div class="icon">
                            <img class="img-fluid" src="{{asset('images/c-ico1.svg')}}" alt="My Elite Global">
                        </div>
                        <h2>Odometer Readings</h2>
                        <p>
                            Past odometer readings - has the odometer ever been rolled back?
                        </p>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#odometerReadings">Read More</button>
                    </div>
                </div>
                <!-- Column #2 -->
                <div class="col-lg-4 com-md-6 col-12 mb-5">
                    <div class="carHistoryBx h-100">
                        <h6 class="number">2</h6>
                        <div class="icon">
                            <img class="img-fluid" src="{{asset('images/c-ico2.svg')}}" alt="My Elite Global">
                        </div>
                        <h2>Theft vehicle check</h2>
                        <p>
                            Theft vehicle check - has the car been registered as a stolen vehicle?
                        </p>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#theftVehicleCheck">Read More</button>
                    </div>
                </div>
                <!-- Column #3 -->
                <div class="col-lg-4 com-md-6 col-12 mb-5">
                    <div class="carHistoryBx h-100">
                        <h6 class="number">3</h6>
                        <div class="icon">
                            <img class="img-fluid" src="{{asset('images/c-ico3.svg')}}" alt="My Elite Global">
                        </div>
                        <h2>Hidden Damages</h2>
                        <p>
                            Hidden Damages - does this car have any undisclosed or hidden damages?
                        </p>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#hiddenDamages">Read More</button>
                    </div>
                </div>
                <!-- Column #4 -->
                <div class="col-lg-4 com-md-6 col-12 mb-5">
                    <div class="carHistoryBx h-100">
                        <h6 class="number">4</h6>
                        <div class="icon">
                            <img class="img-fluid" src="{{asset('images/c-ico4.svg')}}" alt="My Elite Global">
                        </div>
                        <h2>Technical data</h2>
                        <p>
                            Technical data - what are the vehicles specifications and technical Data?
                        </p>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#technicalData">Read More</button>
                    </div>
                </div>
                <!-- Column #5 -->
                <div class="col-lg-4 com-md-6 col-12 mb-5">
                    <div class="carHistoryBx h-100">
                        <h6 class="number">5</h6>
                        <div class="icon">
                            <img class="img-fluid" src="{{asset('images/c-ico5.svg')}}" alt="My Elite Global">
                        </div>
                        <h2>Used Car</h2>
                        <p>
                            How was the car previously used? Was it a prior taxi or rental car?
                        </p>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#usedCar">Read More</button>
                    </div>
                </div>
                <!-- Column #6 -->
                <div class="col-lg-4 com-md-6 col-12 mb-5">
                    <div class="carHistoryBx h-100">
                        <h6 class="number">6</h6>
                        <div class="icon">
                            <img class="img-fluid" src="{{asset('images/c-ico6.svg')}}" alt="My Elite Global">
                        </div>
                        <h2>previous sales</h2>
                        <p>
                            Photos of previous sales - has this vehicle previously been listed for sale?
                        </p>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#previousSales">Read More</button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="odometerReadings" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Previous Sales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="img-report img-fluid" src="{{asset('images/slides/rep-1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="theftVehicleCheck" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Previous Sales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="img-report img-fluid" src="{{asset('images/slides/rep-2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="hiddenDamages" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Previous Sales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="img-report img-fluid" src="{{asset('images/slides/rep-3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="technicalData" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Previous Sales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="img-report img-fluid" src="{{asset('images/slides/rep-4.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="usedCar" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Previous Sales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="img-report img-fluid" src="{{asset('images/slides/rep-5.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="previousSales" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Previous Sales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="img-report img-fluid" src="{{asset('images/slides/rep-6.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--CARFAX TABLE SECTION-->
    <section id="carFaxID" class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="genHead">{{ config('app.name') }} vs CarFax & Others</h2>
            <p class="text-uppercase fw-bold pt-5">
                Do Not Overpay <br> Choose {{ config('app.name') }} The Service you can easily rely on!
            </p>
            <div class="col-lg-7 col-md-10 col-12 mx-auto">
                <p class="genPara pt-3">
                    We have seen it and asnwering to it, Feel like you're being ripped off by Carfax?
                    It's an open secret that their vehicle history reports are costly and contain only
                    basic information
                </p>
            </div>
        </div>
        <div class="carFaxtable mt-5" >
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Report Contents</th>
                    <th scope="col">{{ config('app.name') }}</th>
                    <th scope="col">CarFax</th>
                    <th scope="col">AutoCheck</th>
                    <th scope="col">InstaVin</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Free Photo</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Odometer Reading</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Accident Check</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Title Check</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Fraud & Crime Information</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Market Price Analysis</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Instant Report: Get your report instantly! No waiting arround</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Accurate Data using government and third part databases</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Saving: The competition charges</th>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z" fill="rgba(247,119,22,1)"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="#191F23"></path></svg>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--CUSTOMER REVIEW SECTION-->
    <section id="customerSay">
        <div class="container">
            <div class="text-center">
                <h2 class="genHeadW mb-5">What Customers Say about {{ config('app.name') }}</h2>
            </div>
            <div class="">
                <div class="swiper" id="customerSlider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="customerBx text-center">
                                <div class="avatar">
                                    <img class="mx-auto" src="{{asset('images/cust-1.jpg')}}" alt="Customer №1">
                                    <div class="svgIocn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M4.58341 17.3211C3.55316 16.2275 3 15 3 13.0104C3 9.51092 5.45651 6.37372 9.03059 4.82324L9.92328 6.20085C6.58804 8.00545 5.93618 10.3461 5.67564 11.8221C6.21263 11.5444 6.91558 11.4467 7.60471 11.5106C9.40908 11.6778 10.8312 13.1591 10.8312 15C10.8312 16.933 9.26416 18.5 7.33116 18.5C6.2581 18.5 5.23196 18.0096 4.58341 17.3211ZM14.5834 17.3211C13.5532 16.2275 13 15 13 13.0104C13 9.51092 15.4565 6.37372 19.0306 4.82324L19.9233 6.20085C16.588 8.00545 15.9362 10.3461 15.6756 11.8221C16.2126 11.5444 16.9156 11.4467 17.6047 11.5106C19.4091 11.6778 20.8312 13.1591 20.8312 15C20.8312 16.933 19.2642 18.5 17.3312 18.5C16.2581 18.5 15.232 18.0096 14.5834 17.3211Z" fill="rgba(255,255,255,1)"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p>
                                    Thanks to {{ config('app.name') }}  I got valuable info that I needed about a car’s damages.
                                    to be specific there was an airbag deployment and a vehicle rollover. So I was lucky that I
                                    checked the report first before buying the car. Was the price worth it? absolutely! Thanks
                                    for your service {{ config('app.name') }}
                                </p>
                                <h3>May Forester</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="customerBx text-center">
                                <div class="avatar">
                                    <img class="mx-auto" src="{{asset('images/cust-2.jpg')}}" alt="Customer №1">
                                    <div class="svgIocn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M4.58341 17.3211C3.55316 16.2275 3 15 3 13.0104C3 9.51092 5.45651 6.37372 9.03059 4.82324L9.92328 6.20085C6.58804 8.00545 5.93618 10.3461 5.67564 11.8221C6.21263 11.5444 6.91558 11.4467 7.60471 11.5106C9.40908 11.6778 10.8312 13.1591 10.8312 15C10.8312 16.933 9.26416 18.5 7.33116 18.5C6.2581 18.5 5.23196 18.0096 4.58341 17.3211ZM14.5834 17.3211C13.5532 16.2275 13 15 13 13.0104C13 9.51092 15.4565 6.37372 19.0306 4.82324L19.9233 6.20085C16.588 8.00545 15.9362 10.3461 15.6756 11.8221C16.2126 11.5444 16.9156 11.4467 17.6047 11.5106C19.4091 11.6778 20.8312 13.1591 20.8312 15C20.8312 16.933 19.2642 18.5 17.3312 18.5C16.2581 18.5 15.232 18.0096 14.5834 17.3211Z" fill="rgba(255,255,255,1)"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p>
                                    Once I decided to buy a good looking Cadillac Escalade. I really appreciate that my
                                    colleague advised me to take your service guys. As it turns out that Cadillac is
                                    Salvage, Junk and even flood damaged car - that’s what I learned from your
                                    {{ config('app.name') }}  report. I was about to buy it, thankfully I checked
                                    the report first. I skipped a lot of trouble. I Appreciate what you do
                                </p>
                                <h3>Jason Creed</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="customerBx text-center">
                                <div class="avatar">
                                    <img class="mx-auto" src="{{asset('images/cust-3.jpg')}}" alt="Customer №1">
                                    <div class="svgIocn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M4.58341 17.3211C3.55316 16.2275 3 15 3 13.0104C3 9.51092 5.45651 6.37372 9.03059 4.82324L9.92328 6.20085C6.58804 8.00545 5.93618 10.3461 5.67564 11.8221C6.21263 11.5444 6.91558 11.4467 7.60471 11.5106C9.40908 11.6778 10.8312 13.1591 10.8312 15C10.8312 16.933 9.26416 18.5 7.33116 18.5C6.2581 18.5 5.23196 18.0096 4.58341 17.3211ZM14.5834 17.3211C13.5532 16.2275 13 15 13 13.0104C13 9.51092 15.4565 6.37372 19.0306 4.82324L19.9233 6.20085C16.588 8.00545 15.9362 10.3461 15.6756 11.8221C16.2126 11.5444 16.9156 11.4467 17.6047 11.5106C19.4091 11.6778 20.8312 13.1591 20.8312 15C20.8312 16.933 19.2642 18.5 17.3312 18.5C16.2581 18.5 15.232 18.0096 14.5834 17.3211Z" fill="rgba(255,255,255,1)"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p>
                                    Very simple service with great information. I registered, paid, and got my report
                                    in just a few minutes. Everything is clear and simple. Got a rollback for the car
                                    I searched. And that wasn’t the only problem that was reported by
                                    {{ config('app.name') }} . For more than a reasonable price I got the complete
                                    history of the car. Great service
                                </p>
                                <h3>Emily Johnson</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
<!--PRICING REVIEW SECTION-->
    <section>
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
                            <h2><span>$</span>30.00</h2>
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
                            <h2><span>$</span>65.95</h2>
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
                                            and condition History taking into account over 60 checks in each VIN.
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
    </section>
<!--HOW IT WORK SECTION-->
    @include('partials.how-to-works')
<!--CONTACT US SECTION-->
<section class="" id="contactHome">
    <img class="paperPlane" src="{{asset('images/paper_airplane_black.png')}}" alt="Paper Plane">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="lineStart text-md-start text-center mb-md-0 mb-4">
                    <h2 class="genHead">Lost your order?</h2>
                </div>
            </div>
            <div class="col-md-6 col-12 text-md-end text-center my-auto">
                <a href="{{route('contact-us')}}">
                    <div class="contBtn">Contact Us Now</div>
                </a>
            </div>
        </div>
    </div>
</section>
<!--FAQ SECTION-->
    <section class="py-5" id="fqas">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="genHead">Frequently Asked Questions</h2>
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <p class="genPara pt-4 mt-2">
                    
                    </p>
                </div>
            </div>
            <div class="faqsBx">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Whatis {{ config('app.name') }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="heading_1" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="mb-2">
                                    Everyday <span class="fw-600">{{ config('app.name') }}</span> provides millions of customers just like you with
                                    complete and truthful vehicle history reports. We are helping consumers get
                                    up-to-date information about used vehicles and help them feel confident in
                                    their potential purchases. With our reports, we provide the following
                                    information: odometer readings, previous owners, damages, accidents, recalls,
                                    photos, title information, and more. See the Prices and Packages.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                For whom do we provide Vehicle History Reports?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <span class="fw-600">{{ config('app.name') }}</span> reports are available for anyone interested in the history of a
                                used vehicle. You can use the <span class="fw-600">{{ config('app.name') }}</span> eport when you decide to buy
                                a used vehicle and want to know its history as well as information about
                                any hidden issues. <span class="fw-600">{{ config('app.name') }}</span> "ePorts are also invaluable to those who wish
                                to sell their car to a private party and need to show that their car is
                                worth its price. It's obvious that buyers normally feel more confident
                                when they are aware of the history of a vehicle they want to purchase.
                                See What Customers Say about <span class="fw-600">{{ config('app.name') }}</span>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do Car Report Lab reports have information on every vehicle?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Car Report Lab boasts a massive amount of data and has records on a vast
                                selection of more than 350 million VIN records, which covers the majority of
                                the used vehicles in the US & Canada. Car report Lab provides reports for
                                vehicles manufactured after 1981 and offers information about cars and
                                light trucks. Car Report Lab drastically reduces your chances of buying
                                a car with hidden or unknown issues.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                What is VIN?
                            </button>
                        </h2>
                        <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The VIN — Vehicle Identification Number is a unique 17-character number
                                used to identify a vehicle, also known as VIN number. The VIN has 17
                                digits that are not random but instead outline specific information
                                like make, model, year, country of origin, and more. At <span class="fw-600">{{ config('app.name') }}</span>
                                you can use the VIN number to get your vehicle history report. Check the VIN
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                Where else can you find your VIN?
                            </button>
                        </h2>
                        <div id="collapse_5" class="accordion-collapse collapse" aria-labelledby="heading_5" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                If you are unable to find the VIN, try contacting the seller of the vehicle.
                                The seller can find the VIN on the vehicle or in the paperwork as outlined
                                in the steps above. A VIN can often be found on the driver-side door, near
                                where the door latches as well as on the lower-left-hand corner of the
                                dashboard, in front of the steering wheel. If you own the car, you can find
                                it on the title, registration card, or insurance documents.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<!--BLOG SECTION-->
    <section class="py-5" id="blogs">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="genHead">Recent Blog</h2>
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <p class="genPara pt-4 mt-2">
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <!-- column #1 -->
                <div class="col-md-4 col-12">
                    <div class="blogbx">
                        <div class="blog-box-layout2 mb-4 h-100">
                            <div class="item-img">
                                <a href="https://myeliteglobal.com/classified/how-to-look-for-the-best-sales-in-usa" title="How to look for the best sales in USA">
                                    <img src="{{asset('images/blog-1.jpg')}}" class="img-fluid" alt="How to look for the best sales in USA">
                                </a>
                            </div>
                            <div class="item-content">
                                <ul class="blog-entry-meta pb-3">
                                    <li class="text-dark">
                                        <i class="far fa-calendar-alt"></i>Sep 07, 2023
                                    </li>
                                    <li>
                                        <i class="fas fa-user"></i> By <span class="name"><a href="#"> Stacy Poe</a></span>
                                    </li>
                                </ul>
                                <h3 class="item-title">
                                    <a href="#" title="How to look for the best sales in USA">
                                        How to look for the best sales in USA
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column #2 -->
                <div class="col-md-4 col-12">
                    <div class="blogbx">
                        <div class="blog-box-layout2 mb-4 h-100">
                            <div class="item-img">
                                <a href="https://myeliteglobal.com/classified/how-to-look-for-the-best-sales-in-usa" title="How to look for the best sales in USA">
                                    <img src="{{asset('images/blog-2.jpg')}}" class="img-fluid" alt="How to look for the best sales in USA">
                                </a>
                            </div>
                            <div class="item-content">
                                <ul class="blog-entry-meta pb-3">
                                    <li class="text-dark">
                                        <i class="far fa-calendar-alt"></i>Sep 07, 2023
                                    </li>
                                    <li>
                                        <i class="fas fa-user"></i> By <span class="name"><a href="#"> Stacy Poe</a></span>
                                    </li>
                                </ul>
                                <h3 class="item-title">
                                    <a href="#" title="How to look for the best sales in USA">
                                        How to look for the best sales in USA
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column #3 -->
                <div class="col-md-4 col-12">
                    <div class="blogbx">
                        <div class="blog-box-layout2 mb-4 h-100">
                            <div class="item-img">
                                <a href="https://myeliteglobal.com/classified/how-to-look-for-the-best-sales-in-usa" title="How to look for the best sales in USA">
                                    <img src="{{asset('images/blog-3.jpg')}}" class="img-fluid" alt="How to look for the best sales in USA">
                                </a>
                            </div>
                            <div class="item-content">
                                <ul class="blog-entry-meta pb-3">
                                    <li class="text-dark">
                                        <i class="far fa-calendar-alt"></i>Sep 07, 2023
                                    </li>
                                    <li>
                                        <i class="fas fa-user"></i> By <span class="name"><a href="#"> Stacy Poe</a></span>
                                    </li>
                                </ul>
                                <h3 class="item-title">
                                    <a href="#" title="How to look for the best sales in USA">
                                        How to look for the best sales in USA
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--VIN NUMBER SECTION-->
    <section class="newsletter">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="genHead text-white">Save Thousands of Dollars</h2>
                <div class="col-lg-7 col-md-10 col-12 mx-auto position-relative">
                    <p class="genPara pt-4 mt-2 text-white">
                        Check the history of the vehicle you want to buy beforehand
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-12 my-auto">
                    <div class="title">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="70" height="70"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z" fill="rgba(255,255,255,1)"></path></svg>
                        <h3>
                            Remember to check your vehicle before you buy
                        </h3>
                    </div>
                </div>
                <div class="col-md-7 col-12 my-auto">
                    <div class="newsBox">
                        <form action="{{route('checkout')}}" method="POST">
                        @csrf
                        <!-- <h5 class="mb-2">Remember to check your vehicle before you buy</h5>-->
                            <div class="inputBx">
                                <input type="text" placeholder="Enter VIN Number" name="vin" required>
                                <button>Check VIN</button>
                            </div>
                        </form>
                        @if (\Session::has('error'))
                            <div class="alert alert-danger alert-link find-vin pb-0">
                                <p class="text-danger">{!! \Session::get('error') !!}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--BRAND SECTION-->
    <section class="py-5" id="brands">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 mx-auto">
                    <div class="swiper" id="brandSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{asset('images/logo-safe.png')}}" alt="Black safe checkout logo">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{asset('images/logo-niada.png')}}" alt="Black NIADA logo">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{asset('images/logo-bc.png')}}" alt="Blockchain logo">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{asset('images/logo-safe.png')}}" alt="Black safe checkout logo">
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->




{{--</section> --}}
@endsection

@push('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
	$(document).ready(function(){
		/*
		var homePriceModal = document.getElementById('homePriceModal');
		homePriceModal.addEventListener('show.bs.modal', function(event){
			var button = event.relatedTarget;
			
			var packageName = button.getAttribute('data-package');
			var packageDetails = button.getAttribute('data-package-details');
			
			console.log(packageName);
			console.log(packageDetails);
			
			var modalTitle = homePriceModal.querySelector('#homePriceModalTitle');
			var modalTitleDetails = homePriceModal.querySelector('#homePriceModalDetails');
			modalTitle.textContent = packageName;
			modalTitleDetails.textContent = packageDetails;
			
			$("#modal_package_name").val(packageName);
			
			
		});*/
    $('#check-slider').slick({
        infinite: true,
        autoplay: true,
        speed: 350,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        focusOnSelect: true,
        autoplaySpeed: 4500,
        responsive: [
            {
                breakpoint: 520,
                settings: 
				{
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 991,
                     settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 5000,
                  settings: 'unslick',
            },
        ],
        asNavFor: '#rep-slider',
    });

    $("#rep-slider").slick({
      infinite: true,
                autoplay: true,
                speed: 350,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                asNavFor: '#check-slider',
                autoplaySpeed: 4500,
    });
    var timer;
            $('#rep-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                $('.checks').removeClass('active');
                $('.checks').eq(nextSlide).addClass('active');
            });

            $('#rep-slider').on('afterChange', function () {
               if(window.bLazy){
                   window.bLazy.revalidate();
               }
            });

            $(document).on('click', '.checks', function () {
                if ($(window).width() > 991) {
                    const idx = $(this).data('idx');
                    $('#rep-slider').slick('slickGoTo', idx);
                }
                clearTimeout(timer);
                $('#rep-slider').slick('slickPause');
                timer = setTimeout(function () {
                    $('#rep-slider').slick('slickPlay');
                }, 4000);
            });

            $('#check-slider').on('beforeChange', function () {
                if ($(window).width() < 992) {
                    $('.checks').removeClass('active');
                }
            });
             $('#customer-slider').slick({
                infinite: true,
                autoplay: true,
                speed: 350,
                arrows: false,
                dots: false,
                responsive: [
                    {
                        breakpoint: 9999,
                        settings: "unslick"
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    }
                ]
            });
	});
</script>
@endpush