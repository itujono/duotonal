<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe_m extends MY_Model{
	
	protected $_table_name = 'default_subscribe';
	protected $_order_by = 'idUSER';
	protected $_primary_key = 'idUSER';

	public $rules_subscribe = array(
		'emailSUBSCRIBE' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
			)
		);

	function __construct (){
		parent::__construct();
	}

	public function get_new(){
		$new = new stdClass();
		$new->idSUBSCRIBE = '';
		$new->emailSUBSCRIBE = '';
		return $new;
	}

	public function selectall_subscribe($id=NULL){
		$this->db->select('*');
		$this->db->from('subscribe');
		if($id != NULL){
			$this->db->where('idSUBSCRIBE',$id);
		}
		return $this->db->get();
	}
}