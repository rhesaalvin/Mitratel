<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Data Admin';
        $data['list'] = $this->m_admin->getList();
        $this->load->model('m_admin');
		$data['konten'] = 'v_admin';
		$data['total'] = $this->m_admin->getCount();
		$this->load->view('template', $data);
	}

	public function add(){
		$data['title'] = 'Tambah Admin';
		$data['konten'] = 'v_admin_tambah';
		$this->load->view('template', $data);
	}

	public function edit(){
		$id_admin = $this->input->get('idtf');
		//CHECK : Data Availability
		if($this->m_admin->checkAvailability($id_admin) == true){
			if($this->m_admin->getDetail($id_admin) == true){
				$data['konten'] = 'v_admin_edit';
			}else{
				$data['konten'] = 'v_dashboard';
			}
		$data['title'] = 'Edit admin';
		$data['detail'] = $this->m_admin->getDetail($id_admin);
		$this->load->view('template', $data);
		}
	}

	public function submit(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('id_admin', 'ID Admin', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
            $this->form_validation->set_rules('no_telp', 'No HP', 'trim|required');

				if ($this->form_validation->run() == true) {
					if($this->m_admin->insert($this->input->post('id_admin')) == true){
						$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
						redirect('admin');
					}else{
						$this->session->set_flashdata('announce', 'Gagal menyimpan data');
						redirect('admin');
					}
				} else {
					$this->session->set_flashdata('announce', validation_errors());
					redirect('admin');
			}
		}
}

	public function submit_edit(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('id_admin', 'ID Admin', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');
			if ($this->form_validation->run() == true) {
				if($this->m_admin->update($this->input->post('id_admin')) == true){
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('admin');
				}else{
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('admin/edit?idtf='.$this->input->post('id_admin'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('admin/edit?idtf='.$this->input->post('id_admin'));
			}
		}
	}

	public function delete(){
		$id = $this->uri->segment(3);
		if($this->m_admin->delete($id) == true){
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('admin');
		}else{
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('admin');
		}
	}
}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */