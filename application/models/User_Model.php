<?php

Class User_Model extends CI_Model {

    public $id;
    public $user;
    public $password;
    public $email;
    public $dev;
    public $name;
    public $connection;
    public $active;

    function login($username, $password) {
        log_message('debug', 'Modelo User_Model Metodo login()');

        $this->db->select('ID, USER, PASSWORD, NAME');
        $this->db->from('USER');
        $this->db->where('USER', $username);
        $this->db->where('PASSWORD', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function checkPassword($password) {
        log_message('debug', 'Modelo User_Model Metodo checkPassword(' . MD5($password) . ')');

        $query = $this->db->select('PASSWORD')->where('PASSWORD', MD5($password))->get('USER');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function changePassword($password) {
        log_message('debug', 'Modelo User_Model Metodo changePassowrd(' . $password . ')');

        $this->db->update('USER', array('PASSWORD' => MD5($password)), 'id = ' . $this->session->userdata('id'));
    }

}

?>