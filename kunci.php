<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kunci extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kunci');
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['konten']="v_kunci";
        $data['title'] = "Data Kunci";
        $this->load->model('m_kunci');
        $data['data_kunci']=$this->m_kunci->get_kunci();

        //load view kunci view
        $this->load->view('template', $data, FALSE);
    }
    
	public function add(){
        $this->load->model('m_operator');
        $data['data_operator']=$this->m_operator->get_operator();
		$data['title'] = 'Tambah Buku';
		$data['konten'] = 'v_kunci_tambah';
		$this->load->view('template', $data);
	}

	public function simpan_kunci()
	{
        $this->form_validation->set_rules('Id', 'ID Site', 'trim|required',
		array('required' => 'Id Site harus diisi'));
		$this->form_validation->set_rules('no_kunci', 'No kunci', 'trim|required',
        array('required' => 'nomor kunci harus diisi'));
        $this->form_validation->set_rules('nama_site', 'Nama Site', 'trim|required',
        array('required' => 'nama site harus diisi'));
        $this->form_validation->set_rules('id_operator', 'Operator', 'trim|required',
        array('required' => 'operator harus diisi'));
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('m_kunci', 'lvl');
			$masuk=$this->lvl->input_kunci();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/kunci'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/kunci'), 'refresh');
		}
	}

	public function get_detail_kunci($Id='')
	{
		$this->load->model('m_kunci');
		$data_detail=$this->m_kunci->detail_kunci($Id);
		echo json_encode($data_detail);
	}

	public function edit(){
        $this->load->model('m_operator');
		$id_kunci = $this->input->get('idtf');
		if($this->m_kunci->checkAvailability($id_kunci) == true){
			if($this->m_kunci->getDetail($id_kunci) == true){
				$data['konten'] = 'v_kunci_edit';
			}else{
				$data['konten'] = 'v_dashboard';
			}
		$data['title'] = 'Edit kunci';
        $data['data_operator']=$this->m_operator->get_operator();
		$data['detail'] = $this->m_kunci->getDetail($id_kunci);
		$this->load->view('template', $data);
		}
	}

	public function submit_edit()
	{
		$this->form_validation->set_rules('Id', 'ID Site', 'trim|required');
		$this->form_validation->set_rules('no_kunci', 'No kunci', 'trim|required');
		$this->form_validation->set_rules('nama_site', 'Nama Site', 'trim|required');
		$this->form_validation->set_rules('id_operator', 'Operator', 'trim|required');
		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/kunci'), 'refresh');
		} else{
			$this->load->model('m_kunci');
			$proses_update=$this->m_kunci->update_kunci($this->input->post('Id'));
			if ($proses_update == true) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/kunci'), 'refresh');
		} 
	}

	public function delete(){
		$id = $this->uri->segment(3);
		if($this->m_kunci->delete($id) == true){
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('kunci');
		}else{
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('kunci');
		}
	}
    
    public function lists(){
        $data['model'] = $this->m_kunci->view(); // Panggil fungsi view() yang ada di model siswa
		$this->load->view('template', $data);
    }
}
