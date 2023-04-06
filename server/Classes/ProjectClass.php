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
    public static function fetchRecentProjects($user, $limit){
        $object = new self();
        $result = $object->collection->find(
            [
                '$or' => [
                    ['Team.ProjectManager'   => $user],
                    ['Team.Members'          => $user],
                    ['Origin'                => $user]
                ]
            ],
            [
                'limit'     => $limit,
                'sort'      => ['LastAccessed' => -1]
            ]   
        );
        $result = json_encode(iterator_to_array($result));
        return $result;
        
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
                'Origin'          => $user
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
    public static function fetchByID($projectID){
        $object = new self();
        $object->projectID = $projectID;

        return $object;
    }
    function setDeadline($deadline){
        $this->deadline = $deadline;
    }
    function AccessbyName($projectName, $user){
        $currentTime = date('d-m-y h:i:s');
        $result = $this->collection->find(
            [
                'Origin'  => $this->user,
                'Name'  => $this->projectName
            ]
        );
        if ($result != NULL){
            $this->collection->updateOne(
                ['Name'  => $this->ProjectName],
                [ '$set' => ['LastAccessed'     => $currentTime]]
            );
            return $result;
        } else {
            return false;
        }

        

    }
    function AccessbyID(){
        $currentTime = date('d-m-y h:i:s');
        $updateResult = $this->collection->updateOne(
            ['_id'      => $this->projectID],
            ['$set'     => ['LastAccessed'      => $currentTime]]
        );
        if ($updateResult->getMatchedCount() == 1){
            $result = $this->collection->findOne(
                [
                    '_id'       => $this->projectID
                ]
                );
                $result = MongoDB\BSON\fromPHP($result);
                $result = MongoDB\BSON\toJSON($result);
                return $result;
        } else {
            return false;
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
            'Origin'              => $this->user,
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
                'message'       => 'Project created successfully',
                '_id'           => $this->projectID,
                'Name'          => $this->projectName,
                'Type'          => $this->projectType,
                'Description'   => $this->projectDescription,
                'Origin'        => $this->user,
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