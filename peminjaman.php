<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->model('m_peminjaman');
		if($this->session->userdata('logged_in') == false){
			redirect('dasboard');
		}
	}

  public function index(){
		$data = array(
			'title'			=> 'Peminjaman',
			'id_peminjaman'	=> $this->m_peminjaman->generateID(),
			'kunci'			=> $this->m_peminjaman->getKncList(),
			'operator'		=> $this->m_peminjaman->getOprList(),
			'konten'		=> 'v_peminjaman'
		);
		$this->load->view('template', $data);
	}

	public function searchNumberKey(){
		$kode = $this->input->post('Id');
        $nomor = $this->m_peminjaman->cariNomor($kode);
        if($nomor->num_rows() > 0){
            $jdl = $nomor->row_array();
            echo $jdl['no_kunci'];
        }
	}

	public function searchOperator(){
		$kode = $this->input->post('Id');
        $nama = $this->m_peminjaman->cariNomor($kode);
        if($nama->num_rows() > 0){
            $nm = $nama->row_array();
            echo $nm['nama_site'];
        }
	}

	public function submit(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required');
			$this->form_validation->set_rules('telp_peminjam', 'No Telpon Peminjam', 'trim|required');
			$this->form_validation->set_rules('no_identitas', 'No Identitas Peminjam', 'trim|required');
			$this->form_validation->set_rules('nama_ins', 'Nama Instansi', 'trim|required');
			$this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'trim|required');
			$this->form_validation->set_rules('jam_pinjam', 'Jam Pinjam', 'trim|required');
			$this->form_validation->set_rules('id_peminjaman', 'Kode Transaksi', 'trim|required');
			$this->form_validation->set_rules('brow', 'ID Kunci', 'trim|required');

			if ($this->form_validation->run() == true) {
				if($this->m_peminjaman->insert() == true){
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('peminjaman');
				}else{
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('peminjaman');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('peminjaman');
			}
		}
	}

}
?>