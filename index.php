<html>
<head>
<?php
    include "includes/head.php";
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
</head>
<body>


<?php
    include "includes/header.php";
    include "includes/navbar.php";
?>
<section>

</section>
<?php
    include "includes/footer.php";
?>




</body>
</html>