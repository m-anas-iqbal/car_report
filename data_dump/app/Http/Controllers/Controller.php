<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PDF;
use App\Models\Reports;
use App\Models\Setting;
use DOMDocument;
use DOMXPath;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRecallsData($data)
    {
        try {
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                ]
            ];

            $apiURL  = "https://api.nhtsa.gov/recalls/recallsByVehicle?make=" . $data['make'] . "&model=" . $data['model'] . "&modelYear=" . $data['year'];
            $context = stream_context_create($opts);
            $fp      = @fopen($apiURL, 'rb', false, $context);

            $line_of_text = fgets($fp);
            $json = json_decode($line_of_text, true);

            @fclose($fp);
            return $json;
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getComplainsData($data)
    {
        try {
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                ]
            ];

            $apiURL  = "https://api.nhtsa.gov/complaints/complaintsByVehicle?make=" . $data['make'] . "&model=" . $data['model'] . "&modelYear=" . $data['year'];
            $context = stream_context_create($opts);
            $fp      = @fopen($apiURL, 'rb', false, $context);

            $line_of_text = fgets($fp);
            $json = json_decode($line_of_text, true);
            @fclose($fp);
            $cData = collect($json['results']);
            if ($json['count'] > 0)
                $cData = $cData->where('vin', $data['vin'])->toArray();

            return $cData;
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getRatingsData($data)
    {
        try {
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                ]
            ];

            $apiURL  = "https://api.nhtsa.gov/SafetyRatings/modelyear/{$data['year']}/make/{$data['make']}/model/{$data['model']}";
            $context = stream_context_create($opts);
            $fp      = @fopen($apiURL, 'rb', false, $context);

            $line_of_text = fgets($fp);
            $json = json_decode($line_of_text, true);

            @fclose($fp);
            $data = [];
            foreach ($json['Results'] as $key => $js) {
                $js['rating'] = $this->getRatingData($js['VehicleId']);
                $data[] = $js;
            }
            return $data;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getRatingData($VehicleId)
    {
        try {
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                ]
            ];

            $apiURL  = "https://api.nhtsa.gov/SafetyRatings/VehicleId/{$VehicleId}";
            $context = stream_context_create($opts);
            $fp      = @fopen($apiURL, 'rb', false, $context);

            $line_of_text = fgets($fp);
            $json = json_decode($line_of_text, true);

            @fclose($fp);
            return $json['Results'][0];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getOwnersData($state)
    {
        try {
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                ]
            ];

            $apiURL  = "https://api.nhtsa.gov/CSSIStation/state/" . $state;
            $context = stream_context_create($opts);
            $fp      = @fopen($apiURL, 'rb', false, $context);

            $line_of_text = fgets($fp);
            $json = json_decode($line_of_text, true);

            @fclose($fp);
            return $json;
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getOwnerCostData($vin)
    {
        try {
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://car-utils.p.rapidapi.com/ownershipcost?vin=" . $vin,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "x-rapidapi-host: car-utils.p.rapidapi.com",
                    "x-rapidapi-key: aac6f5f4e7msh202c93ba7541b6ap1598f6jsn72b007c8faf4"
                ],
            ]);
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
    
            curl_close($curl);
    
            if ($err) {
                throw new \Exception("cURL Error #:" . $err);
            } else {
                $apiResponse = json_decode($response, true);
                
                function calculateTotal($values) {
                    return array_sum($values);
                }
                
                $categories = [
                    "Depreciation" => $apiResponse['depreciation_cost'],
                    "Insurance" => $apiResponse['insurance_cost'],
                    "Fuel" => $apiResponse['fuel_cost'],
                    "Maintenance" => $apiResponse['maintenance_cost'],
                    "Repairs" => $apiResponse['repairs_cost'],
                    "Taxes & Fees" => $apiResponse['fees_cost'],
                    "Ownership Costs" => $apiResponse['total_cost']
                ];
                
                foreach ($categories as $category => $values) {
                    
                    $categories[$category][] = calculateTotal($values);
                }
                
                $tableData = [
                    "mileage_start"=> $apiResponse['mileage_start'],
                    "mileage_year"=> $apiResponse['mileage_year'],
                    "total_cost_sum"=> $apiResponse['total_cost_sum'],
                    "5yr_mileage"=> $apiResponse['5yr_mileage'],
                    "cost_per_mile"=> $apiResponse['cost_per_mile'],
                    "categories" => [],
                ];
                
                foreach ($categories as $name => $values) {
                    $tableData['categories'][] = [
                        "name" => $name,
                        "values" => $values
                    ];
                }
                
                return $tableData;
            }
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getFuelData($make, $model, $year)
    {
        try {
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://car-utils.p.rapidapi.com/fueleconomy?make=" . urlencode($make) . "&model=" . urlencode($model) . "&year=" . $year,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "x-rapidapi-host: car-utils.p.rapidapi.com",
                    "x-rapidapi-key: aac6f5f4e7msh202c93ba7541b6ap1598f6jsn72b007c8faf4"
                ],
            ]);
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
    
            curl_close($curl);
    
            if ($err) {
                throw new \Exception("cURL Error #:" . $err);
            } else {
                $result = json_decode($response, true);
                return $result[0];
            }
        } catch (\Exception $e) {
            return []; // Return an empty array or other error handling mechanism
        }
    }

    public function checkNormalReport($vin) 
    {
        try {
            $postdata = http_build_query(
                [
                    'format' => 'json',
                    'data' => $vin
                ]
            );
            $opts = [
                'http' => [
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                        "Content-Length: " . strlen($postdata) . "\r\n",
                    'content' => $postdata
                ]
            ];
    
            $apiURL  = "https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch/";
            $context = stream_context_create($opts);
            $fp      = fopen($apiURL, 'rb', false, $context);
    
            $line_of_text = fgets($fp);
            $json         = json_decode($line_of_text, true);
    
            fclose($fp);
    
            
            $result = $json['Results'][0];
    
            if(empty(@$result['Make'])){
                return [
                    'status' => false,
                    'msg' => 'not available'
                ];
            }else{
                return [
                    'status' => true,
                    'msg' => 'available'
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => false,
                'msg' => 'not available'
            ];
        }
        
    }

    public function getNormalReport($vin, $with = true, $title = false)
    {

        $postdata = http_build_query(
            [
                'format' => 'json',
                'data' => $vin
            ]
        );
        $opts = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                    "Content-Length: " . strlen($postdata) . "\r\n",
                'content' => $postdata
            ]
        ];

        $apiURL  = "https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch/";
        $context = stream_context_create($opts);
        $fp      = fopen($apiURL, 'rb', false, $context);

        $line_of_text = fgets($fp);
        $json         = json_decode($line_of_text, true);

        fclose($fp);

        if ($with) {
            return $json['Results'][0];
        } else {
            $result = $json['Results'][0];

            $recallData = [
                'vin'  =>  $vin,
                'make'  =>  @$result['Make'],
                'model' => @$result['Model'],
                'year'  =>  @$result['ModelYear']
            ];

            if($title == 'recall-data'){
                $recallData['title'] = @$result['ModelYear'] . " " . @$result['Make'] . ' ' . @$result['Model'];
                return $recallData;
            }
            $data = [
                'result'     => $result,
                'recalls'    => @$this->getRecallsData($recallData),
                'complaints' => @$this->getComplainsData(@$recallData),
                'ownerdata'  => [],
                'ratings'    => @$this->getRatingsData(@$recallData),
                'engine'     => $result['EngineModel'],
                'title'      => @$result['Make'] . ' ' . @$result['Model'] . " " . @$result['ModelYear'] . " " . @$result['BodyClass']
            ];


            if($title){
                return @$result['ModelYear'] . " " . @$result['Make'] . ' ' . @$result['Model'];
            }

            return $data;
        }
    }

    public function generateNewNormalReport($vin, $report_id)
    {
        $data = $this->getNormalReport($vin, false);
        $vinData = $this->checkMarketValue($vin);
        $vinDatas = $vinData['status'] ? $vinData : false;

        $result = [];
        $nvindata = @$data['result'];
        $result['vindata']    =  $nvindata;
        $result['recalldata'] =  @$data['recalls'];
        $result['ownerdata']  =  @$data['ownerdata'];
        $result['ratings']    =  @$data['ratings'];
        $result['engine']     =  @$data['engine'];
        $result['complaints'] =  @$data['complaints'];
        $result['report_id']  =  $report_id;
        $result['title']    =  @$data['title'];
        $result['reportdata'] = @$vinDatas;
        $result['ownercostdata']  =  $this->getOwnerCostData($vin);
        $result['fueldata']  =  $this->getFuelData($nvindata['Make'], $nvindata['Model'], $nvindata['ModelYear']);
        
        return view('reports.normal', $result)->render();
    }

    public function checkMarketValue($vin)
    {
        $dataAPI = [
            'url' => "https://car-utils.p.rapidapi.com/marketvalue?vin=" . $vin,
            'host' => "car-utils.p.rapidapi.com",
            'key'  => "aac6f5f4e7msh202c93ba7541b6ap1598f6jsn72b007c8faf4"
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $dataAPI['url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: " . $dataAPI['host'],
                "X-RapidAPI-Key: " . $dataAPI['key']
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return [
                'status' => false,
                'error'  => 'cURL Error #:' . $err
            ];
        } else {
            $response = json_decode($response, true);
            
            if (!isset($response['error'])) {
                
                
                return [
                    'status'              => true,
                    'name'                => '<b>Market value for </b>' . @$response['vehicle'],
                    'des'                 => 'Estimates based on <b>' . @$response['count'] . ' similar vehicles sold</b> between ' .
                        Carbon::parse($response['period'][0])->format('d-M-Y') . ' - ' . Carbon::parse($response['period'][1])->format('d-M-Y'),
                    'below_average'       => '$' . number_format($response['prices']['below'], 0) . ' or less',
                    'market_average'      => '$' . number_format($response['prices']['average'], 0),
                    'above_average'       => '$' . number_format($response['prices']['above'], 0) . ' or more',
                    'market_value'        => '$' . number_format($response['prices']['below'], 0) . ' - $' . number_format($response['prices']['above'], 0),
                    'estimated_certainty' => @$response['certainty'].'%',
                    'current_mileage'     => @$response['mileage'] . ' Miles',
                    'time_period'         => 'Pass 6 months',

                ];
            } else {
                return [
                    'status' => false,
                    'error'  => 'No Data Found'
                ];
            }
        }
    }

    function getAutoCheckReport($vin)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://connect.carsimulcast.com/getrecord/autocheck/$vin",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'API-KEY: TIGQQFVORWMDBKBCOGCDMXRRIJSPGW',
            'API-SECRET: 087aa9dty8omfz26rmaewctptdya0x4m57ci3sxh'
        ),
        ));

        $response = curl_exec($curl);
        
        $newJson = json_decode($response, true);
        curl_close($curl);
        if(@$newJson['error'] == 'report_error'){
            return false;
        }

        $html = base64_decode($response);
        $title = $this->getNormalReport($vin, false, 'recall-data');

        
        $url = "<style>img{pointer-events: none !important;}.button{pointer-events: auto !important;}</style><script>document.addEventListener('contextmenu', function(event) { event.preventDefault(); }); document.addEventListener('keydown', function(event) { if (event.key == 'F2' || event.key == 'F12' || (event.ctrlKey && (event.key == 'u' || event.key == 's')) || (event.ctrlKey && event.shiftKey && (event.key == 'I' || event.key == 'J' || event.key == 'C' || event.key == 'U'))) { event.preventDefault(); } });</script>";
        $response= $url.$this->changeAutocheckTitle($html, $title, $vin);
        // $response= $response ." <script>document.addEventListener(\"contextmenu\", function(event) { event.preventDefault(); }); document.addEventListener(\"keydown\", function(event) { if (event.key == \"F2\") { event.preventDefault(); } }); document.addEventListener(\"keydown\", function(event) { if ((event.ctrlKey && event.shiftKey && (event.key == \"I\" || event.key == \"J\" || event.key == \"u\" ))) { event.preventDefault(); } });<\/script>"; ;
       
        
        $response1 = base64_encode($response);
        
        $response2 = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> |  History Report</title>
            <link rel="icon" type="image/png" href="https://lemniscatez.com/images/logo.png">
            <link rel="apple-touch-icon" href="https://lemniscatez.com/images/logo.png">
            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    height: 100%;
                }
                iframe {
                    width: 100%;
                    height: 100%;
                    border: none;
                }
            </style>
        </head>
        <body>
            <iframe id="myIframe"  ></iframe>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
                (function() {
                    function detectDevTool(allow) {
                        if (isNaN(+allow)) allow = 100;
                        var start = +new Date();
                        debugger;
                        var end = +new Date();
                        if (isNaN(start) || isNaN(end) || end - start > allow) {
                            document.write("Kindly close the DEVTOOLS! DEVTOOLS detected. All operations will be terminated.");
                        }
                    }

                    function attachEvents() {
                        window.addEventListener("load", function() { detectDevTool(); });
                        window.addEventListener("resize", function() { detectDevTool(); });
                        window.addEventListener("mousemove", function() { detectDevTool(); });
                        window.addEventListener("focus", function() { detectDevTool(); });
                        window.addEventListener("blur", function() { detectDevTool(); });
                    }

                    if (document.readyState === "complete" || document.readyState === "interactive") {
                        detectDevTool();
                        attachEvents();
                    } else {
                        window.addEventListener("DOMContentLoaded", function() {
                            detectDevTool();
                            attachEvents();
                        });
                    }
                })();

                document.addEventListener("contextmenu", function(e) {
                    e.preventDefault();
                });

                document.addEventListener("keydown", function(e) {
                    if (e.keyCode == 123 || // F12
                        (e.ctrlKey && e.shiftKey && (e.keyCode == 73 || e.keyCode == 74 || e.keyCode == 67)) || // Ctrl+Shift+I/J/C
                        (e.ctrlKey && e.keyCode == 85) || // Ctrl+U
                        (e.ctrlKey && (e.keyCode == 65 || e.keyCode == 83 || e.keyCode == 68 || e.keyCode == 70)) // Ctrl+A/S/D/F
                    ) {
                        e.preventDefault();
                    }
                });

                function debounce(func, wait) {
                    let timeout;
                    return function(...args) {
                        clearTimeout(timeout);
                        timeout = setTimeout(() => func.apply(this, args), wait);
                    };
                }

                function detectDevTools(openCallback) {
                    let devtoolsOpen = false;
                    const threshold = 200;
                    const checkDevTools = debounce(() => {
                        const widthDiff = window.outerWidth - window.innerWidth;
                        const heightDiff = window.outerHeight - window.innerHeight;
                        const isOpen = widthDiff > threshold || heightDiff > threshold;

                        if (isOpen && !devtoolsOpen) {
                            devtoolsOpen = true;
                            openCallback();
                        } else if (!isOpen && devtoolsOpen) {
                            devtoolsOpen = false;
                        }
                    }, 500);

                    window.addEventListener("resize", checkDevTools);
                    checkDevTools(); // Initial check
                }

                function hardRefresh() {
                    // Get the current URL
                    var currentUrl = window.location.href;
                    
                    // Append a unique query parameter to bypass the cache
                    var separator = currentUrl.includes("?") ? "&" : "?";
                    var newUrl = currentUrl + separator + "refresh=" + new Date().getTime();
                    
                    // Reload the page with the new URL
                    window.location.href = newUrl;
                }

                document.addEventListener("DOMContentLoaded", function() { 
                    var iframe = document.getElementById("myIframe");
                    var content = "'. $response1 .'";
                    var decodedContent = decodeURIComponent(escape(atob(content)));
                
                    
                    // iframe.src = "data:text/html;base64,"  + content;

                    // Create a Blob from the decoded content
                    var blob = new Blob([decodedContent], { type: "text/html" });
            
                    // Generate a URL for the Blob
                    var url = URL.createObjectURL(blob);
            
                    // Set the src attribute of the iframe to the Blob URL
                    iframe.src = url;

                    // Check for dev tools and react accordingly
                    detectDevTools(function() {
                        // alert("Please close the Developer Tools.");
                        // hardRefresh();
                        iframe.style.display = "none"; // Hide iframe if dev tools are open
                    });
                });
            </script>
        </body>
        </html>';
        return $response2;
    }
    
    function getCarfaxReport($vin)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://connect.carsimulcast.com/getrecord/carfax/$vin",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'API-KEY: TIGQQFVORWMDBKBCOGCDMXRRIJSPGW',
            'API-SECRET: 087aa9dty8omfz26rmaewctptdya0x4m57ci3sxh'
        ),
        ));

        $response = curl_exec($curl);
        
        $newJson = json_decode($response, true);
        curl_close($curl);
        if(@$newJson['error'] == 'report_error'){
            return false;
        }

        $html = base64_decode($response);
        $title = $this->getNormalReport($vin, false, true);
        // dd($title['title']);
        $url = "<style>img{pointer-events: none !important;}.button{pointer-events: auto !important;}</style><script>document.addEventListener('contextmenu', function(event) { event.preventDefault(); }); document.addEventListener('keydown', function(event) { if (event.key == 'F2' || event.key == 'F12' || (event.ctrlKey && (event.key == 'u' || event.key == 's')) || (event.ctrlKey && event.shiftKey && (event.key == 'I' || event.key == 'J' || event.key == 'C' || event.key == 'U'))) { event.preventDefault(); } });</script>";

        $response= $url.$this->changeCarfaxTitle($html, $title['title'], $vin);
        // $response= $response ." <script>document.addEventListener(\"contextmenu\", function(event) { event.preventDefault(); }); document.addEventListener(\"keydown\", function(event) { if (event.key == \"F2\") { event.preventDefault(); } }); document.addEventListener(\"keydown\", function(event) { if ((event.ctrlKey && event.shiftKey && (event.key == \"I\" || event.key == \"J\" || event.key == \"u\" ))) { event.preventDefault(); } });<\/script>"; ;
        

                $response1 = base64_encode($response);
        //  dd($response1);
        $response2 = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title> |  History Report</title>
                <link rel="icon" type="image/png" href="https://lemniscatez.com/images/logo.png">
                <link rel="apple-touch-icon" href="https://lemniscatez.com/images/logo.png">
                <style>
                    body, html {
                        margin: 0;
                        padding: 0;
                        width: 100%;
                        height: 100%;
                    }
                    iframe {
                        width: 100%;
                        height: 100%;
                        border: none;
                    }
                </style>
            </head>
            <body>
                <iframe  id="myIframe" ></iframe>
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                    (function() {
                        function detectDevTool(allow) {
                            if (isNaN(+allow)) allow = 100;
                            var start = +new Date();
                            debugger;
                            var end = +new Date();
                            if (isNaN(start) || isNaN(end) || end - start > allow) {
                                document.write("Kindly close the DEVTOOLS! DEVTOOLS detected. AlFl operations will be terminated.");
                            }
                        }

                        function attachEvents() {
                            window.addEventListener("load", function() { detectDevTool(); });
                            window.addEventListener("resize", function() { detectDevTool(); });
                            window.addEventListener("mousemove", function() { detectDevTool(); });
                            window.addEventListener("focus", function() { detectDevTool(); });
                            window.addEventListener("blur", function() { detectDevTool(); });
                        }

                        if (document.readyState === "complete" || document.readyState === "interactive") {
                            detectDevTool();
                            attachEvents();
                        } else {
                            window.addEventListener("DOMContentLoaded", function() {
                                detectDevTool();
                                attachEvents();
                            });
                        }
                    })();

                    document.addEventListener("contextmenu", function(e) {
                        e.preventDefault();
                    });

                    document.addEventListener("keydown", function(e) {
                        if (e.keyCode == 123 || // F12
                            (e.ctrlKey && e.shiftKey && (e.keyCode == 73 || e.keyCode == 74 || e.keyCode == 67)) || // Ctrl+Shift+I/J/C
                            (e.ctrlKey && e.keyCode == 85) || // Ctrl+U
                            (e.ctrlKey && (e.keyCode == 65 || e.keyCode == 83 || e.keyCode == 68 || e.keyCode == 70)) // Ctrl+A/S/D/F
                        ) {
                            e.preventDefault();
                        }
                    });

                    function debounce(func, wait) {
                        let timeout;
                        return function(...args) {
                            clearTimeout(timeout);
                            timeout = setTimeout(() => func.apply(this, args), wait);
                        };
                    }

                    function detectDevTools(openCallback) {
                        let devtoolsOpen = false;
                        const threshold = 200;
                        const checkDevTools = debounce(() => {
                            const widthDiff = window.outerWidth - window.innerWidth;
                            const heightDiff = window.outerHeight - window.innerHeight;
                            const isOpen = widthDiff > threshold || heightDiff > threshold;

                            if (isOpen && !devtoolsOpen) {
                                devtoolsOpen = true;
                                openCallback();
                            } else if (!isOpen && devtoolsOpen) {
                                devtoolsOpen = false;
                            }
                        }, 500);

                        window.addEventListener("resize", checkDevTools);
                        checkDevTools(); // Initial check
                    }

                    function hardRefresh() {
                        // Get the current URL
                        var currentUrl = window.location.href;
                        
                        // Append a unique query parameter to bypass the cache
                        var separator = currentUrl.includes("?") ? "&" : "?";
                        var newUrl = currentUrl + separator + "refresh=" + new Date().getTime();
                        
                        // Reload the page with the new URL
                        window.location.href = newUrl;
                    }

                    document.addEventListener("DOMContentLoaded", function() { 
                        var iframe = document.getElementById("myIframe");
                        var content = "'. $response1 .'";
                        var decodedContent = decodeURIComponent(escape(atob(content)));
                        
                        // iframe.src = "data:text/html;base64,"  + content;

                        // Create a Blob from the decoded content
                        var blob = new Blob([decodedContent], { type: "text/html" });
                
                        // Generate a URL for the Blob
                        var url = URL.createObjectURL(blob);
                
                        // Set the src attribute of the iframe to the Blob URL
                        iframe.src = url;

                        // Check for dev tools and react accordingly
                        detectDevTools(function() {
                            // alert("Please close the Developer Tools.");
                            // hardRefresh();
                            iframe.style.display = "none"; // Hide iframe if dev tools are open
                        });
                    });
                    
                </script>
            </body>
            </html>';
        // return dd($response);
        return $response2;
    }

    function checkViniReport($vin, $type = 'autocheck')
    {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://connect.carsimulcast.com/checkrecords/$vin",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'API-KEY: TIGQQFVORWMDBKBCOGCDMXRRIJSPGW',
            'API-SECRET: 087aa9dty8omfz26rmaewctptdya0x4m57ci3sxh'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);
        if(isset($data['title']) == 'Error' || $data == null)
            return false;

        return $data['autocheck_records'];
    }

    function generateReportAndSave($user_id, $vin, $save = false)
    {
        
        $settings = Setting::first();
        $reportType = $settings->report_type;
        $html = '';

        $error = [
            'status' => false,
            'msg' => 'report not found'
        ];
        $success = [
            'status' => true,
            'msg' => 'founded',
            'page' => 1
        ];

        $report_id  = rand(000000, 999999);
        $report_url = 'reports/'.$report_id;
        
        if($reportType == 'normal'){
            $checkMartekValue = $this->checkMarketValue($vin);
            if($checkMartekValue['status']){
                if(!$save)
                    return $success;
            
                $html  = $this->generateNewNormalReport($vin, $report_id);
                $type       = 'default';

            }else{
                $checkAutocheckReport = $this->checkViniReport($vin, 'autocheck');
                if($checkAutocheckReport){
                    if(!$save)
                        return $success;
                    $html = $this->getAutoCheckReport($vin);
                    if(!$html) 
                        return $error;
                    $type       = 'vini';
                } else {
                    $checkCarfaxReport = $this->checkViniReport($vin, 'carfax');
                    if($checkCarfaxReport){
                        if(!$save)
                            return $success;

                        $html       = $this->getCarfaxReport($vin);
                        if(!$html) 
                            return $error; 
                        $type       = 'carfax';
                    }else{
                        $checkNormalReport = $this->checkNormalReport($vin);
                        if(!$checkNormalReport['status'])
                            return $error;
                        
                        $success['page'] = 2;
                        if(!$save)
                            return $success;
                    
                        $html  = $this->generateNewNormalReport($vin, $report_id);
                        $type       = 'default';
                    }
                }   
            }
        }

        if($reportType == 'vini'){
            $checkAutocheckReport = $this->checkViniReport($vin, 'autocheck');
            if($checkAutocheckReport){
                if(!$save)
                    return $success;
                $html = $this->getAutoCheckReport($vin);
                if(!$html) 
                    return $error;
                $html       = str_replace('AutoCheck', 'My Elite Global', $html);
                $type       = 'vini';

            }else{
                $checkCarfaxReport = $this->checkViniReport($vin, 'carfax');
                if($checkCarfaxReport){
                    if(!$save)
                        return $success;
                    $html = $this->getCarfaxReport($vin);
                    if(!$html) 
                        return $error;
                    $type       = 'carfax';
                }else{
                    $checkMartekValue = $this->checkMarketValue($vin);
                    if($checkMartekValue['status']){
                        if(!$save)
                            return $success;
                        $html  = $this->generateNewNormalReport($vin, $report_id);
                        $type       = 'default';
                    }else{
                        $checkNormalReport = $this->checkNormalReport($vin);
                        if(!$checkNormalReport['status'])
                            return $error;
                        
                        $success['page'] = 2;
                        if(!$save)
                            return $success;
                    
                        $html  = $this->generateNewNormalReport($vin, $report_id);
                        $type       = 'default';
                    }
                }          
            }
        }
        
        if($reportType == 'carfax'){
            $checkCarfaxReport = $this->checkViniReport($vin, 'carfax');
            if($checkCarfaxReport){
                if(!$save)
                    return $success;
                $html = $this->getCarfaxReport($vin);
                
                if(!$html) 
                    return $error;
                $type       = 'carfax';
            }else{
                $checkAutocheckReport = $this->checkViniReport($vin, 'autocheck');
                if($checkAutocheckReport){
                    if(!$save)
                        return $success;
                    $html = $this->getAutoCheckReport($vin);
                    if(!$html) 
                        return $error;
                    $html       = str_replace('AutoCheck', 'My Elite Global', $html); 
                    
                    $type       = 'vini';
                }else{
                    $checkMartekValue = $this->checkMarketValue($vin);
                    if($checkMartekValue['status']){    
                        if(!$save)
                            return $success;
                        $html  = $this->generateNewNormalReport($vin, $report_id);
                        $type       = 'default';
                    }else{
                        $checkNormalReport = $this->checkNormalReport($vin);
                        if(!$checkNormalReport['status'])
                            return $error;
                        
                        $success['page'] = 2;
                        if(!$save)
                            return $success;
                    
                        $html  = $this->generateNewNormalReport($vin, $report_id);
                        $type       = 'default';
                    }
                }          
            }
        }
        

        $report             = new Reports;
        $report->user_id    = $user_id;
        $report->type       = $type;
        $report->report_id  = $report_id;
        $report->report_url = $report_url;
        $report->vin        = $vin;
        $report->response   = $html;
        $report->save();
                
        return $report;
   
    }

    function changeAutocheckTitle($html, $data, $vin = null)
    {
        $title = $data['title'];
        $html = str_replace('AutoCheck', 'Your', $html);
        $html = str_replace('My Elite Global', 'Your', $html);
        $html = str_replace('Experian Your Report', 'Experian Your Vehicle History Report', $html);
        $html = str_replace('www.autocheck.com/terms', '', $html);
        $html = str_replace('Your Score', 'Vehicle Score', $html);

        
        $dom = new DOMDocument();
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        
        // Create a new DOMXPath instance
        $xpath = new DOMXPath($dom);


        // Check if any elements were found
        $elements = $xpath->query('//div[contains(@class, "make-year-title")]');
        
        // Check if any elements were found
       if ($elements->length > 0) {
            // Get the first element with the class "make-year-title"
            $boxTitleDecode = $elements->item(0);
            
            // Update the first child node
            if ($boxTitleDecode->childNodes->length > 1) {
                $firstChild = $boxTitleDecode->childNodes->item(1);
                $firstChild->textContent = "$title";
            }
        
            // Clear the text content of the second child node
            if ($boxTitleDecode->childNodes->length > 3) {
                $secondChild = $boxTitleDecode->childNodes->item(3);
                $secondChild->textContent = ''; 
            }
            
            // Output the updated HTML
            $html = $dom->saveHTML();
        }

        // Use XPath to find the spans you want to replace within the "history" element
        $yearSpan = $xpath->query('//div[@id="history"]//span[strong/text()="Vehicle:"]/span[1]')->item(0);
        $modelSpan = $xpath->query('//div[@id="history"]//span[strong/text()="Vehicle:"]/span[2]')->item(0);
        if($yearSpan){
            $yearSpan->textContent = $title;
        }

        if($modelSpan){
            $modelSpan->textContent = '';
        }
        $html = $dom->saveHTML();
        
        try{
            $vehicalTemplate = $this->marketValueTemplateHtml($vin, $data);
            $vehicalTemplate = str_replace('&', '&amp;', $vehicalTemplate);
            $fragment = $dom->createDocumentFragment();
            $fragment->appendXML($vehicalTemplate);        
            
            $glossaryDiv = $dom->getElementById('glossary');

            if ($glossaryDiv) {
                $parent = $glossaryDiv->parentNode;
                $parent->insertBefore($fragment, $glossaryDiv);
            }
        }catch(\Exception $e){
            \Log::info($e->getMessage());
        }
        
        $html = $dom->saveHTML();
        return $html;
    }
    
    function changeCarfaxTitle($html, $title, $vin = null)
    {
        $appName = ucfirst(env('APP_NAME', 'My Elite Global'));
        $html = str_replace('CARFAX ', " $appName ", $html);
        $html = str_replace(' CARFAX', " $appName ", $html);
        $html = str_replace('http://www.carfax.com/help', url('/'), $html);
        $html = str_replace('http://www.carfaxonline.com', url('/'), $html);
        $html = str_replace('www.carfax.com', 'home', $html);
        $html = str_replace('www.carfaxonline.com', 'home', $html);
        $html = str_replace('https://vini.az/', url('/').'/carfax/', $html);
        $html = str_replace('CarfaxLogo.svg', 'logo.png', $html);
        $html = str_replace('vhr_2.js', 'vhr_2', $html);
        
        $dom = new DOMDocument();
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xpath = new DOMXPath($dom);
                // Find the <title> element
        $titleNodeList = $xpath->query('//title');
        $footerNodeList = $xpath->query('//footer');
        $titleNodeList2 = $xpath->query('//*[@id="vehicle-information-panel"]/div/div[1]');

        // Check if <title> element exists
        if ($titleNodeList->length > 0) {
            // Get the first <title> element
            $titleNode = $titleNodeList->item(0);
            
            // Set new title
            $newTitle = $appName." Vehicle History Report for this ".$title." :".$vin;
            $titleNode->nodeValue = $newTitle;
        } 
        
        if ($titleNodeList2->length > 0) {
            $titleNode2 = $titleNodeList2->item(0);
            $titleNode2->nodeValue = $title;
        } 

        if ($footerNodeList->length > 0) {
            // Get the first <title> element
            $footerNode = $footerNodeList->item(0);
            
            while ($footerNode->hasChildNodes()) {
                $footerNode->removeChild($footerNode->firstChild);
            }
        } 

        try {
        
            $targetNodeList = $xpath->query('//*[@id="top-bar"]/div/img');
            
            // Check if the target node exists
            if ($targetNodeList->length > 0) {
                // Get the first target node
                $targetNode = $targetNodeList->item(0);
                
                // Create the button element
                $buttonElement = $dom->createElement('button');
                $buttonElement->setAttribute('id', 'singleSummaryButton');
                $buttonElement->setAttribute('name', 'singleSummaryButton');
                $buttonElement->setAttribute('onclick', 'javascript:window.print();return false;');
                $buttonElement->setAttribute('onmouseout', 'this.className=\'button\'');
                $buttonElement->setAttribute('onmouseover', 'this.className=\'buttonHover\'');
                $buttonElement->appendChild($dom->createTextNode('Print Report'));
                
                // Insert the button after the target node
                $targetNode->parentNode->insertBefore($buttonElement, $targetNode->nextSibling);
            }

            $vehicalTemplate = $this->marketValueTemplateHtml($vin, $title, 'carfax');
            $vehicalTemplate = str_replace('&', '&amp;', $vehicalTemplate);
            
            // Create a document fragment
            $fragment = $dom->createDocumentFragment();
            $fragment->appendXML($vehicalTemplate);        
            
            // Get the <footer> element(s)
            $glossaryDivList = $dom->getElementsByTagName('footer');
            
            // Check if <footer> element(s) exist
            if ($glossaryDivList->length > 0) {
                // Get the first <footer> element
                $glossaryDiv = $glossaryDivList->item(0);
                
                // Append the fragment to the <footer> element
                $glossaryDiv->appendChild($fragment);
            }
        } catch(\Exception $e) {
            \Log::info($e->getMessage());
        }
        
        $html = $dom->saveHTML();
        return $html;
    }

    function marketValueTemplateHtml($vin, $data, $type = 'vini')
    {
        
        $title = $data['title'];
    
        $html = '';
        $getVinDataApi = $this->checkMarketValue($vin);
        if(!$getVinDataApi['status']){
            return '<div></div>';
        }
        $html .=  '<div>
        <div id="glossary">
          <div class="header">
            <span>'.($title ? '<b>Market value for </b>' . $title : $getVinDataApi['name']).'</span>
          </div>
          <div class="m-0 section-data">
            <div class="d-flex" style="display:flex;">
              <div style="width: 50%; height: 210px">
                <div
                  style="
                    border: 1px solid #d4d4d4;
                    height: 70px;
                    text-align: center;
                    padding-top: 10px;
                  "
                >
                  <span style="font-size: 18px" class="font-weight-bold"
                    >Below Market</span
                  ><br />
                  <span style="font-size: 12px">'.$getVinDataApi['below_average'].'</span>
                </div>
                <div
                  style="
                    border: 1px solid #d4d4d4;
                    height: 70px;
                    text-align: center;
                    padding-top: 10px;
                  "
                >
                  <span style="font-size: 18px; font-weight: 500">Market Average</span
                  ><br />
                  <span style="font-size: 12px">'.$getVinDataApi['market_average'].'</span>
                </div>
                <div
                  style="
                    border: 1px solid #d4d4d4;
                    height: 70px;
                    text-align: center;
                    padding-top: 10px;
                  "
                >
                  <span style="font-size: 18px; font-weight: 500">Above Market</span
                  ><br />
                  <span style="font-size: 12px">'.$getVinDataApi['above_average'].'</span>
                </div>
              </div>
              <div style="width: 50%; height: '. ($type == 'vini' ? '210px' : '245px'). '; float: right">
                <div
                  style="
                    border: 1px solid #d4d4d4;
                    height: 105px;
                    padding-left: 20px;
                    padding-top: 11px;
                  "
                >
                  <span style="font-size: 18px; font-weight: 500">ASSUMPTIONS </span
                  ><br />
                  <span style="font-size: 12px">Current Mileage: '.$getVinDataApi['current_mileage'].'</span
                  ><br />
                  <span style="font-size: 12px">Time Period: '.$getVinDataApi['time_period'].'</span>
                </div>
                <div
                  style="
                    border: 1px solid #d4d4d4;
                    height: '. ($type == 'vini' ? '105px' : '115px'). ';
                    padding-left: 20px;
                    padding-top: 11px;
                  "
                >
                  <span style="font-size: 18px; font-weight: 500">ESTIMATES </span
                  ><br />
                  <span style="font-size: 12px">Market Value: '.$getVinDataApi['market_value'].'</span
                  ><br />
                  <span style="font-size: 12px">Estimate Certaintv:  '.$getVinDataApi['estimated_certainty'].'</span>
                </div>
              </div>
            </div>
      
            <div
              style="'. ($type == 'vini' ? 'height: 50px; width: 100%; text-align: center; padding-top: 13px' : 'height: 38px;width: 100%;text-align: center;padding-top: 20px;border: 1px solid #d4d4d4;'). '"
            >
            '.$getVinDataApi['des'].'
            </div>
          </div>
        </div>
      </div>
      ';
    
        $ownercostdata = $this->getOwnerCostData($vin);
        $fueldata = $this->getFuelData($data['make'], $data['model'], $data['year']);

        
            if(count(@$ownercostdata)){

                $html .= '<div id="glossary" class="carSpect mb-3 p-0">
                    <h3 class="header">
                        Ownership cost for '.str_ireplace('incomplete','', $title).'
                    </h3>
                    <div class="carSpectDetail">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="text-center"
                                    style="height: 60px; line-height: 60px; border-bottom: 1px solid; font-size: 18px;">
                                    <strong>Estimated: $'.number_format(@$ownercostdata['total_cost_sum'],0).' over the next 5
                                        years</strong>
                                </div>
                                <table class="mb-0 table table-striped">
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
                                    <tbody>';
                                        foreach(@$ownercostdata['categories'] as $_cat){
                                            $html .= '<tr>
                                                <th>'.$_cat['name'].'</th>';
                                                foreach($_cat['values'] as $val){
                                                $html .= '<td>'.number_format($val,0).'</td>';
                                                }
                                                $html .=   '</tr>';
                                        }
                                    $html .= '</tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row px-sm-4 px-3 pt-4">
                            <!-- column #1 -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-4">
                                <div class="glanceBx">
                                    <div class="align-items-center contBx">
                                        <h5>Assumptions</h5>
                                        <p><strong>Vehicles:</strong> '.str_ireplace('incomplete','', $title).'</p>
                                        <p><strong>Mileage:</strong> '.number_format(@$ownercostdata['mileage_start'], 0).' mi +
                                            '.number_format(@$ownercostdata['mileage_year'],0).' mi/year</p>
                                    </div>
                                </div>
                            </div>
                            <!-- column #2 -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-4">
                                <div class="glanceBx">
                                    <div class="align-items-center contBx">
                                        <h5>Estimates</h5>
                                        <p><strong>5-Year Mileage:</strong> '.@number_format($ownercostdata['5yr_mileage'],0).' mi</p>
                                        <p><strong>Cost Per Mile:</strong> $'.@number_format($ownercostdata['cost_per_mile'], 2).'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            if(@$fueldata){
                $html .= '<div id="glossary" class="carSpect mb-3 p-0">
                    <h3 class="header">
                        Fuel Efficiency
                    </h3>
                    <div class="carSpectDetail mt-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">City Mileage:</div>
                                    <div class="decode-data col-md-6 col-12">'.$fueldata['city_mpg'].' miles/gallon</div>
                                </div>
                                <div class="decode-box-row row">
                                    <div class="col-md-6 col-12 decode-label">Highway Mileage</div>
                                    <div class="decode-data col-md-6 col-12">
                                        '.($fueldata['highway_mpg'] - 1)  . ' - ' .$fueldata['highway_mpg'].' miles/gallon</div>
                                </div>
                                <div class="decode-box-row row odd">
                                    <div class="col-md-6 col-12 decode-label">Fuel Type:</div>
                                    <div class="decode-data col-md-6 col-12">'.($fueldata['fuel_type'] ?? "--").'</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagebreak"></div>';
            }
        return $html;
    }

    function getOwnerCostAndFuelTemplate($vin, $title, $type = 'vini'){

    }
}
