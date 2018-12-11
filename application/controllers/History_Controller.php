<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class History_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('User_Model', '', TRUE);
		$this->load->model('Object_Model', '', TRUE);
		$this->load->model('History_Model', '', TRUE);		
    }

    function index() {
        log_message('debug','index blockobject');

        $data['objectsByUser'] = $this->Object_Model->getObjectsBlockByUser();

        $this->load->view('Form_History_View', $data);
    }

    function block (){
        log_message('debug', 'block');

        $name = $this->input->post('name');
        $nameMultiple = $this->input->post('nameMultiple');
        $type = $this->input->post('type');
        $object = $this->input->post('object');
        $userStoryJira = $this->input->post('userStoryJira');
        $dev = $this->input->post('dev');

        if ($name == '' && $nameMultiple != ''){
            $arrayObjetos = explode(PHP_EOL, $nameMultiple);
            log_message('debug', ' po no que es multiple ' . print_r($arrayObjetos, true));

            $arrayReturn = array();

            foreach($arrayObjetos as $object){
                $return = $this->Object_Model->blockObject($object, $type, $object, $userStoryJira, $dev);

                $arrayReturn[$object] = $return;
            }

            $this->load->view('form_object_view', $arrayReturn);

        } else {
            $return = $this->Object_Model->blockObject($name, $type, $object, $userStoryJira, $dev);
            log_message('debug', 'return block ' . print_r($return, true));

            $this->load->view('form_object_view', $return);
        }
    }

    function unblock($id){

        log_message('debug', 'unblock');

        $return = $this->Object_Model->unblockObject($id);

    }
}
?>