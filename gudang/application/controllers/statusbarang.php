<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statusbarang extends CI_Controller{
	public function __construct()
	{

		parent::__construct();

	}

	public function index()
	{
		$this->load->model('M_statusbarang');
		$data['nama_gudang'] = $this->M_statusbarang->getGudang();
		$data['NAMA_KASI'] = $this->M_statusbarang->getKasi();
		$data['NAMA_RAK'] = $this->M_statusbarang->getRak();
		$data['NAMA_BIDANG'] = $this->M_statusbarang->getBidang();

		$this->load->view('includes/header', $data);
        $this->load->view('statusbarang/index',$data);
        $this->load->view('includes/footer');
	}

	public function getKasi()
	{
		$this->load->model('M_statusbarang');
		

		$this->load->view('includes/header', $data);
        $this->load->view('statusbarang/index',$data);
        $this->load->view('includes/footer');
	}

	public function statusBarang()
    {         
        $this->load->model('M_statusbarang');
        $data['list'] = $this->M_statusbarang->getDataBarang();
           // $data['site_operation'] = $this->m_manajemenodp->getSo();

        $this->load->view('includes/header', $data);
        $this->load->view('statusbarang/index',$data);
        $this->load->view('includes/footer');
    }
}