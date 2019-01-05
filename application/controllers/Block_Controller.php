<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Block_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('User_Model', '', TRUE);
        $this->load->model('Object_Model', '', TRUE);
        $this->load->model('History_Model', '', TRUE);
        $this->load->model('Notification_Model', '', TRUE);
    }

    function index() {
        log_message('debug','index block_object');

        $data['notifications'] = $this->Notification_Model->getNotification($this->session->userdata('id'));
        $this->Notification_Model->readNotification($this->session->userdata('id'));

        $data['objectsByUser'] = $this->Object_Model->getObjectsBlockByUser();

        $this->load->view('form_object_view', $data);
    }

    function block (){
        log_message('debug', 'block');

        $name = $this->input->post('name');
        $nameMultiple = $this->input->post('nameMultiple');
        $type = $this->input->post('type');
        $object = $this->input->post('object');
        $dev = $this->input->post('dev');

        if ($name == '' && $nameMultiple != ''){
            $arrayObjetos = explode(PHP_EOL, $nameMultiple);

            foreach($arrayObjetos as $object){
                $this->Object_Model->blockObject($object, $type, $object, $dev);
            }

            $this->Object_Model->getObjectsBlockByUser();

            redirect('Block_Controller');

        } else {
            $this->Object_Model->blockObject($name, $type, $object, $dev);

            $this->Object_Model->getObjectsBlockByUser();

            redirect('Block_Controller');
        }
    }

    function unblock($id){
        log_message('debug', 'unblock');

        $this->Object_Model->unblockObject($id);
        $this->Object_Model->getObjectsBlockByUser();
        redirect('Block_Controller');
    }
}
?>