<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class History_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('User_Model', '', TRUE);
		$this->load->model('Object_Model', '', TRUE);
		$this->load->model('History_Model', '', TRUE);		
    }

    function index() {
        log_message('debug','index blockobject');

        $data['objectsByUser'] = $this->History_Model->getHistorial();

        $this->load->view('Form_History_View', $data);
    }
}
?>