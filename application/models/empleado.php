<?php

Class Empleado extends CI_Model {

    function login($username, $password) {
        log_message('debug', 'Modelo Empleado Metodo login()');

        $this->db->select('ID, USER, PASSWORD');
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
        log_message('debug', 'Modelo Empleado Metodo checkPassword(' . MD5($password) . ')');

        $query = $this->db->select('PASSWORD')->where('PASSWORD', MD5($password))->get('USER');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function changePassword($password) {
        log_message('debug', 'Modelo Empleado Metodo changePassowrd(' . $password . ')');

        $this->db->update('USER', array('PASSWORD' => MD5($password)), 'id = ' . $this->session->userdata('id'));
    }

    function getEntornos($idEmpleado) {
        log_message('debug', 'Modelo Empleado Metodo getEntornos()');
        $this->db->select('ID_ENTORNO');
        $this->db->from('GE_EMPLEADO_ENTORNO');
        $this->db->where('ID_EMPLEADO', $idEmpleado);
        $this->db->where('VALIDO', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $idEntornos = array('id' => $row->ID_ENTORNO);
            }

            log_message('debug', $idEntornos);
            $this->db->select('NOMBRE');
            $this->db->from('GE_ENTORNO');
            $this->db->where_in('ID', $idEntornos);
            $this->db->where('VALIDO', 1);

            $query = $this->db->get();

            return $query->result();
        } else {
            return false;
        }
    }

}

?>