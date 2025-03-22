<?php
require_once __DIR__ ."/../Models/User.php";
require_once __DIR__ ."/../Models/Chat.php";
ob_start();
class Controller{
    private $userModel;
    private $chatModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $this->userModel = new UserModel();
        $this->chatModel = new ChatModel();
    }
