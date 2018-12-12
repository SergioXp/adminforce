<?php

Class History_Model extends CI_Model {

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

	function getHistorial($id = null, $name = null, $type = null, $object = null, $blockeddate = null, $unbblockeddate = null, $userStoryCopado = null, $userStoryJira = null, $dev = null){
        log_message('debug', 'Modelo History_Model Metodo getHistorial()');

        $this->db->select('id, name, type, blocked, blockeddate, unblockeddate, userblock, object,action, userStoryCopado, userStoryJira, dev');
		$this->db->from('historial');

		if ($id != null) $this->db->where('id', $id);
		if ($name != null) $this->db->where('name', $name);
		if ($type != null) $this->db->where('type', $type);
		if ($object != null) $this->db->where('object', $object);
		if ($blockeddate != null) $this->db->where('blockeddate', $blockeddate);
		if ($unbblockeddate != null) $this->db->where('unbblockeddate', $unbblockeddate);
		if ($userStoryCopado != null) $this->db->where('userStoryCopado', $userStoryCopado);
		if ($userStoryJira != null) $this->db->where('userStoryJira', $userStoryJira);
		if ($dev != null) $this->db->where('dev', $dev);

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result('History_Model');
        } else {
            return false;
        }
	}

	function addHistorial ($name, $type, $blocked, $object, $blockeddate, $unbblockeddate, $userStoryCopado, $userStoryJira, $dev){

		log_message('debug', 'Modelo History_Model Metodo addHistorial()');

		$data = array(
			'name' => $name,
			'type' => $type,
			'blocked' => $blocked,
			'blockeddate' => ($blocked) ? date("Y-m-d H:i:s") : null,
			'unblockeddate' => (!$blocked) ? date("Y-m-d H:i:s") : null,
			'userblock' => $this->session->userdata('id'),
			'object' => $object,
			'userStoryCopado' => $userStoryCopado,
			'userStoryJira' => $userStoryJira,
			'dev' => $dev
		);

		$this->db->insert('historial', $data);
	}

}

?>