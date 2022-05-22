<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengembalian extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengembalian');
	}


	public function index()
	{
		$data['konten']="v_pengembalian";
		$this->load->model('m_pengembalian');
        $data['title'] = "PENGEMBALIAN";
        $data['total'] = $this->m_pengembalian->getCount();
        $data['datas'] = $this->m_pengembalian->getList();
		$this->load->view('template', $data, FALSE);
		
	}
    
	public function deletePeminjaman($id_peminjaman)
	{
		$this->load->model('m_pengembalian');
		$prosesDelete = $this->m_pengembalian->delete_peminjaman($id_peminjaman);

		if ($prosesDelete == TRUE) {
			$this->session->flashdata('pesan', 'Sukses Hapus Data');
		}else{
			$this->session->flashdata('pesan','Gagal Hapus Data');
		}
		redirect(base_url('index.php/peminjaman'),'refresh');
	}
	public function kembali()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
            $id = $this->uri->segment(3);
            $idk = $this->uri->segment(4);
			if ($this->m_pengembalian->kembali($id, $idk) == TRUE) {
				$this->session->set_flashdata('notif', 'Pengembalian Berhasil');
				redirect('pengembalian');
			} else {
				$this->session->set_flashdata('notif', 'Pengembalian Gagal');
				redirect('pengembalian');
			}
		} else {
			redirect('login');
		}
	}


}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */