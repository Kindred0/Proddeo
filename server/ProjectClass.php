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
    private static function fetch($projectID, $user){
        echo 'pass';
    }
    function createProject(){

        $this->collection->insertOne(
            [
            '_id'           => $this->projectID,
            'Name'          => $this->projectName,
            'Type'          => $this->projectType,
            'Description'   => $this->projectDescription,
            'User'          => $this->user
            ]
        );

        $result = json_encode(array(
                'message'       => 'Project created successfully',
                '_id'           => $this->projectID,
                'Name'          => $this->projectName,
                'Type'          => $this->projectType,
                'Description'   => $this->projectDescription,
        ));

        return $result;
    }
}


?>