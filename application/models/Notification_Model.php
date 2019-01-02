<?php

Class Notification_Model extends CI_Model {

	public $id;
	public $read;
	public $object;
	public $date;
	public $user;

	function addNotification ($user, $object){

		$data = array(
			'read' => false,
			'object' => $object,
			'user' => $user,
			'date' => date("Y-m-d H:i:s")
		);

		$this->db->insert('notification', $data);
	}

	function getNotification ($user) {
		$this->db->where('user', $user);
		$this->db->where('read', false);

		$query = $this->db->get('notification');

        if ($query->num_rows() > 0){
            return $query->result('Notification_Model');
        } else {
            return false;
        }
	}

	function readNotification ($user){
		$data = array(
			'read' => true,
		);

		$this->db->update('notification', $data, 'user = ' . $user . ' and read = false');
	}

}

?>