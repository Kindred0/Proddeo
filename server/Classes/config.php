<?php

require 'vendor/autoload.php';

class Client{
    private $connection;
    function _construct(){
        try{
            $connection = new MongoDB\Client;
        } catch (MongoDBDriverExceptionException $e){
            echo $e->getMessage();
            echo nl2br("n");
        }
    }
    function getConnection(){
        return $this->connection;
    }
}


?>