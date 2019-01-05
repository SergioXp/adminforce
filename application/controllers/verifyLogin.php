<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model', '', TRUE);
    }

    function index() {

        $this->form_validation->set_rules('username', 'Usuario', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            redirect('', 'refresh');
        }
    }

    function check_database($password) {
        log_message('debug', 'checkdatabase');
        $username = $this->input->post('username');

        $result = $this->User_Model->login($username, $password);

        log_message('debug', 'el logiiiinnnn ' . print_r($result, true));

        if ($result) {
            log_message('debug', 'Usuario encontrado');
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->ID,
                    'username' => $row->NAME
                );
                log_message('debug', 'Array ' . print_r($sess_array, true));
                $this->session->set_userdata($sess_array);
                log_message('debug', 'Sesión seteada ' . print_r($this->session->all_userdata(), true));
            }
            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Usuario o password incorrectos');
            return false;
        }
    }
}
?>