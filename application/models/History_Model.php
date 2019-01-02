<?php

Class History_Model extends CI_Model {

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

	//function getHistorial($id = null, $name = null, $type = null, $object = null, $blockeddate = null, $unbblockeddate = null, $userStoryCopado = null, $userStoryJira = null, $dev = null){
	function getHistorial($id = null, $userblock = null,  $name = null, $type = null, $object = null, $blockeddate = null, $unbblockeddate = null, $dev = null){
        log_message('debug', 'Modelo History_Model Metodo getHistorial()');

        //$this->db->select('id, name, type, blocked, blockeddate, unblockeddate, userblock, object,action, userStoryCopado, userStoryJira, dev');
        $this->db->select('historial.id, historial.name, historial.type, historial.blocked, historial.blockeddate, historial.unblockeddate, user.name as `userblock`, historial.object, historial.action, historial.dev');
		$this->db->from('historial');
		$this->db->join('user', 'historial.userblock = user.id');

		if ($id != null) $this->db->where('historial.id', $id);
		if ($userblock != null) $this->db->where('historial.userblock', $userblock);
		if ($name != null) $this->db->where('historial.name', $name);
		if ($type != null) $this->db->where('historial.type', $type);
		if ($object != null) $this->db->where('historial.object', $object);
		if ($blockeddate != null) $this->db->where('historial.blockeddate', $blockeddate);
		if ($unbblockeddate != null) $this->db->where('historial.unbblockeddate', $unbblockeddate);
		//if ($userStoryCopado != null) $this->db->where('userStoryCopado', $userStoryCopado);
		//if ($userStoryJira != null) $this->db->where('userStoryJira', $userStoryJira);
		if ($dev != null) $this->db->where('historial.dev', $dev);

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result('History_Model');
        } else {
            return false;
        }
	}

	//function addHistorial ($name, $type, $blocked, $object, $blockeddate, $unbblockeddate, $userStoryCopado, $userStoryJira, $dev){
	function addHistorial ($name, $type, $blocked, $object, $blockeddate, $unbblockeddate, $dev){

		log_message('debug', 'Modelo History_Model Metodo addHistorial()');

		$data = array(
			'name' => $name,
			'type' => $type,
			'blocked' => $blocked,
			'blockeddate' => ($blocked) ? date("Y-m-d H:i:s") : null,
			'unblockeddate' => (!$blocked) ? date("Y-m-d H:i:s") : null,
			'userblock' => $this->session->userdata('id'),
			'object' => $object,
			//'userStoryCopado' => $userStoryCopado,
			//'userStoryJira' => $userStoryJira,
			'dev' => $dev
		);

		$this->db->insert('historial', $data);
	}

	public function get_total(){
        return $this->db->count_all('historial');
	}

	public function get_current_page_records($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->where('userblock', $this->session->userdata('id'));
		$this->db->select('historial.id, historial.name as `name`, historial.type, historial.object, historial.action, historial.userblock, user.name as `username`, historial.blockeddate, historial.unblockeddate, historial.unblockeddate, historial.dev');
		$this->db->join('user', 'historial.userblock = user.id');
		$query = $this->db->get('historial');

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}

		return false;
	}

}

?>