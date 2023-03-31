<?php

$url = "https://localserver:8001/APILogin.php";
$postdata = json_encode(array(
    "username"  => $_POST['username'],
    "password"  => $_POST['password']
));
$call = curl_init($url);
curl_setopt($call, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($call);
$response = json_decode($response);
curl_close($call);

echo $response;
?>