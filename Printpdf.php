<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printpdf extends CI_Controller {

        public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
	}
        public function index()
	{					
        $data['total'] = $this->m_transaksi->getCount();
		$data['datas'] = $this->m_transaksi->getList();
		$data['title'] = "Laporan Peminjaman Kunci";
        $this->load->view('v_print', $data);
	}
}