<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Subscribe_m');
		$this->data['backendDIR'] = 'templates/backend/';
	}

	public function send(){
		$rules = $this->Subscribe_m->rules_subscribe;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('valid_email', 'Email anda tidak valid');

		if ($this->form_validation->run() == TRUE) {
			$data['emailSUBSCRIBE'] = $this->input->post('email');
			$id = decode(urldecode($this->input->post('idSUBSCRIBE')));
			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
			if($this->Subscribe_m->save($data, $id)){
	        	$data = array(
	            	'title' => 'Sukses',
	                'text' => 'Penyimpanan Data berhasil dilakukan',
	                'type' => 'success'
	          	);
	        	
	   		} else {

				$data = array(
					'title' => 'Sukses',
                    'text' => 'Penyimpanan Data berhasil dilakukan',
                    'type' => 'success'
				);
      		}
	    	$this->session->set_flashdata('message', $data);
	  		redirect('home');

		} else {
				$data = array(
		            'title' => 'Terjadi Kesalahan',
		            'text' => 'mohon ulangi inputan form anda dibawah.',
		            'type' => 'warning'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('home');
		}
	}

	public function list(){
		$this->listsubscriber();
	}

	public function listsubscriber(){
		$data['addONS'] = 'plugins_datatables';

		$data['subscriber'] = $this->Subscribe_m->selectall_subscribe()->result();
		foreach ($data['subscriber'] as $key => $value) {

			if($value->statusSUBSCRIBE == 1){
				$status='<a href="#" data-uk-tooltip title="Aktif"><i class="material-icons md-36 uk-text-success">&#xE86C;</i></a>';
			} else {
				$status='<a href="#" data-uk-tooltip title="Tak Aktif"><i class="material-icons  md-36 uk-text-danger">&#xE5C9;</i></a>';
			}
			$data['subscriber'][$key]->status = $status;
		}
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
		$data['subview'] = $this->load->view($this->data['backendDIR'].'Subscribe', $data, TRUE);
		$this->load->view('_layout_base',$data);
	}

	public function mail_config(){
        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.sendgrid.net'; 
        $config['smtp_port'] = '587'; 
        $config['smtp_timeout'] = 30;
        $config['smtp_user'] = 'apikey';
        $config['smtp_pass'] = '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';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        return $config;
    }

	public function sendingnewsletter(){

		$subject = $this->input->post('subject');
		$messages = $this->input->post('textmessage');

		$subscribers = $this->Subscribe_m->selectall_subscribe()->result();
		$dataemail = array();
		$key = 0;
		foreach ($subscribers as $key => $subscribe) {
			$dataemail[$key] = $subscribe->emailSUBSCRIBE;
			
		}
		
			 //configure email settings
	        $config = $this->mail_config();
	        $this->email->initialize($config);
	        
	        //send mail
	        $this->email->from('noreply@duotonal.com', 'Duotonal.com');
	        $this->email->to($dataemail);
	        //$this->email->bcc($dataemail);
	        $this->email->subject($subject);
	        $this->email->message($messages);

			if($this->email->send()){
				$data = array(
					'title' => 'Sukses',
					'text' => 'Email broadcast telah berhasil dikirim!',
					'type' => 'success'
				);
				$this->session->set_flashdata('message', $data);
				redirect('subscribe/listsubscriber');
			} else {
				$data = array(
					'title' => 'Maaf, ',
					'text' => $this->email->print_debugger(),
					'type' => 'error'
				);
			}
			$this->session->set_flashdata('message', $data);
			redirect('subscribe/listsubscriber');
		}
}