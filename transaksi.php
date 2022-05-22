<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
	}


	public function index()
	{
		$data['konten']="v_transaksi";
		$this->load->model('m_transaksi');
        $data['title'] = "TRANSAKSI";
        $data['total'] = $this->m_transaksi->getCount();
        $data['datas'] = $this->m_transaksi->getList();
		$this->load->view('template', $data, FALSE);
		
	}

	public function delete(){
		$id = $this->uri->segment(3);
		if($this->m_transaksi->delete($id) == true){
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('transaksi');
		}else{
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('transaksi');
		}
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */