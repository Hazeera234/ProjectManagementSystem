<?php
require_once __DIR__ ."/../core/control.php";


class UserController extends Controller {
    private  $userModel; 

    public function __construct() {
        parent::__construct();
        $this->userModel = new UserModel(); 
        $this->initNav();
    }