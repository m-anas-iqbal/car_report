<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/normal/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap"
            rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Vehicle History Report</title>
        <style>
            .carSpect h3 {
                background: linear-gradient(90deg, rgba(247, 119, 22, 1) 0%, rgba(195, 84, 0, 1) 35%);
                padding: 12px;
                text-align: center;
                font-size: 22px;
                font-weight: 600;
                color: #fff;
                margin-bottom: 0;
                border-radius: 8px 8px 0px 0px;
            }
        </style>
    </head>

    <body>
        <div class="print-section">
            <div class="vehicleHisReport">
                <div class="text-center my-md-4 my-4">
                    <button class="ptnBtn" onclick="javascript:window.print();return false;">Print Report</button>
                </div>
                <div class="headTitBack mb-3">
                    <img src="/normal/images/Experian-Bkg-1.jpg" class="d-md-block d-none" alt="">
                    <div class="exLogo">
                        <img src="/normal/images/experian-logo.png" class="" alt="">
                    </div>
                    <div class="headTit">
                        <h1>Experian Your Vehicle History Report</h1>
                        <p class="mb-0">Report run: {{now()}}</p>
                    </div>
                </div>
                <div class="carSpect mb-3">
                    <h2>
                        {{str_ireplace('incomplete','', $title)}}
                    </h2>
                    <div class="carSpectDetail mt-4">
                        <div class="row mb-lg-2 mb-0">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-1 order-3">
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Report ID:</div>
                                    <div class="decode-data col-md-6 col-12">{{$report_id}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Date Generated: </div>
                                    <div class="decode-data col-md-6 col-12">{{date('d-m-Y')}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Style: </div>
                                    <div class="decode-data col-md-6 col-12">
                                        {{str_ireplace('incomplete', '', $vindata['BodyClass'] ?? "--")}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Made In: </div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['PlantCity'] ?? "--"}}
                                        {{$vindata['PlantCountry'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Make / Model:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['Make'] ?? "--" }} /
                                        {{$vindata['Model'] ?? "--"}}</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 my-lg-0 my-3 order-lg-2 order-1">
                                <div class="vihOwner">
                                    @php
                                    $img = array_key_exists($vindata['BodyClass'] ?? "--", $rimages) ?
                                    "BodyClassImages/".$rimages[$vindata['BodyClass'] ?? "--"].".png" :
                                    "images/report_car_placeholder.png";
                                    @endphp
                                    <img src="{{asset($img)}}" alt="" style="width: 220px">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 my-lg-0 my-3 order-lg-3 order-2">
                                <div class="vihScore">
                                    <h2>Vehicle Age</h2>
                                    <h4>{{date('Y') - $vindata['ModelYear']}}</h4>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Vin:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['VIN']}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Year:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['ModelYear'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Make:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['Make'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Model:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['Model'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Trim:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['Trim'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Engine:</div>
                                    <div class="decode-data col-md-6 col-12">{{$engine}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Engine HP:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['EngineHP'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Brake System Type:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['BrakeSystemType'] ?? "--"}}
                                    </div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Fuel Type:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['FuelTypePrimary'] ?? "--"}}
                                    </div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">GVWR:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['GVWR'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Style: </div>
                                    <div class="decode-data col-md-6 col-12">
                                        {{str_ireplace('incomplete', '', $vindata['BodyClass'])}}</div>
                                </div>
                                <div class="decode-box-row row ">
                                    <div class="col-md-6 col-12 decode-label">City: </div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['PlantCity'] ?? "--"}}</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Made In: </div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['PlantCity'] ?? "--"}}
                                        {{$vindata['PlantCountry'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Steering Type:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['SteeringLocation'] ?? "--"}}
                                    </div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Anti Brake System:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['ABS'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Doors:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['Doors'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Drive Type:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['DriveType'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Engine Model:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['EngineModel'] ?? "--"}}</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Engine Manufacturer:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['EngineManufacturer'] ?? "--"}}
                                    </div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Engine Configuration:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['EngineConfiguration'] ?? "--"}}
                                    </div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Engine Cylinders:</div>
                                    <div class="decode-data col-md-6 col-12">{{$vindata['EngineCylinders'] ?? "--"}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vehicleGlance mb-3">
                    <h2 class="head">Vehicle History at a Glance</h2>
                    <div class="row px-sm-4 px-3 pt-4">
                        <!-- column #1 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/junk-salvage-information.svg" alt="">
                                    <h5>
                                        Junk Salvage Information <br> 0 record(s) found
                                    </h5>
                                </div>
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column #2 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/insurance-information.svg" alt="">
                                    <h5>
                                        Insurance Information <br> 0 record(s) found
                                    </h5>
                                </div>
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column #3 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/title-history.svg" alt="">
                                    <h5>
                                        Title History <br> 0 record(s) found
                                    </h5>
                                </div>
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column #4 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/odometer-events.svg" alt="">
                                    <h5>
                                        Odometer events <br> 0 record(s) found
                                    </h5>
                                </div>
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column #5 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/title-brands.svg" alt="">
                                    <h5>
                                        Title Brands <br> 0 record(s) found
                                    </h5>
                                </div>
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column #6 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/ownership-history.svg" alt="">
                                    <h5>
                                        Ownership History <br> 0 record(s) found
                                    </h5>
                                </div>
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column #7 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/lien-records.svg" alt="">
                                    <h5>
                                        Lien Records <br> 0 record(s) found
                                    </h5>
                                </div>
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column #8 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="glanceBx">
                                <div class="d-flex align-items-center contBx">
                                    <img src="/normal/images/recalls.svg" alt="">
                                    <h5>
                                        Recalls <br> {{ isset($recalldata) ? count($recalldata['results']) : 0}}
                                        record(s) found
                                    </h5>
                                </div>
                                @if(isset($recalldata))
                                <div class="chekBx">
                                    <h3>Not Clean</h3>
                                    <div class="svgicnerror">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20" fill="rgba(255,255,255,1)">
                                            <path
                                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 15V17H13V15H11ZM11 7V13H13V7H11Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @else
                                <div class="chekBx">
                                    <h3>Clean</h3>
                                    <div class="svgicn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if($reportdata)
                @php
                $type = 'vini';
                @endphp
                <div>
                    <div id="glossary" class="odometerChk my-3">
                        <h2 class="head">{!!($title ? 'Market value for' . str_ireplace('incomplete', '', $title) :
                            $reportdata['name'])!!}</h2>
                        <div class="m-0 section-data">
                            <div class="d-flex" style="display:flex;">
                                <div style="width: 50%; height: 210px">
                                    <div style="
                                border: 1px solid #d4d4d4;
                                height: 70px;
                                text-align: center;
                                padding-top: 10px;
                            ">
                                        <span style="font-size: 18px" class="font-weight-bold">Below Market</span><br />
                                        <span style="font-size: 12px">{{$reportdata['below_average']}}</span>
                                    </div>
                                    <div style="
                                border: 1px solid #d4d4d4;
                                height: 70px;
                                text-align: center;
                                padding-top: 10px;
                            ">
                                        <span style="font-size: 18px; font-weight: 500">Market Average</span><br />
                                        <span style="font-size: 12px">{{$reportdata['market_average']}}</span>
                                    </div>
                                    <div style="
                                border: 1px solid #d4d4d4;
                                height: 70px;
                                text-align: center;
                                padding-top: 10px;
                            ">
                                        <span style="font-size: 18px; font-weight: 500">Above Market</span><br />
                                        <span style="font-size: 12px">{{$reportdata['above_average']}}</span>
                                    </div>
                                </div>
                                <div
                                    style="width: 50%; height: {{ ($type == 'vini' ? '210px' : '245px')}}; float: right">
                                    <div style="
                                border: 1px solid #d4d4d4;
                                height: 105px;
                                padding-left: 20px;
                                padding-top: 11px;
                            ">
                                        <span style="font-size: 18px; font-weight: 500">ASSUMPTIONS </span><br />
                                        <span style="font-size: 12px">Current Mileage:
                                            {{$reportdata['current_mileage']}}</span><br />
                                        <span style="font-size: 12px">Time Period: {{$reportdata['time_period']}}</span>
                                    </div>
                                    <div style="
                                border: 1px solid #d4d4d4;
                                height: {{($type == 'vini' ? '105px' : '115px')}};
                                padding-left: 20px;
                                padding-top: 11px;
                            ">
                                        <span style="font-size: 18px; font-weight: 500">ESTIMATES </span><br />
                                        <span style="font-size: 12px">Market Value:
                                            {{$reportdata['market_value']}}</span><br />
                                        <span style="font-size: 12px">Estimate Certaintv:
                                            {{$reportdata['estimated_certainty']}}</span>
                                    </div>
                                </div>
                            </div>

                            <div
                                style="{{($type == 'vini' ? 'height: 50px; width: 100%; text-align: center; padding-top: 13px' : 'height: 38px;width: 100%;text-align: center;padding-top: 20px;border: 1px solid #d4d4d4;')}}">
                                {!!$reportdata['des']!!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pagebreak"></div>
                @endif

                @if(count(@$ownercostdata))
                <div class="carSpect mb-3 p-0">
                    <h3>
                        Ownership cost for {{str_ireplace('incomplete','', $title)}}
                    </h3>
                    <div class="carSpectDetail">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="text-center"
                                    style="height: 60px; line-height: 60px; border-bottom: 1px solid; font-size: 18px;">
                                    <strong>Estimated: ${{number_format(@$ownercostdata['total_cost_sum'],0)}} over the
                                        next 5
                                        years</strong>
                                </div>
                                <table class="mb-0 table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Year 1</th>
                                            <th>Year 2</th>
                                            <th>Year 3</th>
                                            <th>Year 4</th>
                                            <th>Year 5</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(@$ownercostdata['categories'] as $_cat)
                                        <tr>
                                            <th>{{$_cat['name']}}</th>
                                            @foreach($_cat['values'] as $val)
                                            <td>${{number_format($val,0)}}</td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row px-sm-4 px-3 pt-4">
                            <!-- column #1 -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-4">
                                <div class="glanceBx">
                                    <div class="align-items-center contBx">
                                        <p><strong>Vehicles:</strong> {{str_ireplace('incomplete','', $title)}}</p>
                                        <p><strong>Mileage:</strong>
                                            {{number_format(@$ownercostdata['mileage_start'], 0)}} mi +
                                            {{number_format(@$ownercostdata['mileage_year'],0)}} mi/year
                                        </p>
                                    </div>
                                    <div class="chekBx">
                                        <h3>Assumptions</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- column #2 -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-4">
                                <div class="glanceBx">
                                    <div class="align-items-center contBx">
                                        <p><strong>5-Year Mileage:</strong>
                                            {{@number_format($ownercostdata['5yr_mileage'],0)}} mi</p>
                                        <p><strong>Cost Per Mile:</strong>
                                            ${{@number_format($ownercostdata['cost_per_mile'], 2)}}</p>
                                    </div>
                                    <div class="chekBx">
                                        <h3>Estimates</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(@$fueldata)
                <div class="carSpect mb-3 p-0">
                    <h3>
                        Fuel Efficiency
                    </h3>
                    <div class="carSpectDetail mt-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">City Mileage:</div>
                                    <div class="decode-data col-md-6 col-12">{{$fueldata['city_mpg']}} miles/gallon
                                    </div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Highway Mileage</div>
                                    <div class="decode-data col-md-6 col-12">
                                        {{($fueldata['highway_mpg'] - 1)  . " - " .$fueldata['highway_mpg']}}
                                        miles/gallon
                                    </div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Fuel Type:</div>
                                    <div class="decode-data col-md-6 col-12">{{$fueldata['fuel_type'] ?? "--"}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagebreak"></div>
                @endif


                {{-- <div class="buyBackInfo mb-3">
                <div class="row">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 my-auto">
                        <div class="text-center mb-lg-0 mb-3">
                            <img src="/normal/images/buy-back.svg" class="buyBackLogo" alt="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8 my-auto pb-lg-0 pb-4">
                        <h4 class="text-sm-start text-center">This vehicle is not eligible for Buyback Protection</h4>
                        <p class="text-sm-start text-center">
                            Due to the vehicle’s history showing no reported major state title brands.
                            <a href="#">Terms & Conditions</a>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 my-auto text-end">
                        <div class="text-sm-end text-center learnBtn ">
                            <a href="#">
                                Learn More
                            </a>
                        </div>
                        <div class="d-sm-none d-block lg-mb-0 mb-3"></div>
                    </div>
                </div>
            </div> --}}

                <div class="vehicledamage mb-3">
                    <h2 class="head">Accident & Damage</h2>
                    <div class="row p-2">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-md-0 mb-3">
                            <div class="damagBx">
                                <img src="/normal/images/accident-car-outline-no-impact.svg" alt="">
                                <div class="row">
                                    <!-- column #1 -->
                                    <div class="col-md-3 col-6">
                                        <img src="/normal/images/accident-airbag-deployed-off.svg" class="damagShortImg"
                                            alt="">
                                        <p>Airbag Deployed</p>
                                    </div>
                                    <!-- column #2 -->
                                    <div class="col-md-3 col-6">
                                        <img src="/normal/images/accident-structural-damage-off.svg"
                                            class="damagShortImg" alt="">
                                        <p>Structural Damage</p>
                                    </div>
                                    <!-- column #3 -->
                                    <div class="col-md-3 col-6">
                                        <img src="/normal/images/accident-overturned-off.svg" class="damagShortImg"
                                            alt="">
                                        <p>Overturned</p>
                                    </div>
                                    <!-- column #4 -->
                                    <div class="col-md-3 col-6">
                                        <img src="/normal/images/accident-severe-off.svg" class="damagShortImg" alt="">
                                        <p>No Damage</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="accident-box-good-msg">
                                <h3 class="header-good">Your Vehicle Checks Out</h3>
                                <p>
                                    Your has not received any accident or damage-related events from government sources,
                                    independent agencies, or auction sources. Not all damage-related events are reported
                                    to Your. It is recommended to have pre-owned vehicles inspected by a third-party
                                    prior to purchase.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="odometerChk mb-3">
                    <h2 class="head">Odometer Check</h2>
                    <div class="p-2">
                        <div class="accident-box-good-msg">
                            <div class="d-md-flex align-items-center">
                                <div class="svgicnBig me-md-3 mx-auto mb-md-0 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                                <div class="w-100">
                                    <h3 class="header-good">Your Vehicle Checks Out</h3>
                                    <p>
                                        Your has not received any accident or damage-related events from government
                                        sources, independent agencies, or auction sources. Not all damage-related events
                                        are reported to Your. It is recommended to have pre-owned vehicles inspected by
                                        a third-party prior to purchase.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <!-- column #1 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-md-0 mb-3">
                                <div class="odometerChkBx">
                                    <div class="svgicnBig mx-auto mb-3 text-center">
                                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="40" height="40">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                    <h4 class="mb-1">State Title Odometer Check</h4>
                                    <p class="mb-0">No issues reported</p>
                                </div>
                            </div>
                            <!-- column #2 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-md-0 mb-3">
                                <div class="odometerChkBx">
                                    <div class="svgicnBig mx-auto mb-3 text-center">
                                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="40" height="40">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                    <h4 class="mb-1">Auction Odometer Check</h4>
                                    <p class="mb-0">No issues reported</p>
                                </div>
                            </div>
                            <!-- column #3 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-md-0 mb-3">
                                <div class="odometerChkBx">
                                    <div class="svgicnBig mx-auto mb-3 text-center">
                                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="40" height="40">
                                            <path
                                                d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                                fill="#fff"></path>
                                        </svg>
                                    </div>
                                    <h4 class="mb-1">Odometer Calculation Check</h4>
                                    <p class="mb-0">No issues reported</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ownerHistory mb-3">
                    <h2 class="head">Detailed Vehicle History</h2>
                    <div class="p-2">
                        <div class="accident-box-good-msg text-center mb-3">
                            <p class="mb-2">
                                Below are the historical events for this vehicle listed in chronological order.
                            </p>
                            <p>
                                <b>Vehicle:</b> {{str_ireplace('incomplete','',$title)}} ({{$vindata['VIN']}}) <b>Report
                                    Run Date:</b> {{now()}}
                            </p>
                        </div>
                    </div>
                </div>
                @foreach($ratings as $rat)
                <div class="vehcleGetHead vehicleRat mb-3">
                    <h2 class="head">{{$rat['VehicleDescription']}}</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Vehicle Id:</div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['VehicleId']}}</div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Overall Rating:</div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['OverallRating']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Overall Front Crash Rating: </div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['OverallFrontCrashRating']}}
                                </div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Front Crash Driver side Rating:</div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['FrontCrashDriversideRating']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Front Crash Passenger side Rating: </div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['FrontCrashPassengersideRating']}}</div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Overall Side Crash Rating: </div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['OverallSideCrashRating']}}
                                </div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Side Crash Driver side Rating: </div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['SideCrashDriversideRating']}}</div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Side Crash Passenger side Rating: </div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['SideCrashPassengersideRating']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Combined Side Barrier And Pole RatingFront:
                                </div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['combinedSideBarrierAndPoleRating-Front']}}</div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Combined Side Barrier And Pole Rating:</div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['combinedSideBarrierAndPoleRating']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Side Barrier Rating-Overall:</div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['sideBarrierRating-Overall']}}</div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Rollover Rating: </div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['RolloverRating']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Rollover Possibility:</div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['RolloverPossibility']}}
                                </div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">MDynamic Tip Result: </div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['dynamicTipResult']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Side Pole Crash Rating: </div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['SidePoleCrashRating']}}
                                </div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Electronic Stability Control:</div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['NHTSAElectronicStabilityControl']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Rollover Rating: </div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['RolloverRating']}}</div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Forward Collision Warning:</div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['NHTSAForwardCollisionWarning']}}</div>
                            </div>
                            <div class="decode-box-row row odd">
                                <div class="col-md-6 col-12 decode-label">Lane Departure Warning: </div>
                                <div class="decode-data col-md-6 col-12">
                                    {{@$rat['rating']['NHTSALaneDepartureWarning']}}</div>
                            </div>
                            <div class="decode-box-row row">
                                <div class="col-md-6 col-12 decode-label">Investigation Count: </div>
                                <div class="decode-data col-md-6 col-12">{{@$rat['rating']['InvestigationCount']}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="vehcleGetHead mb-3">
                    <div class="row px-sm-4 px-3 pt-4">
                        <!-- column #1 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>Salvage Information </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #2 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>SInsurance Records </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #3 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>Title History Information </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #4 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>Odometer events </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #5 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>Auction Sales Information </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #6 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>Lien / Impound / Export Records </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #7 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>Detailed History </h4>
                                <div class="svgicnerror">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                        fill="rgba(255,255,255,1)">
                                        <path
                                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 15V17H13V15H11ZM11 7V13H13V7H11Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vehcleGetHead mb-3">
                    <h2 class="head">Title Brand Information</h2>

                    <div class="row px-sm-4 px-3 pt-4">
                        <p class="pb-4">
                            Brands are lables used to describe the status of a motor vehicle such as "junk" , "salvage"
                            , or
                            "flood". Statuses from states are mapped to brands for consistency within the system.
                        </p>
                        <!-- column #1 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>AGRICULTURAL VEHICLE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #2 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>VANDALISM </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #3 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ANTIQUE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #4 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>BOND POSTED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #5 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>CLASSIC </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #6 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>COLLISION </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #7 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>DISCLOSED DAMAGE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #8 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>DISMANTLED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #9-->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>COLLISION </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #10 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>EXPORT ONLY VEHICLE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #11 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>FIRE DAMAGE
                                </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #12 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>FLOOD DAMAGE
                                </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #13 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>FORMER RENTAL </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #14 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>GRAY MARKET </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #15 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>GRAY MARKET COMPLIANT </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #16 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>GRAY MARKET NON-COMPLIANT </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- column #17 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>HAIL DAMAGE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #18 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>HAZARDOUS SUBSTANCE
                                    CONTAMINATED VEHICLE
                                </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #19 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>JUNK </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #20 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>COLLISION </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #21 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>KIT </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #22 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>LOGGING VEHICLE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #23-->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>MANUFACTURER BUY BACK </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #24 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>MEMORANDUM COPY </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #25 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: ACTUAL </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #26 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: CALLTITLEDIVISION </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #27 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: DISCREPANCY </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #28 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: EXCEEDS
                                    MECHANICAL LIMITS </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #29 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: EXCEEDS
                                    MECHANICAL LIMITS RECTIFIED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #30 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: EXEMPT FROM
                                    ODOMETER DISCLOSURE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #31 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: MAYBE ALTERED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #32 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: NOT ACTUAL </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #33 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: READING AT TIME OF
                                    RENEWAL </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #34 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: REPLACED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #35 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: TAMPERING VERIFIED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #36 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ORIGINAL POLICE </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #37 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ORIGINAL TAXI </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #38 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>OWNER RETAINED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #39 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: ACTUAL </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #40 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: CALLTITLEDIVISION </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #41 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: DISCREPANCY </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- column #42 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: EXCEEDS
                                    MECHANICAL LIMITS </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #43 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: EXCEEDS
                                    MECHANICAL LIMITS RECTIFIED
                                </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #44 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: EXEMPT FROM
                                    ODOMETER DISCLOSURE
                                </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #45 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: MAYBE ALTERED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #46 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: NOT ACTUAL </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #47 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: READING AT TIME OF
                                    RENEWAL </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #48 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: REPLACED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #49 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ODOMETER: TAMPERING VERIFIED </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- column #50 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ORIGINAL POLICE
                                </h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z"
                                            fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- column #7 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                            <div class="genCheckBx">
                                <h4>ORIGINAL TAXI</h4>
                                <div class="svgicn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                        fill="rgba(255,255,255,1)">
                                        <path
                                            d="M10.0007 15.1709L19.1931 5.97852L20.6073 7.39273L10.0007 17.9993L3.63672 11.6354L5.05093 10.2212L10.0007 15.1709Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @isset($recalldata)
                @foreach ($recalldata['results'] as $recall)
                <div class="vehcleGetHead recallInfo mb-3">
                    <h2 class="head">Recall Info</h2>
                    <div class="p-2">
                        <div class="row mt-2">
                            <div class="col-md-3 col-12">
                                <h3>Report Receipt Date:</h3>
                            </div>
                            <div class="col-md-9 col-12">
                                <h4>{{@$recall['ReportReceivedDate']}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <h3>Manufacturer:</h3>
                            </div>
                            <div class="col-md-9 col-12">
                                <h4>{{@$recall['Manufacturer']}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <h3>Recall No:</h3>
                            </div>
                            <div class="col-md-9 col-12">
                                <h4>{{@$recall['NHTSACampaignNumber']}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <h3>Component(s):</h3>
                            </div>
                            <div class="col-md-9 col-12">
                                <h4>{{@$recall['Component']}}</h4>
                            </div>
                        </div>
                        <div class="accident-box-good-msg mt-3">
                            <h3 class="header-good">SUMMARY</h3>
                            <p>
                                {{@$recall['Summary']}}
                            </p>
                        </div>
                        <div class="accident-box-good-msg mt-3">
                            <h3 class="header-good">CONSEQUENCE</h3>
                            <p>
                                {{@$recall['Conequence']}}
                            </p>
                        </div>
                        <div class="accident-box-good-msg mt-3">
                            <h3 class="header-good">REMEDY</h3>
                            <p>
                                {{@$recall['Remedy']}}
                            </p>
                        </div>
                        <div class="accident-box-good-msg mt-3">
                            <h3 class="header-good">NOTES</h3>
                            <p>
                                {{@$recall['Notes']}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset

                {{-- <div class="vehcleGetHead mb-3">
                <h2 class="head">Detailed Vehicle History</h2>
                <div class="row p-2"></div>
            </div> --}}
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </body>

</html>
