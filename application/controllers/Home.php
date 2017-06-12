<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct (){
		parent::__construct();
		//$this->load->model('');
	}

	public function index(){
		$data[]='';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$this->load->view('Home', $data, FALSE);
	}
}