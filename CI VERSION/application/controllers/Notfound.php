<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Notfound_m');
	}

	public function index(){

		//BRUTE FORCE LOGIN INFORMATION START HERE
		if ($this->agent->is_browser()){
		$agent = $this->agent->browser();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'GAGAL';
		}
		$ip = $this->input->ip_address();
		$geo = json_decode(file_get_contents('http://ip-api.com/json/'.$ip),TRUE);
		$data['urlNOTFOUND'] = base_url(uri_string());
		$data['ipNOTFOUND'] = $geo["query"];
		$data['browserNOTFOUND'] = $agent;
		$data['osNOTFOUND'] = $this->agent->platform();
		$data['cityNOTFOUND'] = $geo["city"];
		$data['regionNOTFOUND'] = $geo["regionName"];
		$data['countryNOTFOUND'] = $geo["country"];
		$data['ispNOTFOUND'] = $geo["isp"];

		// echo "<pre>";
		// print_r($data);
		// break;

		$this->Notfound_m->save($data);
		//BRUTE FORCE LOGIN INFORMATION END HERE

		$this->load->view('notfound');
	}
}