<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Login extends REST_Controller {

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
        parent::__construct();
    }

    public function index_get(){
        echo "Login Here";
    }

}
