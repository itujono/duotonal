<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends MY_Model{
	
	protected $_table_name = 'default_users';
	protected $_order_by = 'idUSER';
	protected $_primary_key = 'idUSER';

	public $rules_login = array(
		'emailUSER' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
			),
		'passwordUSER' => array(
			'field' => 'password',
			'label' => 'Kata sandi',
			'rules' => 'trim|required|min_length[8]'
			),
		);

	public $rules_changepassword = array(
		'oldpassword' => array(
			'field' => 'oldpassword',
			'label' => 'Kata sandi lama',
			'rules' => 'trim|required'
			),
		'passwordUSER' => array(
			'field' => 'password',
			'label' => 'Kata sandi',
			'rules' => 'trim|required'
			),
		'repasswordUSER' => array(
			'field' => 'repassword',
			'label' => 'Ulangi kata sandi',
			'rules' => 'trim|required'
			)
		);

	public $rules_reset = array(
		'passwordUSER' => array(
			'field' => 'password',
			'label' => 'Kata sandi',
			'rules' => 'trim|required'
			),
		'repasswordUSER' => array(
			'field' => 'repassword',
			'label' => 'Ulangi kata sandi',
			'rules' => 'trim|required'
			)
		);

	public $rules_otpnumber = array(
		'otpUSER' => array(
			'field' => 'otpnumber',
			'label' => 'OTP Number',
			'rules' => 'trim|required|max_length[6]'
			),
		'emailUSER' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required'
			),
	);

	function __construct (){
		parent::__construct();
	}

	public function get_new(){
		$new = new stdClass();
		$new->idUSER = '';
		$new->emailUSER = '';
		$new->passwordUSER = '';
		return $new;
	}

	public function selectall_users($id=NULL){
		$this->db->select('users.*');
		$this->db->from('users');
		if($id != NULL){
			$this->db->where('users.idUSER',$id);
		}
		return $this->db->get();
	}

	public function hash ($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}

	public function login($email, $pass){

		$datalog = array(
			'emailUSER' => $email,
			'passwordUSER' => $this->hash($pass)
		);
		$Administrator = $this->db->get_where('default_users',$datalog)->row();
		if(count($Administrator)){
			$data = array(
				'Email' => $Administrator->emailUSER,
				'idUSER' => $Administrator->idUSER,
				'loggedin' => TRUE,
				);
			$this->session->set_userdata($data);
			return "ADMIN";
		}	
	}

	public function loginaftertoken($email, $pass){

		$datalog = array(
			'emailUSER' => $email,
			'passwordUSER' => $pass
		);
		$Administrator = $this->db->get_where('default_users',$datalog)->row();
		if(count($Administrator)){
			$data = array(
				'Email' => $Administrator->emailUSER,
				'idUSER' => $Administrator->idUSER,
				'loggedin' => TRUE,
				);
			$this->session->set_userdata($data);
			return "ADMIN";
		}	
	}

	public function logout(){
		$this->session->sess_destroy();
	}

	public function checkuseradmin($mail){
		$this->db->select('idUSER, emailUSER, mobileUSER, otpUSER');
		$this->db->from('users');
		$this->db->where('emailUSER', $mail);
		$this->db->limit(1);

		return $this->db->get();
	}

	public function getotpbyemail($mail){
		$this->db->select('otpUSER, updatedateUSER');
		$this->db->from('users');
		$this->db->where('emailUSER', $mail);
		$this->db->limit(1);

		return $this->db->get();
	}

	public function getemailbyotp($otp){
		$this->db->select('emailUSER, otpUSER');
		$this->db->from('users');
		$this->db->where('otpUSER', $otp);
		$this->db->limit(1);

		return $this->db->get();
	}

	public function checkoldpassword($id){
		$this->db->select('idUSER, passwordUSER');
		$this->db->from('users');
		$this->db->where('idUSER', $id);
		$this->db->limit(1);
		return $this->db->get();
	}
}