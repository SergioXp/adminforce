<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model', '', TRUE);

        $this->load->helper('url');
    }

    function index() {
        log_message('debug','index Profile_Controller');

        $data['userData'] = $this->User_Model->getUser($this->session->userdata('id'));

        $this->load->view('Profile_view', $data);
    }

    function updateProfile(){
        log_message('debug','index updateProfile');

        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $passwordRepeat = $this->input->post('passwordRepeat');
        $dev = $this->input->post('dev');
        $email = $this->input->post('email');

       if ($password != '' && $passwordRepeat != null && $password == $passwordRepeat){
           $this->User_Model->changePassword($password);
       }

       $this->User_Model->updateProfile($username, $name, $dev, $email);

       $this->User_Model->getUser($this->session->userdata('id'));

       redirect('Profile_Controller');

    }
}
?>