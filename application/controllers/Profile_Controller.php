<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('User_Model', '', TRUE);
    }

    function index() {
        log_message('debug','index Profile_Controller');
    }
}
?>