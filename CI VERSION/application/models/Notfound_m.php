<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound_m extends MY_Model{
	
	protected $_table_name = 'default_notfound';
	protected $_order_by = 'idNOTFOUND';
	protected $_primary_key = 'idNOTFOUND';

	function __construct (){
		parent::__construct();
	}

	public function selectallnotfound($id = NULL){
		$this->db->select('*');
		$this->db->from('notfound');
		if($id != NULL){
			$this->db->where('idNOTFOUND', $id);
		}
		return $this->db->get();
	}
}