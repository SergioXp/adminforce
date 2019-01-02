<?php

Class Lobby_Model extends CI_Model {

	public $id;
	public $objectId;
	public $userId;
	public $waiting;
	public $datePetition;
	public $dateAsign;

	function getLobbyByUser($userId, $waiting = 1) {

		$this->db->select('id, objectId, userId, waiting, datePetition, dateAsign');
		$this->db->from('lobby');
		$this->db->where('userId', $userId);
		$this->db->where('waiting', $waiting);

		$query = $this->db->get();

		if ($query->num_rows() > 0){
            return $query->result('Lobby_Model');
        } else {
            return false;
        }

	}

	function getLobbyByObject($objectId, $waiting = 1, $userId = null) {

		$this->db->select('id, objectId, userId, waiting, datePetition, dateAsign');
		$this->db->from('lobby');
		$this->db->where('objectId', $objectId);
		$this->db->where('waiting', $waiting);
		if ($userId != null) $this->db->where('userId', $userId);
		$this->db->order_by('datePetition', 'asc');

		$query = $this->db->get();

		if ($query->num_rows() > 0){
            return $query->result('Lobby_Model');
        } else {
            return false;
        }
	}

	function remove ($objectId, $asignar = true){

		$this->load->model('Object_model');

		$lobby = $this->getLobbyByObject($objectId);

		log_message('debug', 'lobby '. print_r($lobby, true));

		if (is_array($lobby)){

			$object = $this->Object_model->getObject($lobby[0]->objectId, null, null, null);

			$this->Object_Model->blockObject($object[0]->name, $object[0]->type, $object[0]->object, $object[0]->dev, $lobby[0]->userId);

			$lobby[0]->waiting = false;
			$this->db->update('lobby', $lobby[0], 'id = '.$lobby[0]->id);

			$dataNotification = array(
				'user' => $lobby[0]->userId,
				'read' => false,
				'object' => $object[0]->name,
				'date' => date("Y-m-d H:i:s"),
			);

			$this->db->insert('notification', $dataNotification);
		}
	}

}

?>