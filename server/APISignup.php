<?php

require 'vendor/autoload.php';
require 'Authenticate.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data       = json_decode(file_get_contents("php://input", true));


$email      = $data->{'email'};
$username   = $data->{'username'};
$password   = $data->{'password'};

$User = new Authenticate($email, $username, $password);

$result = $User->checkValidSignup();


if ($result == 'Success'){
    $User->signup();
    echo json_encode(array("message" => "Record successfully inserted"));
} else {
    echo json_encode(array("message" => $result));
}
?>