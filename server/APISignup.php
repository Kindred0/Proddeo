<?php

require 'vendor/autoload.php';
require 'UserClass.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data       = json_decode(file_get_contents("php://input", true));


$email      = $data->{'email'};
$username   = $data->{'username'};
$password   = $data->{'password'};

$newUser = User::register($email, $username, $password);

$result = $newUser->checkValidSignup();


if ($result == 'Success'){
    $newUser->signup();
    echo json_encode(array("message" => "Record successfully inserted"));
} else {
    echo json_encode(array("message" => $result));
}
?>