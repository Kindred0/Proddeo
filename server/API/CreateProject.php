<?php

require 'ProjectClass.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data       = json_decode(file_get_contents("php://input", true));

$projectName        = $data->{'ProjectName'};
$projectType        = $data->{'ProjectType'};
$projectDescription = $data->{'ProjectDescription'};
$user               = $data->{'User'};

$newProject = Project::create($projectName, $projectType, $projectDescription, $user);

$result = $newProject->createProject();

echo $result;

?>