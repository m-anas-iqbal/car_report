
@dd("report_this")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <title>{{ config('app.name') }}</title>
    <style>
        body {
            max-width: 1024px;
            margin: auto;
            font-family: 'Arial', sans-serif;
            line-height: 1;
        }

        table {
            width: 100%;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li {}

        .page-break {
            page-break-after: always;
        }

        #va_graph {
            width: 100%;
            max-width: 700px;
            margin: 20px auto;
        }

        .headBx {
            display: flex;
            justify-content: center;
            column-gap: 16px;
            box-sizing: border-box;
            align-items: center;
        }

        .headBx h3 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .headBx button,
        .headBx input {
            border: 1px solid #000;
            padding: 0 20px;
            height: 45px;
            font-size: 16px;
        }

        .headBx button {
            font-weight: bold;
            text-transform: uppercase;
        }

        .va_body h2 {
            text-align: center;
            margin: 10px 6px 20px 6px;
            font-size: 28px;
        }

        .va_bodyBx {
            height: 240px;
            width: 100%;
        }

        .va_body {
            /* height: 360px; */
            padding: 20px;
            border: 1px solid #eaeaea;
            box-shadow: 9px 10px 7px -3px rgba(0, 0, 0, 0.1);
            margin-top: 31px;

        }

        .va_bodyBx {
            position: relative;
            padding-top: 70px;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <table>
                <tr style="text-align:left;">
                    <td> <span style="float: left; font-size: 26px; font-weight:900;position: relative;top:10px;color: #073f64;font-family: Nunito;">Your Vehicle History Report</span> </td>
                    <td style="text-align: right;"><img src="{{asset('images/nmvtis-logo.jpg')}}" alt="" width="120"> </td>
                </tr>
            </table>
        </div>
        <h2 style="background: #0da5e9;padding: 15px;color:white;">Vehicle History Report for <span style="color:black;">VIN# {{$vindata['VIN']}}</span></h2>
        <div>


        </div>

        <table>
            <tr>
                <td style="width: 220px;border: 1px solid #ddd;margin-right: 30px;border:5px solid #0da5e9;">
                    @php
                    $img = array_key_exists($vindata['BodyClass'], $rimages) ? "BodyClassImages/".$rimages[$vindata['BodyClass']].".png" : "images/report_car_placeholder.png";
                    @endphp
                    <img src="{{asset($img)}}" alt="" style="width: 220px">
                </td>
                <td style="vertical-align: top;">
                    <ul class="report_info">
                        <!-- <li style="color: black;font-size: 22px;font-weight: 700;">{{strip_tags($vehicle)}}</li> -->
                        <li style="color: #073f64;font-size: 22px;font-weight: 700;">{{str_ireplace('incomplete', '', $vehicle)}}</li>
                        <li style="border-bottom:1px solid #ccc;padding:10px;"><span style="color:#073f64;font-weight:bolder;">Report ID:</span> <span>{{$report_id}}</span></li>
                        <li style="border-bottom:1px solid #ccc;padding:10px;"><span style="color:#073f64;font-weight:bolder;">Date Generated:</span> <span>{{date('d-m-Y')}}</span></li>
                        <li style="border-bottom:1px solid #ccc;padding:10px;"><span style="color:#073f64;font-weight:bolder;">Style:</span> <span>{{str_ireplace('incomplete', '', $vindata['BodyClass'])}}</span></li>
                        <li style="border-bottom:1px solid #ccc;padding:10px;"><span style="color:#073f64;font-weight:bolder;">Made In:</span> <span>{{$vindata['PlantCity']}} {{$vindata['PlantCountry']}}</span></li>
                        <li style="border-bottom:1px solid #ccc;padding:10px;"><span style="color:#073f64;font-weight:bolder;">Make / Model:</span> <span>{{$vindata['Make'] }} / {{$vindata['Model']}}</span></li>
                    </ul>
                </td>
            </tr>
        </table>


        <div class="report_details_new">
            <table style="width:100%; margin-top: 20px;">
                <tr>
                    <td style="text-align: center; height: 190px; background: #F5F5F5; border: 2px solid white; position:relative;width:25%;">
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0; left:10px;">
                        <img src="{{asset('images/report_icons/junk-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
                            <span style="font-size: 12px;margin-top:50px;">Junk Salvage Information</span><br>
                            <span style="font-size: 12px;">0 record(s) found</span>
                        </div>
                    </td>
                    <td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white; position:relative;width:25%;">
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
                        <img src="{{asset('images/report_icons/insurance-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
                            <span style="font-size: 12px;margin-top:50px;">Insurance Information</span><br>
                            <span style="font-size: 12px;">0 record(s) found</span>
                        </div>
                    </td>
                    <td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
                        <img src="{{asset('images/report_icons/title_history-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
                            <span style="font-size: 12px;margin-top:50px;">Title History</span><br>
                            <span style="font-size: 12px;">0 record(s) found</span>
                        </div>
                    </td>
                    <td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
                        <img src="{{asset('images/report_icons/odometer-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
                            <span style="font-size: 12px;">Odometer events</span><br>
                            <span style="font-size: 12px;">0 record(s) found</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
                        <img src="{{asset('images/report_icons/title_brands-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
                            <span style="font-size: 12px;">Title Brands</span><br>
                            <span style="font-size: 12px;">0 record(s) found</span>
                        </div>
                    </td>
                    <td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">

                        <img src="{{asset('images/report_icons/owners-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">

                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">

                            <span style="font-size: 12px;">Ownership History</span><br>
                            {{-- @if(isset($ownerdata))
							<span style="font-size: 12px;">{{$ownerdata['Count']}} record(s) found</span>
                            @else --}}
                            <span style="font-size: 12px;">0 record(s) found</span>
                            {{-- @endif --}}
                        </div>
                    </td>
                    <td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
                        <img src="{{asset('images/report_icons/lient-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">

                            <span style="font-size: 12px;">Lien Records</span><br>
                            <span style="font-size: 12px;">0 record(s) found</span>
                        </div>
                    </td>
                    <td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
                        @if(isset($recalldata))
                        <img src="{{asset('images/exclamation-mark.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
                        @else
                        <img src="{{asset('images/tick-green.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
                        @endif
                        <img src="{{asset('images/report_icons/recalls-blue.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
                        <div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">

                            <span>Recalls</span><br>
                            @if(isset($recalldata))
                            <span style="font-size: 12px;">{{$recalldata['Count']}} record(s) found</span>
                            @else
                            <span style="font-size: 12px;">0 record(s) found</span>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Vehicle Specifications</h2>
            <style>
                #table_1 {
                    border-collapse: collapse;
                }

                #table_1 tr td {
                    border-bottom: 1px solid #ccc;
                    padding: 20px;
                }

                #table_1 tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

            </style>
            <table id="table_1">
                <tr>
                    <td style="width:25%;">VIN:</td>
                    <td style="width:25%;"><strong>{{$vindata['VIN']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Year:</td>
                    <td style="width:25%;">{{$vindata['ModelYear']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Make:</td>
                    <td style="width:25%;"><strong>{{$vindata['Make']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Model:</td>
                    <td style="width:25%;">{{$vindata['Model']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Trim:</td>
                    <td style="width:25%;"><strong>{{$vindata['Trim']}} </strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Engine:</td>
                    <td style="width:25%;"><strong>{{$engine}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">GVWR:</td>
                    <td style="width:25%;">{{$vindata['GVWR']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Style:</td>
                    <td style="width:25%;">{{str_ireplace('incomplete', '', $vindata['BodyClass'])}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">City:</td>
                    <td style="width:25%;"><strong>{{$vindata['PlantCity']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Made In:</td>
                    <td style="width:25%;"><strong>{{$vindata['PlantCity']}} {{$vindata['PlantCountry']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Steering Type:</td>
                    <td style="width:25%;">{{$vindata['SteeringLocation']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Anti Brake System:</td>
                    <td style="width:25%;"><strong>{{$vindata['ABS']}}</strong></td>
                </tr>
                @if ($vindata['Seats'])
                <tr>
                    <td style="width:25%;">Standard Seating:</td>
                    <td style="width:25%;"><strong>{{$vindata['Seats']}}</strong></td>
                </tr>
                @endif
                <tr>
                    <td style="width:25%;">Doors:</td>
                    <td style="width:25%;"><strong>{{$vindata['Doors']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Drive Type:</td>
                    <td style="width:25%;"><strong>{{$vindata['DriveType']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Engine Model:</td>
                    <td style="width:25%;">{{$vindata['EngineModel']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Engine Manufacturer:</td>
                    <td style="width:25%;"><strong>{{$vindata['EngineManufacturer']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Engine Configuration:</td>
                    <td style="width:25%;"><strong>{{$vindata['EngineConfiguration']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Engine Cylinders:</td>
                    <td style="width:25%;"><strong>{{$vindata['EngineCylinders']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Engine HP:</td>
                    <td style="width:25%;"><strong>{{$vindata['EngineHP']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Brake System Type:</td>
                    <td style="width:25%;"><strong>{{$vindata['BrakeSystemType']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Fuel Type:</td>
                    <td style="width:25%;"><strong>{{$vindata['FuelTypePrimary']}}</strong></td>
                </tr>
            </table>
        </div>
        @if($reportdata)
        <div class="market_report" style="border:1px solid #000; padding:10px;">
            <table style="width:100%; margin-top: 20px;">
                <tr >
                    <td style="text-align:center;position:relative;width:100%;">
                        <h3 style="margin-bottom:20px;">{!!$reportdata['name']!!}</h3>
                        <img style="margin-top:30px;" width="600px" src="{{asset('uploads/graph-full.jpeg')}}" alt="">
                        <div style="position: absolute;width: 95px; height: 30px;top: 165px;left: 89px; background: #f8f8f8; ">
                            <span style="font-size: 13px;margin-top:50px;">Below Market</span><br>
                            <span style="font-size: 12px;">{!!$reportdata['below_average']!!}</span>
                        </div>
                        <div style="position: absolute;width: 95px; height: 30px;top: 73px;left: 286px; background: #f8f8f8; ">
                            <span style="font-size: 13px;margin-top:50px;">Market Average</span><br>
                            <span style="font-size: 12px;">{!!$reportdata['market_average']!!}</span>
                        </div>
                        <div style="position: absolute;width: 100px; height: 30px;top: 165px;right: 93px; background: #f8f8f8; ">
                            <span style="font-size: 13px;margin-top:50px;">Above Market</span><br>
                            <span style="font-size: 12px;">{!!$reportdata['above_average']!!}</span>
                        </div>
                    
                    </td>    
                </tr>
                <tr style="text-align:center;position:relative;width:100%;">
                    <td style="font-size: 13px;margin-top:50px;">
                        {!!$reportdata['des']!!}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid; margin-top:10px"></td>
                </tr>
                <tr>
                    <table style="width:80%; margin-top:20px; margin-left: 50px;">
                        <tr>
                            <td>
                                <b>ASSUMPTIONS</b><br>
                                <span style="font-size: 12px;">Current Mileage: {!!$reportdata['current_mileage']!!}</span><br>
                                {{-- <span style="font-size: 12px;">Time Period: {!!$reportdata['time_period']!!}</span> --}}
                            </td>
                            <td>
                                <b>ESTIMATES</b><br>
                                <span style="font-size: 12px;">Market Value: {!!$reportdata['market_value']!!}</span><br>
                                <span style="font-size: 12px;">Estimate Certaintv: {!!$reportdata['estimated_certainty']!!}</span>
                            </td>
                            
                        </tr>
                    </table>
                </tr>
            </table>
        </div>
        <div class="page-break"></div>
        @endif
        @foreach($ratings as $rat)
        <br>

        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Vehicle Rating {{$rat['VehicleDescription']}}</h2>
            <style>
                #table_1 {
                    border-collapse: collapse;
                }

                #table_1 tr td {
                    border-bottom: 1px solid #ccc;
                    padding: 20px;
                }

                #table_1 tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

            </style>
            <table id="table_1">
                <tr>
                    <td style="width:25%;">Vehicle Id:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['VehicleId']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Overall Rating:</td>
                    <td style="width:25%;">{{@$rat['rating']['OverallRating']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Overall Front Crash Rating:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['OverallFrontCrashRating']}}</strong></td>
                </tr>
                <tr>
                    <td style="width:25%;">Front Crash Driver side Rating:</td>
                    <td style="width:25%;">{{@$rat['rating']['FrontCrashDriversideRating']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Front Crash Passenger side Rating:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['FrontCrashPassengersideRating']}} </strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Overall Side Crash Rating:</td>
                    <td style="width:25%;">{{@$rat['rating']['OverallSideCrashRating']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Side Crash Driver side Rating:</td>
                    <td style="width:25%;">{{@$rat['rating']['SideCrashDriversideRating']}}</td>
                </tr>
                <tr>
                    <td style="width:25%;">Side Crash Passenger side Rating:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['SideCrashPassengersideRating']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Combined Side Barrier And Pole Rating-Front:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['combinedSideBarrierAndPoleRating-Front']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Combined Side Barrier And Pole Rating:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['combinedSideBarrierAndPoleRating']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Side Barrier Rating-Overall:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['sideBarrierRating-Overall']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Rollover Rating:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['RolloverRating']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Rollover Possibility:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['RolloverPossibility']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Dynamic Tip Result:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['dynamicTipResult']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Side Pole Crash Rating:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['SidePoleCrashRating']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Electronic Stability Control:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['NHTSAElectronicStabilityControl']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Rollover Rating:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['RolloverRating']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Forward Collision Warning:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['NHTSAForwardCollisionWarning']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Lane Departure Warning:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['NHTSALaneDepartureWarning']}}</strong></td>
                </tr>

                <tr>
                    <td style="width:25%;">Investigation Count:</td>
                    <td style="width:25%;"><strong>{{@$rat['rating']['InvestigationCount']}}</strong></td>
                </tr>

            </table>
        </div>
        @endforeach
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Salvage Information</h2>
            <table style="color: #0da5e9">
                <tr>
                    <td>Clean Records Found</td>
                    <td><i style="color:green;" class="fas fa-check-circle"></i> </td>
                </tr>
            </table>
        </div>
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Insurance Records</h2>
            <table style="color: #0da5e9">
                <tr>
                    <td>Clean Records Found</td>
                    <td><i style="color:green;" class="fas fa-check-circle"></i> </td>
                </tr>
            </table>
        </div>
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Title History Information</h2>
            <table style="color: #0da5e9">
                <tr>
                    <td>Clean Records Found</td>
                    <td><i style="color:green;" class="fas fa-check-circle"></i> </td>
                </tr>
            </table>
        </div>
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Odometer events</h2>
            <table style="color: #0da5e9">
                <tr>
                    <td>Clean Records Found</td>
                    <td><i style="color:green;" class="fas fa-check-circle"></i> </td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Auction Sales Information</h2>
            <table style="color: #0da5e9">
                <tr>
                    <td>Clean Records Found</td>
                    <td><i style="color:green;" class="fas fa-check-circle"></i> </td>
                </tr>
            </table>
        </div>
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Lien / Impound / Export Records</h2>
            <table style="color: #0da5e9">
                <tr>
                    <td>Clean Records Found</td>
                    <td><i style="color:green;" class="fas fa-check-circle"></i> </td>
                </tr>
            </table>
        </div>
        <div class="report_details mt-50">
            <h2 style="background: #0da5e9;padding: 15px;color:white;">Detailed History</h2>
            <table style="color: #0da5e9">
                <tr>
                    <td>Clean Records Found</td>
                    <td><i style="color:green;" class="fas fa-check-circle"></i> </td>
                </tr>
            </table>
        </div>
       
    @if(count($complaints))

    <div class="report_details mt-50">
        <h2 style="background: #0da5e9;padding: 15px;color:white;">Complaints</h2>
        @foreach ($complaints as $comp)
        <h4 style="background: #0da5e9;padding: 15px;color:white;">Complaints Info:</h4>
        <ul>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Date Complaint Filed:
                </span>
                <span>
                    {{\Carbon\Carbon::parse($comp['dateComplaintFiled'])->format('M d, Y')}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    manufacturer:
                </span>
                <span>
                    {{@$comp['manufacturer']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Odi Number:
                </span>
                <span>
                    {{@$comp['odiNumber']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Crash:
                </span>
                <span>
                    {{@$comp['crash']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Fire:
                </span>
                <span>
                    {{@$comp['fire']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Number Of Injuries:
                </span>
                <span>
                    {{@$comp['numberOfInjuries']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Number Of Deaths:
                </span>
                <span>
                    {{@$comp['numberOfDeaths']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Date Of Incident:
                </span>
                <span>
                    {{\Carbon\Carbon::parse(@$comp['dateOfIncident'])->format('M d, Y')}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    vin:
                </span>
                <span>
                    {{@$comp['vin']}}
                </span>
            </li>
        </ul>
        <div class="summary" style="margin-bottom: 50px">
            {{-- <p style="color:#0da5e9;font-weight:bolder;">Crash</p>
	                    <p>{{@$comp['crash']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">Fire</p>
            <p>{{@$comp['fire']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">Number Of Injuries</p>
            <p>{{@$comp['numberOfInjuries']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">Number Of Deaths</p>
            <p>{{@$comp['numberOfDeaths']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">Date Of Incident</p>
            <p>{{\Carbon\Carbon::parse('dateOfIncident')->format('M d, Y')}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">Vin</p>
            <p>{{@$comp['vin']}}</p>
            <br> --}}
            <p style="color:#0da5e9;font-weight:bolder;">Components</p>
            <p>{{@$comp['components']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">Summary</p>
            <p>{{@$comp['summary']}}</p>
        </div>
        @endforeach
    </div>
    @endif
    @isset($recalldata)
    <div class="report_details mt-50">
        <h2 style="background: #0da5e9;padding: 15px;color:white;">Recalls</h2>
        @foreach ($recalldata['results'] as $recall)
        <h4 style="background: #0da5e9;padding: 15px;color:white;">Recall Info:</h4>
        <ul>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Report Receipt Date:
                </span>
                <span>
                    Jul 2, 2013
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Manufacturer:
                </span>
                <span>
                    {{@$recall['Manufacturer']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Recall No:
                </span>
                <span>
                    {{@$recall['NHTSACampaignNumber']}}
                </span>
            </li>
            <li>
                <span style="color:#0da5e9;font-weight:bolder;">
                    Component(s):
                </span>
                <span>
                    {{@$recall['Component']}}
                </span>
            </li>
        </ul>
        <div class="summary" style="margin-bottom: 50px">
            <p style="color:#0da5e9;font-weight:bolder;">SUMMARY</p>
            <p>{{@$recall['Summary']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">CONSEQUENCE</p>
            <p>{{@$recall['Conequence']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">REMEDY</p>
            <p>{{@$recall['Remedy']}}</p>
            <br>
            <p style="color:#0da5e9;font-weight:bolder;">NOTES</p>
            <p>{{@$recall['Notes']}}</p>
        </div>
        @endforeach

    </div>
    @endisset
    <div class="page-break"></div>
    <div class="report_details mt-50">

        <h1 style="color:#0da5e9;">Title Brand Information <span style="font-size:20px;color:#ccc;"></span></h1>
        <p style="line-height:30px;">Brands are lables used to describe the status of a motor vehicle such as "junk" , "salvage" , or "flood". Statuses from states are mapped to brands for consistency within the system.</p>
        <style>
            #brand_info_table {
                border-collapse: collapse;
            }

            #brand_info_table {
                border-bottom: 1px solid #ccc;
                padding: 20px;
            }

            #brand_info_table tr td,
            th {
                padding: 20px;
            }

            #brand_info_table tr#bg-grey {
                background-color: #ebebeb;
            }

            #brand_info_table tr:nth-child(even) {
                background-color: #fafafa;
            }

            #brand_info_table td {
                width: 50%;
            }

        </style>
        <table id="brand_info_table">
            <tr id="bg-grey">
                <th>Brand Category</th>
                <th></th>
            </tr>
            <tr>
                <td>
                    <h4>AGRICULTURAL VEHICLE</h4>
                    <p>The vehicle will primarily be operated on private roads for agricultural purpose</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ANTIQUE</h4>
                    <p>The vehicle is over 50 years old</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>BOND POSTED</h4>
                    <p>The insurrance company has issues the bond on the vehicle because the ownership of the vehicle cannot be proven; this allows the vehicle to be sold and titled; Note : the brand is not valid after January 17 2003.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>CLASSIC</h4>
                    <p>The vehicle is over 20 years old and adheres to other jurisdiction-specific criteria, e.g. vehicle make , condition etc.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>COLLISION</h4>
                    <p>Vehicle damaged by collision.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>


            <tr>
                <td>
                    <h4>CRUSHED</h4>
                    <p>The frame or chassis of the vehicle has been crushed or otherwise destroyed so that it is physically impossible to use it in constructing a vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>DISCLOSED DAMAGE</h4>
                    <p>The vehicle has sustained damage to the extent that the damage is required to be disclosed under the jurisdiction's damage disclosure law.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>DISMANTLED</h4>
                    <p>The vehicle can only be sold as parts and can not be legally driven.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>EXPORT ONLY VEHICLE</h4>
                    <p>A salvage or junk vehicle determined for exportation outside of the United States and/or its territories, is not eligible for re-title/re-registration for on-road use in the United States.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>FIRE DAMAGE</h4>
                    <p>A fire damage record means that the vehicle was damaged by fire.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>FLOOD DAMAGE</h4>
                    <p>A flood damage record means the vehicle damaged by freshwater flood (or it is unknown whether the damage was caused by fresh water or salt water).</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>FORMER RENTAL</h4>
                    <p>Vehicle has been used as a rental vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>GRAY MARKET</h4>
                    <p>Vehicle was manufactured for use outside of the United States and has been brought into the United States. Brand '22' has been replaced by brands '45' and '46', as of 6/25/01.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>GRAY MARKET COMPLIANT</h4>
                    <p>Vehicle was manufactured for use outside the United States and has been brought into the United States. The vehicle is in compliance with applicable federal standards.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>GRAY MARKET NON-COMPLIANT</h4>
                    <p>Vehicle was manufactured for use outside the United States and has been brought into the United States. The vehicle is not in compliance with applicable federal standards.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>HAIL DAMAGE</h4>
                    <p>Vehicle damaged by hail.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>


            <tr>
                <td>
                    <h4>HAZARDOUS SUBSTANCE CONTAMINATED VEHICLE</h4>
                    <p>The jurisdiction has determined that the vehicle has been contaminated by a ‘hazardous substance' and is unsafe for use. Excluding flood damaged vehicles. A 'hazardous substance' is any substance that could diminish the safety of the vehiclxe or cause injury to its occupants. The 'hazardous substance' has one or more, but is not limited to the following intrinsic 'hazardous properties': Explosiveness, Flammability, Ability to oxidize (accelerate a fire), Human toxicity (acute or chronic), Corrosiveness (to human tissue or metal), Eco toxicity (with or without bioaccumulation), Capacity, on contact with air or water, to develop one or more of the above properties.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>JUNK</h4>
                    <p>The vehicle is incapable of safe operation for use on the roads or highways and has no resale value except as a source of parts or scrap, or the vehicle's owner has irreversibly designated the vehicle as a source of parts or scrap. This vehicle shall never be titled or registered. Also known as non-repairable, scrapped, or destroyed.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>KIT</h4>
                    <p>A Vehicle that has been built by combining a chassis with a different (non-matching VIN) frame, engine, and body parts. The VIN on the chassis is used as the vehicle's VIN.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>LOGGING VEHICLE</h4>
                    <p>The vehicle will primarily be operated on private roads for logging purposes.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>MANUFACTURER BUY BACK</h4>
                    <p>A vehicle that has been bought back by the manufacturer under jurisdiction-defined regulations or laws, such as lemon laws. For example, the manufacturer could be obligated to buy back the vehicle when a specified number of repair attempts fails to correct a major problem on a new vehicle, or if a new vehicle has been out of service for repair for the same problem for a cumulative period of 30 days or more, within one year of purchase.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>MEMORANDUM COPY</h4>
                    <p>The title document is a facsimile title and not the active (original or duplicate) title document.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: ACTUAL</h4>
                    <p>The true mileage for the vehicle. The odometer has not been tampered with, reached its mechanical limits, or been altered.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: CALLTITLEDIVISION</h4>
                    <p>The titling authority knows of some problem with the odometer reading that it cannot print on a title. Titling authority will discuss the problem (manual process) with authorized inquirers.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: DISCREPANCY</h4>
                    <p>The titling authority has reason to believe that the odometer reading does not reflect the true mileage of the vehicle because of known previous recorded values of odometer for the vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: EXCEEDS MECHANICAL LIMITS</h4>
                    <p>The odometer reading is less than the true mileage of the vehicle because the odometer can not display the total number of true miles.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: EXCEEDS MECHANICAL LIMITS RECTIFIED</h4>
                    <p>A state other than the brander corrected brand 72.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: EXEMPT FROM ODOMETER DISCLOSURE</h4>
                    <p>The vehicle falls within criteria that allow it to change ownership without disclosure of the odometer reading.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: MAYBE ALTERED</h4>
                    <p>The titling authority has reason to believe that the odometer reading does not reflect the true mileage of the vehicle because of an alteration to the odometer.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: NOT ACTUAL</h4>
                    <p>The odometer reading is known to be other than the true mileage for the vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: READING AT TIME OF RENEWAL</h4>
                    <p>The odometer reading was recorded when the registration was renewed.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: REPLACED</h4>
                    <p>The odometer in the vehicle is not the odometer put in the vehicle when manufactured.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: TAMPERING VERIFIED</h4>
                    <p>Odometer tampering verified - The odometer reading is known to be other that the true mileage for the vehicle, due to tampering.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ORIGINAL POLICE</h4>
                    <p>Vehicle is currently registered as a police vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ORIGINAL TAXI</h4>
                    <p>Vehicle is currently registered as a taxi.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>OWNER RETAINED</h4>
                    <p>A vehicle that has been declared by the insurance company to be a total loss but the owner maintains possession and ownership of the vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: ACTUAL</h4>
                    <p>The true mileage for the vehicle. The odometer has not been tampered with, reached its
                        mechanical limits, or been altered.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: CALLTITLEDIVISION</h4>
                    <p>The titling authority knows of some problem with the odometer reading that it cannot print
                        on a title. Titling authority will discuss the problem (manual process) with authorized
                        inquirers.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: DISCREPANCY</h4>
                    <p>The titling authority has reason to believe that the odometer reading does not reflect the
                        true mileage of the vehicle because of known previous recorded values of odometer for the
                        vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: EXCEEDS MECHANICAL LIMITS</h4>
                    <p>The odometer reading is less than the true mileage of the vehicle because the odometer
                        can not display the total number of true miles.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: EXCEEDS MECHANICAL LIMITS RECTIFIED</h4>
                    <p>A state other than the brander corrected brand 72.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: EXEMPT FROM ODOMETER DISCLOSURE</h4>
                    <p>The vehicle falls within criteria that allow it to change ownership without disclosure of the odometer reading.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: MAYBE ALTERED</h4>
                    <p>The titling authority has reason to believe that the odometer reading does not reflect the true mileage of the vehicle because of an alteration to the odometer.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: NOT ACTUAL</h4>
                    <p>The odometer reading is known to be other than the true mileage for the vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: READING AT TIME OF RENEWAL</h4>
                    <p>The odometer reading was recorded when the registration was renewed.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: REPLACED</h4>
                    <p>The odometer in the vehicle is not the odometer put in the vehicle when manufactured.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: TAMPERING VERIFIED</h4>
                    <p>Odometer tampering verified - The odometer reading is known to be other that the true mileage for the vehicle, due to tampering.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ORIGINAL POLICE</h4>
                    <p>Vehicle is currently registered as a police vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ORIGINAL TAXI</h4>
                    <p>Vehicle is currently registered as a taxi.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>ODOMETER: MAYBE ALTERED</h4>
                    <p>The titling authority has reason to believe that the odometer reading does not reflect the true mileage of the vehicle because of an alteration to the odometer.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: NOT ACTUAL</h4>
                    <p>The odometer reading is known to be other than the true mileage for the vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: READING AT TIME OF RENEWAL</h4>
                    <p>The odometer reading was recorded when the registration was renewed.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: REPLACED</h4>
                    <p>The odometer in the vehicle is not the odometer put in the vehicle when manufactured.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ODOMETER: TAMPERING VERIFIED</h4>
                    <p>Odometer tampering verified - The odometer reading is known to be other that the true mileage for the vehicle, due to tampering.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ORIGINAL POLICE</h4>
                    <p>Vehicle is currently registered as a police vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>ORIGINAL TAXI</h4>
                    <p>Vehicle is currently registered as a taxi.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>OWNER RETAINED</h4>
                    <p>A vehicle that has been declared by the insurance company to be a total loss but the owner maintains possession and ownership of the vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>PARTS ONLY</h4>
                    <p>The vehicle may only be used for parts. This code is no longer used, use '07 - Dismantled'.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>PRIOR NON-REPAIRABLE / REPAIRED</h4>
                    <p>A vehicle constructed by repairing a vehicle that has been destroyed or declared to be nonrepairable or otherwise declared to not be eligible for titling because of the extent of damage to the vehicle but has been issued a title pursuant to state law after falling within this criterion with this brand on the face of the certificate of title</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>PRIOR OWNER RETAINED</h4>
                    <p>A vehicle that was previously branded owner retained and was sold. The new owner's title contains this brand.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>PRIOR POLICE</h4>
                    <p>Vehicle previously registered as a police vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>PRIOR TAXI</h4>
                    <p>Vehicle previously registered as a taxi.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>REBUILT</h4>
                    <p>The vehicle, previously branded 'salvage', has passed anti-theft and safety inspections, or
                        other jurisdiction procedures, to ensure the vehicle was rebuilt to required standards. Also
                        known as prior salvage (salvaged).</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>RECONSTRUCTED</h4>
                    <p>A vehicle that has been permanently altered from original construction by removing, adding,
                        or substituting major components.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>RECOVERED THEFT</h4>
                    <p>The vehicle was previously titled as salvage due to theft. The Vehicle has been repaired and
                        inspected (or complied with other jurisdiction procedures) and may be legally driven.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>REFURBISHED</h4>
                    <p>Any vehicle modified by the installation of a new cab and chassis for the existing coach
                        which has been renovated, resulting in a vehicle of greater value or a vehicle with a new
                        style.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>REMANUFACTURED</h4>
                    <p>Vehicle was reconstructed by the manufacturer.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>REPLICA</h4>
                    <p>A vehicle with a body built to resemble and be a reproduction of another vehicle of a given
                        year and given manufacturer.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>SALTWATER DAMAGE</h4>
                    <p>Vehicle damaged by saltwater flood.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>SALVAGE: DAMAGED OR NOT SPECIFIED</h4>
                    <p>Any vehicle which has been wrecked, destroyed or damaged, to the extent that the total
                        estimated or actual cost of parts and labor to rebuild or reconstruct the vehicle to its preaccident condition and for legal operation on roads or highways exceeds a jurisdictiondefined percentage of the retail value of the vehicle. The retail value of the vehicle is
                        determined by a current edition of a nationally recognized compilation (to include
                        automated data bases) of retail values. Salvage--Damage or Not Specified also includes any
                        vehicle to which an insurance company acquires owner- ship pursuant to a damage
                        settlement, or any vehicle that the vehicle's owner may wish to designate as a salvage
                        vehicle by obtaining a salvage title, without regard to extent of the vehicle's damage and
                        repairs, or any vehicle for which the jurisdiction cannot distinguish the reason the vehicle
                        was designated salvage.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>SALVAGE: REASONS OTHER THAN DAMAGE OR STOLEN</h4>
                    <p>Any vehicle the reporting jurisdiction considers salvage based on criteria, such as
                        abandonment, not covered by the Salvage-- Damage or Not Specified and Salvage--Stolen
                        brands. Note.--Percent of damage is not reported with brand code 50.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>SALVAGE: RETENTION</h4>
                    <p>The vehicle is branded salvage and is kept by the owner.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>SALVAGE: STOLEN</h4>
                    <p>Any vehicle the reporting jurisdiction considers salvage because an insurance company has
                        acquired ownership pursuant to a settlement based on the theft of the vehicle.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>STREET ROD</h4>
                    <p>The vehicle has been modified to not conform with the manufacturer's specifications, and
                        the modifications adhere to jurisdiction-specific criteria.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>TEST VEHICLE</h4>
                    <p>The vehicle is built and retained by the manufacturer for testing.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>TOTALED</h4>
                    <p>A vehicle that is declared a total loss by a jurisdiction or an insurer that is obligated to
                        cover the loss or that the insurer takes possession of or title to.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>UNDISCLOSED LIEN</h4>
                    <p>The vehicle has entered the titling jurisdiction from a jurisdiction that does not disclose
                        lien-holder information on the title. The titling jurisdiction may issue a new title without
                        this brand if no notice of a security interest in the vehicle is received, within a jurisdiction
                        defined timeframe. Note: This brand is not valid after January 17, 2003.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>VANDALISM</h4>
                    <p>Vehicle damaged by vandals.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>VEHICLE CONTAINS REISSUED VIN</h4>
                    <p>The chassis VIN has been reissued, i.e. the same VIN is reused.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>VEHICLE NON-CONFORMITY CORRECTED</h4>
                    <p>A non-safety defect reported to the jurisdiction by the vehicle manufacturer has been
                        corrected.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>VEHICLE NON-CONFORMITY UNCORRECTED</h4>
                    <p>A non-safety defect reported to the jurisdiction by the vehicle manufacturer remains
                        uncorrected.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>VEHICLE SAFETY DEFECT CORRECTED</h4>
                    <p>A safety defect reported to the jurisdiction by the vehicle manufacturer has been corrected.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>VEHICLE SAFETY DEFECT UNCORRECTED</h4>
                    <p>A safety defect reported to the jurisdiction by the vehicle manufacturer remains
                        uncorrected.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>VIN REPLACED</h4>
                    <p>VIN replaced by a new state assigned VIN. A title should not be issued for the VIN. This
                        brand can be issued for rebuilt vehicles.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>WARRANTY RETURN</h4>
                    <p>Vehicle returned to the manufacturer because of a breach in the warranty.</p>
                </td>
                <td>
                    <h4><span class="fa fa-check-circle" style="color:green;float:right;"></span> Clean Records Found</h4>
                </td>
            </tr>
        </table>
        <h1 style="color:#0da5e9;">GLOSSARY</h1>
        <style>
            #glossary_table {
                border-collapse: collapse;
            }

            #glossary_table {
                border-bottom: 1px solid #ccc;
                padding: 20px;
            }

            #glossary_table tr td,
            th {
                padding: 20px;
            }

            #glossary_table tr#bg-grey {
                background-color: #ebebeb;
            }

            #glossary_table tr:nth-child(even) {
                background-color: #fafafa;
            }

        </style>
        <table id="glossary_table">
            <tr>
                <td>
                    <p><b>MAKE</b> is the manufacturer's brand name.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>MODEL</b> is the manufacturer designation of the lot.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>YEAR</b> is the manufacturer's designated model year.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>BODYSTYLE</b> is the manufacturer's designation of vehicle configuration.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>COLOR</b> is the common color name that reasonably represented the exterior color of the vehicle. COLOR is not the manufacturer's designated color name, but rather simply a general descriptive name.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>CYLINDERS</b> is the manufacturer's designation of the vehicle's power train</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>FUEL</b> designated the fuel type used by the engine as designated by the VIN</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>DRIVE</b> is the manufacturer's designation of the vehicle's power train</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>ENGINE</b> is the motor specification denoted by the VIN of the vehicle</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>ODOMETER</b> codes are shown to reflect the known reliability of the odometer reading.</p>
                </td>
            </tr>

        </table>
        <br>

        <div class="page-break"></div>

    </div>


    <div class="report_details mt-50 ">
        <h2 style="background: #0da5e9;padding: 15px;color:white;">NMVTIS Consumer Access Product Disclaimer</h2>
        <div style="text-align: center">
            <img src="{{asset('images/nmvtislogor.png')}}" />
            <br />
            <p>
                NMVTIS Consumer Access Product DisclaimerThe National Motor Vehicle Title Information System (NMVTIS) is an electronic system that contains information on certainautomobiles titled in the United States. NMVTIS is intended to serve as a reliable source of title and <a href="#">brand</a> history forautomobiles, but it does not contain detailed information regarding a vehicle’s repair history
            </p>
            <p>
                All states, insurance companies, and junk and salvage yards are required by federal law to regularly report information toNMVTIS. However, NMVTIS does not contain information on all motor vehicles in the United States because <a href="#">some states</a> are not yet providing their vehicle data to the system. Currently, the data provided to NMVTIS by states is provided in avariety of time frames; while some states report and update NMVTIS data in “real-time” (as title transactions occur), otherstates send updates less frequently, such as once every 24 hours or within a period of days.
            </p>
            <p>
                Information on previous, significant vehicle damage may not be included in the system if the vehicle was neverdetermined by an insurance company (or other appropriate entity) to be a “total loss” or branded by a state titling agency.Conversely, an insurance carrier may be required to report a “total loss” even if the vehicle’s titling-state has notdetermined the vehicle to be “salvage” or “junk.”
            </p>
            <p>
                A vehicle history report is NOT a substitute for an independent vehicle inspection. Before making a decision to purchase avehicle, consumers are <strong> strongly encouraged to also obtain an independent vehicle inspection</strong> to ensure the vehicledoes not have hidden damage. The <a href="#">Approved NMVTIS Data Providers</a> (look for the NMVTIS logo) can include vehiclecondition data from sources other than NMVTIS.
            </p>
            <p>NMVTIS data <strong>INCLUDES</strong> (as available by those entities required to report to the System):</p>
            <ul style="list-style: inherit;text-align: left;">
                <li>Information from <a href="#">participating</a> state motor vehicle titling agencies.</li>
                <li>
                    Information on automobiles, buses, trucks, motorcycles, recreational vehicles, motor homes, and tractors. NMVTISmay not currently include commercial vehicles if those vehicles are not included in a state’s primary database fortitle records (in some states, those vehicles are managed by a separate state agency), although these records maybe added at a later time.
                </li>
                <li>
                    Information on “brands” applied to vehicles provided by participating state motor vehicle titling agencies. Brandtypes and definitions vary by state, but may provide useful information about the condition or prior use of thevehicle.
                </li>
                <li>Most recent odometer reading in the state’s title record.</li>
                <li>
                    Information from insurance companies, and auto recyclers, including junk and salvage yards, that is required bylaw to be reported to the system, beginning March 31, 2009. This information will include if the vehicle wasdetermined to be a “total loss” by an insurance carrier.
                </li>
                <li>
                    Information from junk and salvage yards receiving a “cash for clunker” vehicle traded-in under the ConsumerAssistance to Recycle and Save Act of 2009 (CARS) Program.
                </li>
            </ul>
            <p>
                Consumers are advised to visit  for details on how to interpret the information in the system andunderstand the meaning of various labels applied to vehicles by the participating state motor vehicle titling agencies.
            </p>
        </div>

    </div>

    </div>
</body>
</html>
