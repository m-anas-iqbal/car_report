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
    
        <div class="report_details_new" style="border:1px solid #000; padding:10px;">
            <table style="width:100%; margin-top: 20px;">
                <tr >
                    <td style="text-align:center;position:relative;width:100%;">
                        <h3 style="margin-bottom:20px;">Market Value for 2008 Toyota Sequoia Limited</h3>
                        <img style="margin-top:30px;" width="600px" src="{{asset('uploads/graph-full.jpeg')}}" alt="">
                        <div style="position: absolute;width: 95px; height: 30px;top: 165px;left: 89px; background: #f8f8f8; ">
                            <span style="font-size: 13px;margin-top:50px;">Below Market</span><br>
                            <span style="font-size: 12px;">$10,188 or less</span>
                        </div>
                        <div style="position: absolute;width: 95px; height: 30px;top: 73px;left: 286px; background: #f8f8f8; ">
                            <span style="font-size: 13px;margin-top:50px;">Market Average</span><br>
                            <span style="font-size: 12px;">$10,188</span>
                        </div>
                        <div style="position: absolute;width: 100px; height: 30px;top: 165px;right: 93px; background: #f8f8f8; ">
                            <span style="font-size: 13px;margin-top:50px;">Above Market</span><br>
                            <span style="font-size: 12px;">$10,188 or more</span>
                        </div>
                    
                    </td>    
                </tr>
                <tr style="text-align:center;position:relative;width:100%;">
                    <td style="font-size: 13px;margin-top:50px;">
                        Estimates based on 193 similar vehicles sold between lul 13. 2023 - Nov 09. 2023
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid; margin-top:10px"></td>
                </tr>
                <tr>
                    <table style="width:80%; margin-top:20px; margin-left: 50px;">
                        <tr>
                            <td>
                                <span style="font-size: 13px; font-weight:600px;">ASSUMPTIONS</span><br>
                                <span style="font-size: 12px;">Current Mileage: 186,012 miles</span><br>
                                <span style="font-size: 12px;">Time Period: Past 6 months</span>
                            </td>
                            <td>
                                <span style="font-size: 13px; font-weight:600px;">ESTIMATES</span><br>
                                <span style="font-size: 12px;">Market Value: $10.188 - $15.973</span><br>
                                <span style="font-size: 12px;">Estimate Certaintv: 99%</span>
                            </td>
                            
                        </tr>
                    </table>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
