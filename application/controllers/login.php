<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('id')) {
            $data['username'] = $this->session->userdata('username');
            $this->load->view('home_view', $data);
        } else {
            $this->load->view('login_view');
        }
    }

    function logout() {
        session_destroy();
        $this->load->view('login_view');
    }

}

?>