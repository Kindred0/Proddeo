<?php

require 'NotificationClass.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data       = json_decode(file_get_contents("php://input", true));



$origin = $data->{'User'};
$reciever = $data->{'Invitee'};
$project = $data->{'Project'};

Notification::sendInvitation($reciever, $origin, $project);


echo json_encode(array("message"    => "Success"));





?>