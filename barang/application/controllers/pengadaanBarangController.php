<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PengadaanBarangController extends CI_Controller {

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('pengadaanBarang/pengadaan');
		$this->load->view('includes/footer');
	}
}

/* End of file homeController.php */
/* Location: ./application/controllers/homeController.php */