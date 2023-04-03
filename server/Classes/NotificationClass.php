<?php

class Notification {
    private $message;
    private $origin;
    private $reciever;
    private $options = [];
    private $client;
    private $collection;
    private $currentTime;
    function __construct(){
        $this->client = new MongoDB\Client;
        $this->collection = $this->client->Prodeo->Notifications;
    }
    public static function welcome($user){
        $object = new self();
        $object->reciever = $user;
        $object->origin = 'System';
        $object->message = "Welcome to Prodeo";
        $object->currentTime = date('d-m-y h:i:s');
        return $object;
    }
    public static function customSystemNotification($user, $message, $options = []){
        $object = new self();
        $object->reciever = $user;
        $object->origin = 'System';
        $object->message = $message;
        $object->options = $options;
        $object->currentTime = date('d-m-y h:i:s');
        return $object; 
    }
    public static function getNotifications($user){
        $object = new self();
        $result = $object->collection->find(
            [
                'Reciever'      => $user
            ],
            [
                'sort'          => ['Time' => -1]
            ]
        );
        return $result;
    }
    public static function sendInvitation($reciever, $origin, $Project){
        $invitation = new self();
        $invitation->reciever = $reciever;
        $invitation->origin = $origin;
        $invitation->message = $origin + " has invited you to work on " + $Project;
        $invitation->currentTime = date('d-m-y h:i:s');
        $invitation->options =  ["Accept" , "Decline"];
        $invitation->sendNotification();

        $log = new self();
        $log->reciever = $origin;
        $log->origin = 'System';
        $log->message = "You have invited " + $reciever + " to work on " + $Project;
        $log->currentTime = date('d-m-y h:i:s');
        $log->options = ["Cancel Invitation"];
        $log->sendNotification;
    }
    public static function acceptInvitation($accepted, $reciever, $origin, $Project){
        $invitationStatus = new self();
        $invitationStatus->reciever = $reciever;
        $invitationStatus->origin = $reciever;
        if($accepted == 1){
            $invitationStatus->message = "You have accepted to work on " + $Project;
        } else {
            $invitationStatus->message = "You have declined to work on " + $Project;
        }
        $invitationStatus->currenTime = date('d-m-y h:i:s');
        $invitationStatus->options = [];
        $invitationStatus->sendNotification();

        $sendToOrigin = new self();
        $sendToOrigin->reciever = $reciever;
        $sendToOrigin->origin = $origin;
        $sendToOrigin->message = $origin + " has accepted your invitation to work on " + $Project;
        $sendToOrigin->currentTime = date('d-m-y h:i:s');
        $sendToOrigin->options = [];
        $sendToOrigin->sendNotification();
        
    }
    function sendNotification(){
        $this->collection->insertOne(
            [
                'Reciever' => $this->reciever,
                'Origin'   => $this->origin,
                'Message'  => $this->message,
                'Options'  => $this->options,
                'Time'     => $this->currentTime
            ]
            );
    }
}




?>
