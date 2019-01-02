<?php

Class Object_Model extends CI_Model {

    public $id;
    public $name;
    public $type;
    public $blocked;
    public $blockeddate;
    public $userblock;
    public $object;
    //public $userStoryCopado;
    public $dev;
    //public $userStoryJira;
    public $unblockeddate;

	function getObject($id, $name, $type, $object){
        log_message('debug', 'Modelo Object_Model Metodo getObject()');

        //$this->db->select('id, name, type, blocked, blockeddate, unblockeddate, userblock, object, userStoryCopado, userStoryJira, dev');
        $this->db->select('id, name, type, blocked, blockeddate, unblockeddate, userblock, object, dev');
        $this->db->from('object');
        if ($id != null) $this->db->where('id', $id);
        if ($name != null) $this->db->where('name', $name);
        if ($type != null) $this->db->where('type', $type);
        if ($object != null) $this->db->where('object', $object);

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result('Object_Model');
        } else {
            return false;
        }
    }

    function getObjectsBlockByUser(){

        log_message('debug', 'Modelo Object_Model Metodo getObjectsBlockByUser()');

        //$this->db->select('id, name, type, blocked, blockeddate, userblock, object, userStoryCopado, userStoryJira, dev');
        $this->db->select('id, name, type, blocked, blockeddate, userblock, object, dev');
        $this->db->from('object');
        $this->db->where('userblock', $this->session->userdata('id'));

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result('Object_Model');
        } else {
            return false;
        }

    }

    //function blockObject($name, $type, $object, $userStoryJira, $dev){
    function blockObject($name, $type, $object, $dev, $user = null){

        $this->load->model('Lobby_Model');

        log_message('debug', 'Modelo Object_Model Metodo blockObject()');

        $objectReturn = $this->getObject(null, $name, $type, $object);

        if ($user == null){
            $user = $this->session->userdata('id');
        }

        if ($objectReturn && !$objectReturn[0]->blocked){

            $data = array(
                'blocked' => true,
                'blockeddate' => date("Y-m-d H:i:s"),
                'userblock' => $user,
                //'userStoryJira' => $userStoryJira,
                'dev' => $dev
            );

            $this->db->update('object', $data, 'id = ' . $objectReturn[0]->id);

            $objectReturn = $this->getObject($objectReturn[0]->id, null, null, null);

            $objectReturn[0]->action = "Bloqueo";
            $objectReturn[0]->id = null;

            $this->db->insert('historial', $objectReturn[0]);

            $return['return'] = 'update';
            $return['error'] = false;
            $return['object'] = $data;
            return $return;

        } else if ($objectReturn && $objectReturn[0]->blocked) {

            if( $objectReturn[0]->userblock == $this->session->userdata('id')) {
                $return['return'] = 'blockedRightNow';
                $return['error'] = true;
                $return['msg'] = 'Objeto bloqueado por <strong>TU</strong> usuario.';
                $return['object'] = $objectReturn;

                return  $return;
            }

            $data = array(
                'ObjectId' => $objectReturn[0]->id,
                'UserId' => $this->session->userdata('id'),
                'Waiting' => true,
                'DatePetition' => date("Y-m-d H:i:s"),
                //'DateAsign' => $dev
            );

            $lobbyObject = $this->Lobby_Model->getLobbyByObject($objectReturn[0]->id, 1, $this->session->userdata('id'));

            if (!is_array($lobbyObject)){
                log_message('debug', 'Antes de guardar en el lobby ' . print_r($lobbyObject, true) );

                $this->db->insert('lobby', $data);

                $return['return'] = 'blockedInLobby';
                $return['error'] = true;
                $return['msg'] = 'Estás en la cola para este objeto.';
                $return['object'] = $objectReturn;
                return  $return;
            } else {
                $return['return'] = 'blockedInLobby';
                $return['error'] = true;
                $return['msg'] = 'Ya te encontrabas en la cola para este objeto.';
                $return['object'] = $objectReturn;
                return  $return;
            }

        } else {

            $data = array(
                'name' => $name,
                'type' => $type,
                'blocked' => true,
                'blockeddate' => date("Y-m-d H:i:s"),
                'userblock' => $user,
                'object' => $object,
                //'userStoryJira' => $userStoryJira,
                'dev' => $dev
            );

            $this->db->insert('object', $data);

            $data['action'] = "Bloqueo";
            $this->db->insert('historial', $data);

            $return['return'] = 'insert';
            $return['error'] = false;
            $return['object'] = $data;
            return $return;
        }

    }

    function unblockObject($id){

        $this->load->model('Lobby_Model', '', TRUE);

        log_message('debug', 'Modelo Object_Model Metodo unblockObject()');

        $objectReturn = $this->getObject($id, null, null, null);

        $data = array(
            'blocked' => false,
            //'blockeddate' => date("Y-m-d H:i:s"),
            'unblockeddate' => date("Y-m-d H:i:s"),
            'userblock' => null,
            //'userStoryJira' => null,
            'dev' => null
        );

        $this->db->update('object', $data, 'id = '.$id);

        $objectReturn[0]->action = "Desbloqueo";
        $objectReturn[0]->unblockeddate = date("Y-m-d H:i:s");
        $objectReturn[0]->id = null;

        $this->db->insert('historial', $objectReturn[0]);

        $lobby = $this->Lobby_Model->remove($id);
    }

}

?>