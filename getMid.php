<?php
$proxy = 'if_u_want_to_fix_url';
$proxyauth = 'if_u_want_to_fix_url';
$strAccessToken = "Token";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/profile";

$header = array(
'Content-Type: application/json',
'Authorization: Bearer ' . $strAccessToken
);


$ch = curl_init($strUrl);
curl_setopt($ch, CURLOPT_GET, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close ($ch);
var_dump($result);
