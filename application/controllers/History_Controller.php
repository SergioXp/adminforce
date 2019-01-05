<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class History_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('User_Model', '', TRUE);
		$this->load->model('Object_Model', '', TRUE);
        $this->load->model('History_Model', '', TRUE);

        $this->load->library('pagination');
        $this->load->helper('url');
    }

    function index() {
        log_message('debug','index History_Controller');

        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->History_Model->get_total();

        if ($total_records > 0) {
            $data['objectsByUser'] = $this->History_Model->get_current_page_records($limit_per_page, $start_index);

            $config['base_url'] = base_url() . 'index.php/History_Controller/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config['uri_segment'] = 3;

            // custom paging configuration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'Primera pág.';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Última pág.';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = 'Siguiente pág.';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = 'Página ant.';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
        }

        $this->load->view('Form_History_View', $data);
    }

    public function find ($search){
        log_message('debug','index find');

        $data['objectsByUser'] = $this->History_Model->search($search);

        $this->load->view('Form_History_View', $data);
	}
}
?>