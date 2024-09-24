<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name') }}.</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://www.vinenterinfo.com/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.vinenterinfo.com/css/all.min.css">
        <link rel="stylesheet" href="https://www.vinenterinfo.com/css/style.css">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            .container-fluid{
                padding-top: 50px;
                max-width: 1080px;
            }
            .main-title{
                font-size: 32px;
                font-weight: 700;
                line-height: 36px;
                margin-bottom: 0; 
            }
            .reportgendate{
                font-size: 70%;
                margin-left: 10px;
            }
            .pblue{
                color: #004990;
            }
            .gbg{
                background-color: #F4F4F4;
                
            }
            .tophero{
                border-radius: 15px 15px 15px 15px;
            }
            .pbluebg{
                background-color: #035aa6;
            }
            .vinfo_card{
                padding: 14px;
                background: #fff;
                border-radius: 15px 15px 15px 15px;
                box-shadow: 1px 2px 4px rgba(0,0,0,.5);
                min-height: 165px;
            }
            .vinfo_card h1{
                font-size: 17px;
                line-height: 20px;
                font-weight: 700;
                margin-bottom: 0;
            }
            .vinfo_card h3{
                font-size: 17px;
                line-height: 22px;
                margin-bottom: 0;
            }
            .vinfo_card ul{
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .vinfo_card ul li{
                font-size: 14px;
            }
            .vinfo_card ul li span{
                font-weight: 700;
                color: #000;
                min-width: 30%;
                display: block;
                clear: both;
                float: left;
            }
            .vinfo_card{}
            .vinfo_card p{
                font-size: 14px;
                line-height: 19px;

            }
            .float-left {
                float: left !important;
            }
            .bgtitle{
                background-color: #035aa6;
                text-align: center;
            }
            .bgtitle h1{
                margin-bottom: 0;
                font-size: 24px;
                line-height: normal;
                color: #d4dae4;
            }
            .repsecbox{
                background: #f4f4f4;
                border-radius: 15px 15px 15px 15px;
                border: 1px solid #dee2e6 !important;
                margin-top: 65px;
            }
            .repsecbox .repsecboxhead{
                background: #D8E1EF;
                text-align: center;
                border-radius: 15px 15px 0 0;
                width: 50%;
                height: 50px;
                font-size: 16px;
                margin: auto;
                margin-top: -50px;
            }
            .repsecbox .repsecboxhead h1{
                font-size: 16px;
                color: #2f63a0;
                padding-top: 10px;
                margin: 0;
            }
            .repsecbox .repsecboxhead p{ 
                font-size: 11px;
                color: #242424;
                margin-bottom: 0;
            }
            .repsecbox .repsecboxbody{
                padding: 12px;
            }
            .repsecbox .repsecboxbody ul{
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .repsecbox .repsecboxbody ul li{
                border-bottom: 3px solid #fff;
                padding-top: .55em;
                padding-bottom: .55em;
            }
            .repsecbox .repsecboxbody ul li img{
                width: 32px;
            }
            .single_heading .repsecboxhead h1{
                padding-top: 15px;
            }
            .repsecbox .repsecboxbody .owner_numbers{
                position: relative;
                top: 35px;
                left: -198px;
                font-weight: bold;
            }
            .repsecbox .repsecboxbody .owner_numbers i{
                color: #004990;
            }
            .repsecinnerheading{
                display: flex;
            }
            .repsecinnerheading img.ficon{
                width: 32px;
                margin-top: 0;
                align-self: self-start;
            }
            .repsecinnerheading h1.heading {
                font-size: 16px;
                font-weight: bold;
                margin-left: 15px;
                align-self: self-start;
                margin-top: 5px;
            }
            .repsecinnerheading img.licon {
                width: 130px;
                margin: auto;
                margin-right: 0;
            }
            .repsecboxbody .usage_list{
                margin-top: 25px !important;
                font-size: 13px;
                margin-left: 25px !important;
            }
            .repsecboxbody .usage_list li{
                display: inline-block;
                border-bottom: 0px !important;
                border-right: 1px solid #aaa;
                padding-top: 0px !important;
                padding-bottom: 0px !important;
                padding-right: 10px;
                padding-left: 10px;
            }
            .repsecboxbody .usage_list li:last-child{
                border-right: 0px solid #aaa;
            }
            .repsecboxbody .usage_list li.active{
                color: #004990;
                font-weight: bold;
            }
            .repsecbox.details_heading{
                background: #fff;
                border-radius: 0px 0px 15px 15px;
                border: 1px solid #dee2e6 !important;
                margin-top: 65px;
            }
            .repsecbox.details_heading .repsecinnerheading h1.heading{
                font-weight: normal;
            }
            .repsecbox.details_heading .repsecinnerheading h1.heading span.red{
                font-weight: bold;
                color: #BE001C;
            }
            .repsecbox.details_heading .repsecinnerheading h1.heading span.green{
                font-weight: bold;
                color: #49ac42;
            }
            .repsecbox.details_heading .repsecboxhead{
                background-color: #982881; 
                width: 100%;
                color: white;
                display: flex;
                padding-left: 10px;
            }
            .repsecbox.details_heading .repsecboxhead img{
                width: 32px;
                margin-right: 15px;
            }
            .repsecbox.details_heading .repsecboxhead h1{
                color: white;
                font-weight: bold;
                font-size: 18px;
            }
            .repsecboxbody table{
                margin: auto;
            }
            .repsecboxbody table th{
                padding: 10px;
            }
            .repsecboxbody table td{
                padding: 10px;
                text-align: center;
                border-top: 1px solid #eee;
            }
            .repsecboxbody table td + td {
                text-align: left;
            }
            .repsecboxbody table td img{
                width: 24px;
            }
            .repsecboxbody table td span{}
            .repsecboxbody table td span.red{
                color: #BE001C;
                font-weight: bold;
            }
        </style>
    </head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="main-title pblue fw-bolder">Vehicle History Report</h1>
                <span class="reportgendate">Report run: 11/27/2022</span>
            </div>
            <div class="col-12 gbg tophero p-2" style="background: #F4F4F4;">
                <div class="row">
                    <div class="col-6">
                        <div class="vinfo_card">
                            <h1 class="pblue">2015Acura TLX Base 3.5L</h1>
                            <h3 class="pblue">Sedan 4D(3.5L V6 DI)</h3>
                            <ul>
                                <li>
                                    <span>VIN </span>: 19UUB2F31FAXXXXXX
                                </li>
                                <li>
                                    <span>Class </span>: Upscale - Near Luxury
                                </li>
                                <li>
                                    <span>Country of Assembly </span>: United States
                                </li>
                                <li>
                                    <span>Vehicle Age </span>: 3 year(s)
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="vinfo_card">
                            <h1 class="pblue" style="font-size: 16px;">This vehicle is not eligible for Buyback Protection</h1>
                             <div class="float-left badge" >
                                <img src="/images/buyback-does-not-qualify.svg" alt="" width="80px">
                             </div>
                             <div class="">
                                 <p class="card-text">
                                    Due to the vehicle's history showing major
                                    <a href="/vehiclehistory/title-brands" class="" target="_blank">state title brand(s)</a>and/or not meeting other Buyback Protection terms and
                                    conditions.
                                 </p>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="bgtitle" style="background: #035aa6;">
                    <h1>YOUR VEHICLE AT A GLANCE</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox">
                    <div class="repsecboxhead">
                        <h1>Report sections</h1>
                        <p>Click a section to learn more</p>
                    </div>
                    <div class="repsecboxbody">
                        <ul>
                            <li><img src="/images/alert-icon.svg" alt=""> State Title Brand Reported</li>
                            <li><img src="/images/alert-icon.svg" alt=""> Accident Reported(1)</li>
                            <li><img src="/images/alert-icon.svg" alt=""> Other Damage Reported</li>
                            <li><img src="/images/alert-icon.svg" alt=""> Other Title Brand or Specific Event Reported</li>
                            <li><img src="/images/alert-icon.svg" alt=""> Odometer Problem(s) Reported</li>
                            <li><img src="/images/alert-icon.svg" alt=""> No Open Safety Recall(s) Reported</li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading">
                    <div class="repsecboxhead">
                        <h1>Number of Owners</h1>
                    </div>
                    <div class="repsecboxbody text-center">
                        <img src="/images/owners-multiple.svg" alt="" style="width: 360px; margin: auto;margin-left: 198px;">
                        <span class="owner_numbers">Calculated Owners: <i>2</i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading">
                    <div class="repsecboxhead">
                        <h1>Vehicle Usage</h1> 
                    </div>
                    <div class="repsecboxbody">
                        <div class="repsecinnerheading">
                            <img src="/images/info-icon.svg" class="ficon">
                            <h1 class="heading">Vehicle Use: There is indication of the below usage(s) for this vehicle</h1>
                             
                        </div>
                        <ul class="usage_list">
                            <li>Personal</li>
                            <li>Fleet</li>
                            <li>Rental</li>
                            <li class="active">Lease</li>
                            <li>Taxi</li>  
                            <li>Livery</li>  
                            <li>Police</li>  
                            <li>Government</li>  
                            <li>Drivers Ed</li>  
                            <li>Commercial</li>     
                        </ul>                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading details_heading">
                    <div class="repsecboxhead">
                        <img src="/images/heading-major-state-title.svg" class="ficon">
                        <h1> Major state title brand check</h1> 
                    </div>
                    <div class="repsecboxbody">
                        <div class="repsecinnerheading">
                            <img src="/images/info-icon.svg" class="ficon">
                            <h1 class="heading">
                                <span class="red">Major state title brand Reported:</span>  One or more state title brands have been reported by the state Division of Motor Vehicles (DMV). 
                            </h1>
                            
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>4 Problem(s) Reported </th>
                                    <th>Major State Title Checked</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No fire brand
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No hail, flood brand
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/alert-icon.svg" alt="">
                                    </td>
                                    <td>
                                        <span class="red">Junk or scrapped brand</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No manufacturer buyback
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No manufacturer buyback
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No lemon brand
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/alert-icon.svg" alt="">
                                    </td>
                                    <td>
                                        <span class="red">Salvage brand</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/alert-icon.svg" alt="">
                                    </td>
                                    <td>
                                        <span class="red">Rebuilt or rebuildable brand</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/alert-icon.svg" alt="">
                                    </td>
                                    <td>
                                        <span class="red">Odometer brand (EML or NAM)</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading details_heading">
                    <div class="repsecboxhead">
                        <img src="/images/heading-accident-check.svg" class="ficon">
                        <h1>  Accident check</h1> 
                    </div>
                    <div class="repsecboxbody">
                        <div class="repsecinnerheading">
                            <img src="images/info-icon.svg" class="ficon">
                            <h1 class="heading">
                                <span class="red">Accidents Reported:</span>  
                                There were 1 accident(s) reported from government sources and independent agencies for this vehicle. Not all accidents/issues are reported to Us.
                            </h1>
                            <img src="/images/accident-found.svg" alt="" class="licon">
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Accident Number </th>
                                    <th>Date of Accident</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        08/01/2015
                                    </td>
                                    <td>
                                        HI
                                    </td>
                                </tr>
                                
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading details_heading">
                    <div class="repsecboxhead">
                        <img src="/images/heading-damage-check.svg" class="ficon">
                        <h1>   Damage check                        </h1> 
                    </div>
                    <div class="repsecboxbody">
                        <div class="repsecinnerheading">
                            <img src="/images/info-icon.svg" class="ficon">
                            <h1 class="heading">
                                <span class="red">Damage Reported:</span>  
                                One or more damage-related events from an auction or independent source have been reported for this vehicle. It is recommended that you get a third-party inspection prior to purchase. Please also check the report to see if there were subsequent repairs made. 
                            </h1>
                            <img src="/images/damage-found.svg" alt="" class="licon">
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>1 Problem(s) Reported </th>
                                    <th>Other Problem Areas Checked:</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No non-title fire damaged record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No non-title hail or flood damaged record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No auction junk or scrapped record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No auction rebuilt or rebuildable record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No salvage auction record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/alert-icon.svg" alt="">
                                    </td>
                                    <td>
                                        <span class="red">Damaged or major damage incident record</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No frame or structural damage record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No recycling facility record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No crash test record
                                    </td>
                                </tr>
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading details_heading">
                    <div class="repsecboxhead">
                        <img src="/images/heading-major-state-title.svg" class="ficon">
                        <h1>   Other title brand and specific event check</h1> 
                    </div>
                    <div class="repsecboxbody">
                        <div class="repsecinnerheading">
                            <img src="/images/info-icon.svg" class="ficon">
                            <h1 class="heading">
                                <span class="red">Problem Reported:</span>  
                                One or more non-major state title brands and/or additional significant event have been reported to AutoCheck. It is recommended to have pre-owned vehicles inspected by a third party prior to purchase.
                            </h1>
                            <img src="/images/accident-found.svg" alt="" class="licon">
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>2 Event(s) Reported </th>
                                    <th>Vehicle events checked:</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="/images/alert-icon.svg" alt="">
                                    </td>
                                    <td>
                                        <span class="red">Insurance Loss record</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No Titled to an insurance company record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No Auction Lemon/Manufacturer Buyback record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No abandoned title record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No grey market title record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No loan/lien record(s)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No repossessed record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/info-icon.svg" alt="">
                                    </td>
                                    <td>
                                        Corrected title record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No duplicate title record
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        No theft record
                                    </td>
                                </tr>
                                
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading details_heading">
                    <div class="repsecboxhead">
                        <img src="/images/heading-odometer-check.svg" class="ficon">
                        <h1>Odometer check</h1> 
                    </div>
                    <div class="repsecboxbody">
                        <div class="repsecinnerheading">
                            <img src="/images/info-icon.svg" class="ficon">
                            <h1 class="heading">
                                <span class="red">Problem Reported:</span>  
                                One or more odometer problems have been reported to AutoCheck by the state Division of Motor Vehicles (DMV) or auction sources OR there is a potential odometer discrepancy when AutoCheck examined the sequence of reported odometer readings. 
                            </h1>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>0 Problem(s) Reported </th>
                                    <th>Mileage</th>
                                    <th>Date Reported</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        05/07/2015
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/images/check-icon.svg" alt="">
                                    </td>
                                    <td>
                                        4,432
                                    </td>
                                    <td>
                                        09/23/2015
                                    </td>
                                </tr>
                                
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="repsecbox single_heading details_heading">
                    <div class="repsecboxhead">
                        <img src="/images/heading-recall.svg" class="ficon">
                        <h1>Open safety recall check</h1> 
                    </div>
                    <div class="repsecboxbody">
                        <div class="repsecinnerheading">
                            <img src="/images/check-icon.svg" class="ficon">
                            <h1 class="heading">
                                <span class="green">Your Vehicle Checks Out:</span>  
                                AutoCheck found no open safety recalls reported by the vehicle manufacturer. 
                            </h1>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
             
             
            <div class="col-12 mt-2">
                <div class="bgtitle" style="background: #035aa6;">
                    <h1> Detailed Vehicle History</h1>
                </div>

                <div class="p-5">
                    <p>Below are the historical events for this vehicle listed in chronological order. Any discrepancies will be in bold text. </p>
                    <p><strong>Report Run Date:</strong> 11/27/20XX 18:49PM EST</p>
                    <p><strong>Vehicle:</strong> 2015AcuraTLX Base 3.5L ( 19UUB2F31FAXXXXXX) </p>
                </div>
            </div>
        </div>
 
    </div>
</body> 
</html>