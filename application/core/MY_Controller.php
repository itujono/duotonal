<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public $data = array();
	public function __construct() {
		parent::__construct();

		$this->data['folder_admin'] = 'admin/';
		ini_set('allow_url_fopen',1);
		if ($this->session->userdata('loggedin') == FALSE)redirect('login');
	}
	
}