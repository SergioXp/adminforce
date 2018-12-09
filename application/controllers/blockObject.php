<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BlockObject extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('user', '', TRUE);
		$this->load->model('object', '', TRUE);
    }

    function index() {
        log_message('debug','index blockobject');

        $data['objectsByUser'] = $this->object->getObjectsBlockByUser();

        $this->load->view('form_object_view', $data);
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
                $return = $this->object->blockObject($object, $type, $object, $userStoryJira, $dev);

                $arrayReturn[$object] = $return;
            }

            $this->load->view('form_object_view', $arrayReturn);

        } else {
            $return = $this->object->blockObject($name, $type, $object, $userStoryJira, $dev);
            log_message('debug', 'return block ' . print_r($return, true));

            $this->load->view('form_object_view', $return);
        }
    }

    function unblock($id){

        log_message('debug', 'unblock');

        $return = $this->object->unblockObject($id);

    }
}
?>