<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet"> 
    <title>Data My Autoz</title>
    <style>
	body{
		max-width: 1024px;
		margin: auto;
		font-family: 'Nunito', sans-serif;
		line-height:1;
	}
	table{
		width: 100%;
	}
	ul{
		list-style: none;
		padding:0;
		margin: 0;
	}
	ul li{
		
	}
	.page-break {
        page-break-after: always;
    } 
	</style>
</head>
<body>
    <div class="container">
        <div class="logo">
			<table>
				<tr style="text-align:left;">
					<td> <span style="float: left; font-size: 26px; font-weight:900;position: relative;top:10px;color: #182C53">AUTOREPORTS<b style="color: #F57615; font-weight:900;">LIVE</b></span> </td>
					<td style="text-align: right;"><img src="{{asset('images/nmvtis-logo.jpg')}}" alt="" width="120" > </td>
				</tr>
			</table>
        </div> 
        <h2 style="background: #EDEDED;padding: 15px;border-left: 10px solid #F57615;">Vehicle History Report for VIN# {{$vin}}</h2>
        <div>
            
       
        </div>
		
		<table>
			<tr>
				<td style="width: 220px;">
					<img src="{{asset('images/report_car_placeholder.png')}}" alt="" style="width: 200px;border: 1px solid #ddd;margin-right: 30px;">
				</td>
				<td style="vertical-align: top;">
					 <ul class="report_info">
						<!-- <li style="color: black;font-size: 22px;font-weight: 700;">{{strip_tags($vehicle)}}</li> -->
						<li style="color: black;font-size: 22px;font-weight: 700;">{{$title}}</li>
						<li>Report ID: <span>{{$report_id}}</span></li>
						<li>Date Generated: <span>{{date('d-m-Y')}}</span></li>
						<li>Style: <span>{{$body}}</span></li>
						<li>Made In: <span>{{$plant_country}}</span></li> 
						<li>Make / Model: <span>{{$make }} / {{$vehicle}}</span></li>
					</ul>
				</td>
			</tr>
		</table>
        

        <div class="report_details_new"> 
			<table style="width:100%; margin-top: 20px;">
				<tr>
					<td style="text-align: center; height: 190px; background: #F5F5F5; border: 2px solid white; position:relative;width:25%;">
						<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0; left:10px;">
						<img src="{{asset('images/report_icons/junk.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
							<span style="font-size: 12px;margin-top:50px;">Junk Salvage Information</span><br>
							<span style="font-size: 12px;">0 record(s) found</span>
						</div>
					</td> 
					<td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white; position:relative;width:25%;">
						<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						<img src="{{asset('images/report_icons/insurance.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
							<span style="font-size: 12px;margin-top:50px;">Insurance Information</span><br>
							<span style="font-size: 12px;">0 record(s) found</span>
						</div>
					</td> 
					<td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
						<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						<img src="{{asset('images/report_icons/title_history.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">							
							<span  style="font-size: 12px;margin-top:50px;">Title History</span><br>
							<span  style="font-size: 12px;">0 record(s) found</span>
						</div>
					</td> 
					<td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
						<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						<img src="{{asset('images/report_icons/odometer.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">							
							<span  style="font-size: 12px;">Odometer events</span><br>
							<span  style="font-size: 12px;">0 record(s) found</span>
						</div>
					</td> 
				</tr>
				<tr>
					<td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
						<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						<img src="{{asset('images/report_icons/title_brands.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div  style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
							<span style="font-size: 12px;">Title Brands</span><br>
							<span  style="font-size: 12px;">0 record(s) found</span>
						</div>
					</td> 
					<td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
						<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						<img src="{{asset('images/report_icons/owners.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div  style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
							
							<span style="font-size: 12px;">Ownership History</span><br>
							<span  style="font-size: 12px;">0 record(s) found</span>
						</div>
					</td> 
					<td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
						<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						<img src="{{asset('images/report_icons/lient.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div  style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
							
							<span style="font-size: 12px;">Lien Records</span><br>
							<span style="font-size: 12px;">0 record(s) found</span>
						</div>
					</td> 
					<td style="text-align: center;height: 190px;background: #F5F5F5;border: 2px solid white;position:relative;width:25%;">
						@if(isset($recalls))
							<img src="{{asset('images/exclamation-mark.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						@else
							<img src="{{asset('images/tick.png')}}" alt="" class="status" style="position: absolute; width: 25px; top: 10px; margin: 0;left:10px;">
						@endif
						<img src="{{asset('images/report_icons/recalls.png')}}" alt="" style="width: 60px;margin: auto; display:block; position: absolute;left: 50px; top:25px">
						<div  style="position: absolute;width: 100%;height: 100%;top: 100px;left: 0;">
							
							<span>Recalls</span><br>
							@if(isset($recalls))
							<span style="font-size: 12px;">{{$recalls->Count}} record(s) found</span>
							@else
							<span style="font-size: 12px;">0 record(s) found</span>
							@endif
						</div>
					</td> 
				</tr> 
			</table> 
        </div> 
        <div class="page-break"></div>
        <br>
        <div class="report_details mt-50">
            <h2 style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Vehicle Specifications</h2>
			<table>
				<tr>
					<td style="width:25%;">VIN:</td>
					<td style="width:25%;"><strong>{{$vin}}</strong></td>
				</tr>
				<tr>				
					<td style="width:25%;">Year:</td>
					<td style="width:25%;">{{$year}}</td>
				</tr>
				<tr>
					<td style="width:25%;">Make:</td>
					<td style="width:25%;"><strong>{{$make}}</strong></td>
				</tr>
				<tr>
					<td style="width:25%;">Model:</td>
					<td style="width:25%;">{{$vehicle}}</td>
				</tr>
				<tr>
					<td style="width:25%;">Trim:</td>
					<td style="width:25%;"><strong> {{$trim}}</strong></td> 
				</tr>
				<tr>
					<td style="width:25%;">Engine:</td>
					<td style="width:25%;"><strong>{{$engine}}</strong></td>
				</tr>
				<tr>
					<td style="width:25%;">Style:</td>
					<td style="width:25%;">{{$body}}</td>
				</tr>
				<tr>
					<td style="width:25%;">Made In:</td>
					<td style="width:25%;"><strong>{{$plant_country}}</strong></td>
				</tr>
				<tr>
					<td style="width:25%;">Steering Type:</td>
					<td style="width:25%;">{{$driveline}}</td>
				</tr>
				<tr>
					<td style="width:25%;">Anti Brake System:</td>
					<td style="width:25%;"><strong>{{$abs}}</strong></td>
				</tr>  
				<tr>
					<td style="width:25%;">Standard Seating:</td>
					<td style="width:25%;"><strong>{{$seating}}</strong></td>
				</tr> 
			</table> 
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Salvage Information</h2>
			<table style="color: green">	
				<tr>
					<td>No Records Found</td>
					<td><i class="fas fa-check-circle"></i>  </td>
				</tr>
			</table> 
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Insurance Records</h2>
            <table style="color: green">	
				<tr>
					<td>No Records Found</td>
					<td><i class="fas fa-check-circle"></i>  </td>
				</tr>
			</table> 
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Title History Information</h2>
            <table style="color: green">	
				<tr>
					<td>No Records Found</td>
					<td><i class="fas fa-check-circle"></i>  </td>
				</tr>
			</table> 
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Odometer events</h2>
            <table style="color: green">	
				<tr>
					<td>No Records Found</td>
					<td><i class="fas fa-check-circle"></i>  </td>
				</tr>
			</table> 
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Title Brand Information</h2>
			<table>
				<tr >
					<th colspan="2" style="text-align:left;">Clear</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Flood damage </th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Fire damage</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Hail damage</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Salt water damage</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Vandalism</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Kit</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Dismantled</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Junk</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Rebuilt</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Reconstructed</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<div class="page-break"></div>
			<h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Title Brand Information</h2>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Salvage</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Test Vehicle</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Refurbished</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Collision</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Reserved</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Salvage Retention</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Prior Taxi</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Prior Police</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Original Taxi</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Original Police</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Remanufactured</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<div class="page-break"></div>
			<h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Title Brand Information</h2>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Gray Market</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Warranty Return</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Antique</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Classic</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Agricultural Vehicle</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Logging Vehicle</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Street Rod</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Vehicle Contains Reissued VIN</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Replica</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Totaled</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<div class="page-break"></div>
			<h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Title Brand Information</h2>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Owner Retained</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Bond Posted</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Memorandum Copy</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Parts Only</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Recovered Theft</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Undisclosed Lien</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Prior Owner Retained</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Vehicle Non-conformity Uncorrected</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Vehicle Non-conformity Corrected</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Vehicle Safety Defect Uncorrected</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<div class="page-break"></div>
			<h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Title Brand Information</h2>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Vehicle Safety Defect Corrected</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">VIN replaced by a new state assigned VIN</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Former Rental</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Salvage--Stolen</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Salvage--Reasons Other Than Damage or Stolen</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Disclosed Damage</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Export only vehicle</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Crushed</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Hazardous substance</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Actual</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Not Actual</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<div class="page-break"></div>
			<h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Title Brand Information</h2>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Exempt from Odometer Disclosure</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Exceeds Mechanical Limits</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Odometer may be Altered</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Odometer Replaced</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Reading at Time of Renewal</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Odometer Discrepancy</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Call Title Division</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Rectify Previous Exceeds Mechanical Limits Brand</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Pending Junk</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table>
			<table style="margin-top: 20px;">
				<tr >
					<th colspan="2" style="text-align:left;">Junk Automobile</th>
				</tr>
				<tr style="color: green;">
					<td style="width: 50%;">No Records Found</td>
					<td style="text-align: right;width: 50%;"><i class="fas fa-check-circle" style="float: right;"></i>  </td>
				</tr>
			</table> 
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Auction Sales Information</h2>
            <table style="color: green">	
				<tr>
					<td>No Records Found</td>
					<td><i class="fas fa-check-circle"></i>  </td>
				</tr>
			</table>
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Lien / Impound / Export Records</h2>
            <table style="color: green">	
				<tr>
					<td>No Records Found</td>
					<td><i class="fas fa-check-circle"></i>  </td>
				</tr>
			</table>
        </div>
        <div class="page-break"></div>
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Detailed History</h2>
            <table style="color: green">	
				<tr>
					<td>No Records Found</td>
					<td><i class="fas fa-check-circle"></i>  </td>
				</tr>
			</table>
        </div>
        <div class="page-break"></div>
		@isset($recalls)
        <div class="report_details mt-50">
            <h2  style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Recalls</h2>
            @foreach ($recalls->Results as $recall)
            <h4 style="background: #EDEDED;padding: 15px;border-left: 10px solid #182C53;">Recall Info:</h4>
                <ul>
                    <li>
                        <span  >
                            Report Receipt Date:
                        </span>
                        <span  >
                            Jul 2, 2013
                        </span>
                    </li>
                    <li>
                        <span  >
                            Manufacturer:
                        </span>
                        <span  >
                            {{$recall->Manufacturer}}
                        </span>
                    </li>
                    <li>
                        <span  >
                            Recall No:
                        </span>
                        <span  >
                            {{$recall->NHTSACampaignNumber}}
                        </span>
                    </li>
                    <li>
                        <span  >
                            Component(s):
                        </span>
                        <span  >
                            {{$recall->Component}}
                        </span>
                    </li>
                </ul>
                <div class="summary" style="margin-bottom: 50px">
                    <p>SUMMARY</p>
                    <p>{{$recall->Summary}}</p>
                    <br>
                    <p>CONSEQUENCE</p>
                    <p>{{$recall->Conequence}}</p>
                    <br>
                    <p>REMEDY</p>
                    <p>{{$recall->Remedy}}</p>
                    <br>
                    <p>NOTES</p>
                    <p>{{$recall->Notes}}</p>
                </div> 
				<div class="page-break"></div>
            @endforeach
            
        </div>
		@endisset
        
    </div>
</body>
</html>