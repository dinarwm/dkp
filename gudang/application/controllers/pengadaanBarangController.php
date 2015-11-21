<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PengadaanBarangController extends CI_Controller {

	public function index()
	{
		$this->pengadaan();
	}
	public function pengadaan(){
		$this->load->view('design/header');
		$this->load->view('pengadaanBarang/pengadaan');
		$this->load->view('design/footer');
	}
	public function pemda(){
		$this->load->view('design/header');
		$this->load->view('pengadaanBarang/pemda');
		$this->load->view('design/footer');
	}
	public function hibah(){
		$this->load->view('design/header');
		$this->load->view('pengadaanBarang/hibah');
		$this->load->view('design/footer');
	}
}

/* End of file homeController.php */
/* Location: ./application/controllers/homeController.php */