<?php

$url= 'https://yourvehinfo.com/notification-url-coinremitter?';

$data = array(
    'vin' => $_GET['vin'],
    'wallet' => $_GET['wallet'],
);

$msg = http_build_query($data);

$url .= $msg;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

?>