<?php

require 'vendor/autoload.php';


class Authenticate{
    private $email;    
    private $username;
    private $password;
    private $client;
    private $collection;

    function __construct(){
        $this->client       = new MongoDB\Client;
        $this->collection   = $this->client->Prodeo->users; 
    }

    public static function register($email, $username, $password){
        $newObject = new Authenticate();
        $newObject->email        = $email;
        $newObject->username     = $username;
        $newObject->password     = $password;

        return $newObject;
    }

    function checkValidPassword(){

        $hasNumber = preg_match('@[0-9]@', $this->password);
        $hasCapital = preg_match('@[A-Z]@', $this->password);
        $hasSpecial = preg_match('[@_!#$%^&*()<>?/|}{~:]', $this->password);
        $LongPassword = false;
        if (strlen($this->password) >= 8){
            $LongPassword = true;
        } else {
            $LongPassword = false;
        }
    
    
        if ($hasNumber and $hasCapital and $hasSpecial and $LongPassword){
            return true;
        } else {
            return false;
        }
    
    }
    
    #   checkValidEmail() function checks for valid email, rerturns 1 if valid, returns 0 for already registered email and returns -1 for invalid emails.
    
    function checkValidEmail(){
    
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return -1 ;
        }
    
    
        $result = $this->collection->count(
            ['_id' => $this->email]
        );
    

        if ($result == 1 ){
            return 0;
        } else {
            return 1;
        }
    }
    
    
    #   checkValidUsername() checks for valid username. returns 1 for valid email, returns 0 for already registered username
    #   and -1 for invalid username
    
    function checkValidUsername(){
    
        if (strlen($this->username) <= 3 or strlen($this->username) > 30){
            return -1;
        }
    
    
        $result = $this->collection->count(
            [ 'Username' => $this->username]
        );
    
        if ($result == 1){
            return 0;
        } else {
            return 1;
        }
    }
    
    
    function checkValidSignup(){
    
        $isValidEmail = $this->checkValidEmail();
        if ($isValidEmail == -1){
            return 'Please provide a valid email.';
        } else if ($isValidEmail == 0){
            return 'The given email is already registered.';
        }
    
    
        $isValidUsername = $this->checkValidUsername();
        if ($isValidUsername == -1){
            return 'The username must be greater than 3 and lesser than 30 Characters long.';
        } else if ($isValidUsername == 0){
            return 'The given username is unvailable';
        }
    
    
        $isValidPassword = $this->checkValidPassword();
        if ($isValidPassword){
            return 'The password must be 8 charaters long and contain a Number , a Capital letter and a special character';
        }
    
    
        return 'Success';
    }
    
    
    #   SignUP() checks for all the constraints for username, password and email. If anything is invalid returns a message telling what is wrong 
    #   If everything is valid it outputs 1
    
    function signup(){
    
        $isValidEmail = $this->checkValidEmail();
        if ($isValidEmail == -1){
            return false;
        } else if ($isValidEmail == 0){
            return false;
        }
    
    
        $isValidUsername = $this->checkValidUsername();
        if ($isValidUsername == -1){
            return false;
        } else if ($isValidUsername == 0){
            return false;
        }
    
    
        $isValidPassword = $this->checkValidPassword();
        if ($isValidPassword){
            return false;
        }
    
    
        $this->collection->insertOne(
            [
                '_id'       => $this->email,
                'Username'  => $this->username,
                'Password'  => $this->password,
                'Type'  => 'regular'
            ]
            );
        
        return true;
    }

}


class User{
    private $username;
    private $password;
    private $client;
    private $connection;
    private $collection;

    function _construct($username, $password){
        $this->username = $username;
        $this->password = $password;

        $this->client = new Client();
        $this->connection = $this->client->getConnection();
        $this->collection = $this->connection->Prodeo->users;
    }
}

?>