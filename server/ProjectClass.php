<?php

require 'vendor/autoload.php';


class Project{
    private $user;
    private $projectID;
    private $projectName;
    private $projectType;
    private $projectDescription;
    private $startDate;
    private $endDate;
    private $client;
    private $collection;
    private $deadline = "None";
    function __construct(){
        $this->client = new MongoDB\Client;
        $this->collection = $this->client->Prodeo->projects;
    }
    public static function create($projectName, $projectType, $projectDescription, $user){
        $object = new self();

        $object->user = $user;
        $object->projectName = $projectName;
        $object->projectType = $projectType;
        $object->projectDescription = $projectDescription;

        $id = 1;
        $projectID = $user.'('.$id.')';
        $cursor = $object->collection->find(
            [
                'User'          => $user
            ],
            [
                'projection'    => ['_id' => 1, 'Name' => 1],
                'sort'          => ['_id' => 1]
            ]
        );
        

        if ($cursor == NULL){
            $object->projectID = $projectID;
            return $object;
        }

        foreach ($cursor as $key) {
            if ($projectID == $key['_id']){
                $id++;
                $projectID = $user.'('.$id.')';
            }
        }

        $object->projectID = $user.'('.$id.')';

        return $object;
    }
    public static function fetchByName($projectName,  $user){
        $object = new self();
        $object->projectName = $projectName;
        $object->user = $user;

        return $object;
    }
    public static function fetchByID($projectID, $user){
        $object = new self();
        $object->projectID = $projectID;
        $object->user = $user;

        return $object;
    }
    public static function setDeadline($deadline){
        $this->deadline = $deadline;
    }
    function AccessbyName($projectName, $user){
        $result = $collection->find(
            [
                'User'  => $this->user,
                'Name'  => $this->projectName
            ]
        );
        if ($result != NULL){

        }

        

    }
    function createProject(){

        $currentDate = date('d-m-y h:i:s');

        $this->collection->insertOne(
            [
            '_id'               => $this->projectID,
            'Name'              => $this->projectName,
            'Type'              => $this->projectType,
            'Description'       => $this->projectDescription,
            'User'              => $this->user,
            'CreatedTime'       => $currentDate,
            'LastAccessed'      => $currentDate,
            'Team'              => [
                'ProjectManager'        => $this->user
            ],
            'Progress'          => 0 ,
            'Deadline'          => $this->deadline
            ]
        );

        $result = json_encode(array(
                'message'       => 'Project Added successfully',
                '_id'           => $this->projectID,
                'Name'          => $this->projectName,
                'Type'          => $this->projectType,
                'Description'   => $this->projectDescription,
                'Team'          => [
                    'ProjectManager'    => $this->user 
                ],
                'Progress'      => 0,
                'Deadline'      => $this->deadline
        ));

        return $result;
    }
}


?>