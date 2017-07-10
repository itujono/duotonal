<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_m extends MY_Model{
	
	protected $_table_name = 'default_agents';
	protected $_order_by = 'idAGENT';
	protected $_primary_key = 'idAGENT';

	function __construct (){
		parent::__construct();
	}

	public function selectallbrute($id = NULL){
		$this->db->select('*');
		$this->db->from('agents');
		if($id != NULL){
			$this->db->where('idAGENT', $id);
		}
		return $this->db->get();
	}

	public function checkloginforce($email){
		$this->db->select('emailAGENT');
		$this->db->from('agents');
		$this->db->where('emailAGENT', $email);

		return $this->db->get();
	}
}