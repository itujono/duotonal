<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct (){
		parent::__construct();
	}

	public function index(){
		$data[]='';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$this->load->view('Home', $data, FALSE);
	}

	public function v2(){
		$data[]='';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$this->load->view('Home2', $data, FALSE);
	}

	public function v3(){
		$data[]='';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$this->load->view('Home3', $data, FALSE);
	}

	public function v4(){
		$data[]='';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$this->load->view('Home4', $data, FALSE);
	}

	public function v5(){
		$data[]='';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$this->load->view('Home5', $data, FALSE);
	}

	public function v6(){
		$data[]='';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$this->load->view('Home5', $data, FALSE);
	}
}