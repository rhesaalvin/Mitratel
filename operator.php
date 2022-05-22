<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class operator extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_operator');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Data Operator'; 
        $data['list'] = $this->m_operator->getList();
        $this->load->model('m_operator');
		$data['konten'] = 'v_operator';
		$data['total'] = $this->m_operator->getCount();
		$this->load->view('template', $data);
	}

	public function add(){
        $this->load->model('m_operator');
        $data['data_operator']=$this->m_operator->get_operator();
		$data['title'] = 'Tambah Operator';
		$data['konten'] = 'v_operator_tambah';
		$this->load->view('template', $data);
	}

	public function submit_operator()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->form_validation->set_rules('id_operator', 'ID Operator', 'trim|required',
			array('required' => 'ID Operator harus diisi'));
			$this->form_validation->set_rules('nama_operator', 'Nama Operator', 'trim|required',
			array('required' => 'Nama Operator harus diisi'));
			if ($this->form_validation->run() == TRUE )
			{
				$this->load->model('m_operator', 'opt');
				$masuk=$this->opt->add_operator();
				if($masuk==true){
					$this->session->set_flashdata('announce', 'sukses masuk');
				} else{
					$this->session->set_flashdata('announce', 'gagal masuk');
				}
				redirect(base_url('index.php/operator'), 'refresh');
			}else{
			$this->session->set_flashdata('announce', validation_errors());
			redirect(base_url('index.php/operator'), 'refresh');}
		} else{
			redirect('login');	
		}
	}

	public function submit_edit(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('id_operator', 'ID Operator', 'trim|required');
			$this->form_validation->set_rules('nama_operator', 'Nama Operator', 'trim|required');
			if ($this->form_validation->run() == true) {
				if($this->m_operator->update($this->input->post('id_operator')) == true){
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('operator');
				}else{
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('operator/edit?idtf='.$this->input->post('id_operator'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('operator/edit?idtf='.$this->input->post('id_operator'));
			}
		}
	}

	public function edit(){
		$id_operator = $this->input->get('idtf');
		//CHECK : Data Availability
		if($this->m_operator->checkAvailability($id_operator) == true){
			if($this->m_operator->getDetail($id_operator) == true){
				$data['konten'] = 'v_operator_edit';
			}else{
				$data['konten'] = 'v_dashboard';
			}
		$data['title'] = 'Edit operator';
		$data['detail'] = $this->m_operator->getDetail($id_operator);
		$this->load->view('template', $data);
		}
	}

	public function delete(){
		$id = $this->uri->segment(3);
		if($this->m_operator->delete($id) == true){
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('operator');
		}else{
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('operator');
		}
	}
}

/* End of file operator.php */
/* Location: ./application/controllers/operator.php */