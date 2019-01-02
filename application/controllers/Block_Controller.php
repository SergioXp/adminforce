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
        //$userStoryJira = $this->input->post('userStoryJira');
        $dev = $this->input->post('dev');

        if ($name == '' && $nameMultiple != ''){
            $arrayObjetos = explode(PHP_EOL, $nameMultiple);

            $arrayReturn = array();

            foreach($arrayObjetos as $object){
                //$return = $this->Object_Model->blockObject($object, $type, $object, $userStoryJira, $dev);
                $return = $this->Object_Model->blockObject($object, $type, $object, $dev);

                $arrayReturn[$object] = $return;
            }

            $arrayReturn['objectsByUser'] = $this->Object_Model->getObjectsBlockByUser();

            log_message('debug', 'SALIDA TOTAL' . print_r($arrayReturn, true));

            $this->load->view('form_object_view', $arrayReturn);

        } else {
            //$return = $this->Object_Model->blockObject($name, $type, $object, $userStoryJira, $dev);
            $return = $this->Object_Model->blockObject($name, $type, $object, $dev);

            $return['objectsByUser'] = $this->Object_Model->getObjectsBlockByUser();

            log_message('debug', 'SALIDA TOTAL' . print_r($return, true));

            $this->load->view('form_object_view', $return);
        }
    }

    function unblock($id){
        log_message('debug', 'unblock');

        $return = $this->Object_Model->unblockObject($id);
        $return['objectsByUser'] = $this->Object_Model->getObjectsBlockByUser();
        $this->load->view('form_object_view', $return);
    }
}
?>