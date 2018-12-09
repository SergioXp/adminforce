<?php

Class Object extends CI_Model {

    public $id;
    public $name;
    public $type;
    public $blocked;
    public $blockeddate;
    public $userblock;
    public $object;
    public $userStoryCopado;
    public $dev;
    public $userStoryJira;
    public $unblockeddate;

	function getObject($id, $name, $type, $object){
        log_message('debug', 'Modelo object Metodo getObject()');

        $this->db->select('id, name, type, blocked, blockeddate, unblockeddate, userblock, object, userStoryCopado, userStoryJira, dev');
        $this->db->from('object');
        if ($id != null) $this->db->where('id', $id);
        if ($name != null) $this->db->where('name', $name);
        if ($type != null) $this->db->where('type', $type);
        if ($object != null) $this->db->where('object', $object);

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result('Object');
        } else {
            return false;
        }
    }

    function getObjectsBlockByUser(){

        log_message('debug', 'Modelo object Metodo getObjectsBlockByUser()');

        $this->db->select('id, name, type, blocked, blockeddate, userblock, object, userStoryCopado, userStoryJira, dev');
        $this->db->from('object');
        $this->db->where('userblock', $this->session->userdata('id'));

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result('Object');
        } else {
            return false;
        }

    }

    function blockObject($name, $type, $object, $userStoryJira, $dev){

        log_message('debug', 'Modelo object Metodo blockObject()');

        $objectReturn = $this->getObject(null, $name, $type, $object);

        if ($objectReturn && !$objectReturn[0]->blocked){

            $data = array(
                'blocked' => true,
                'blockeddate' => date("Y-m-d H:i:s"),
                'userblock' => $this->session->userdata('id'),
                'userStoryJira' => $userStoryJira,
                'dev' => $dev
            );

            $this->db->update('object', $data, 'id = ' . $objectReturn[0]->id);

            $objectReturn = $this->getObject($objectReturn[0]->id, null, null, null);

            $this->db->insert('historial', $objectReturn[0]);

            $return['return'] = 'update';
            $return['error'] = false;
            $return['object'] = $data;
            return $return;

        } else if ($objectReturn && $objectReturn[0]->blocked) {
            $return['return'] = 'blockedRightNow';
            $return['error'] = true;
            $return['object'] = $objectReturn;
            return  $return;

        } else {

            $data = array(
                'name' => $name,
                'type' => $type,
                'blocked' => true,
                'blockeddate' => date("Y-m-d H:i:s"),
                'userblock' => $this->session->userdata('id'),
                'object' => $object,
                'userStoryJira' => $userStoryJira,
                'dev' => $dev
            );

            $this->db->insert('object', $data);

            $this->db->insert('historial', $data);

            $return['return'] = 'insert';
            $return['error'] = false;
            $return['object'] = $data;
            return $return;
        }

    }

    function unblockObject($id){

        log_message('debug', 'Modelo object Metodo unblockObject()');

        $data = array(
            'blocked' => false,
            'blockeddate' => date("Y-m-d H:i:s"),
            'unblockeddate' => date("Y-m-d H:i:s"),
            'userblock' => null,
            'userStoryJira' => null,
            'dev' => null
        );

        $this->db->update('object', $data, 'id = '.$id);
    }

}

?>