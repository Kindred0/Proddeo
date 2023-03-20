<?php

require 'UserClass.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data       = json_decode(file_get_contents("php://input", true));

$username = $data->{'username'};
$password = $data->{'password'};

$newUser = User::checkRegistered($username, $password);

$result = $newUser->login();

if ($result){
    echo json_encode(array("message" => "Successfully logged in"));
} else {
    echo json_encode(array("message" => "Not logged in"));
}

?>