<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_dashboard');
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in')== TRUE){
			$data = array (
                'title'			=> 'Dashboard',
				'konten'        => 'v_dashboard',
				'kncCount'		=> $this->m_dashboard->getKncCount(),
				'optCount'		=> $this->m_dashboard->getOptCount(),
				'pnjCount'		=> $this->m_dashboard->getPinjamCount(),
				'kmbCount'		=> $this->m_dashboard->getKmbCount(),
            );
            $this->load->view('template', $data);
            
		}else{
			
			redirect('login/index');
			
		}
	
	
	}

	public function user()
	{
				$data = array (
					'title'			=> 'Dashboard',
					'konten'        => 'user/v_dashboard_user',
					'kncCount'		=> $this->m_dashboard->getKncCount(),
					'optCount'		=> $this->m_dashboard->getOptCount(),
					'pnjCount'		=> $this->m_dashboard->getPinjamCount(),
					'kmbCount'		=> $this->m_dashboard->getKmbCount(),
				);
				$this->load->view('user/template_user', $data);
				
			}

}