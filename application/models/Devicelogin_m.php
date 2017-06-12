<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devicelogin_m extends MY_Model{
	
	protected $_table_name = 'default_devicelogin';
	protected $_order_by = 'idDEVICE';
	protected $_primary_key = 'idDEVICE';

	function __construct (){
		parent::__construct();
	}

	public function selectalldevicelogin(){
		$this->db->select('*');
		$this->db->from('devicelogin');
		return $this->db->get();
	}

	public function checkingdevicelogin($id = NULL){
		$this->db->select('*');
		$this->db->from('devicelogin');
		if($id != NULL){
			$this->db->where('idUSER', $id);
		}

		return $this->db->get();
	}

	public function getfirstcreateddevice($id = NULL){
		$this->db->select('idUSER, createdateDEVICE');
		$this->db->from('devicelogin');
		if($id != NULL){
			$this->db->where('idUSER', $id);
		}
		$this->db->order_by('createdateDEVICE', 'asc');
		return $this->db->get();
	}

	function deletedatadevice($id){
        $this->db->where('idUSER', $id);
        $this->db->delete('devicelogin');
    }
}