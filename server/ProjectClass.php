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

        var_dump($cursor);
        

        if ($cursor == NULL){
            $object->projectID = $projectID;
            return $object;
        }

        #$cursor = json_encode(iterator_to_array($cursor));
        #$cursor = json_decode($cursor);
        #var_dump($cursor);

        foreach ($cursor as $key) {
            var_dump($key['_id']);
            if ($projectID == $key['_id']){
                $id++;
                $projectID = $user.'('.$id.')';
            }
        }
        var_dump($projectID);

        $object->projectID = $user.'('.$id.')';

        return $object;
    }
    private static function fetch($projectID, $user){
        echo 'pass';
    }
    function createNewProject(){

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
                'message'       => 'Project Added successfully',
                '_id'           => $this->projectID,
                'Name'          => $this->projectName,
                'Type'          => $this->projectType,
                'Description'   => $this->projectDescription,
        ));

        return $result;
    }
}


?>