<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengadaan extends CI_Controller {

	public function index()
	{
		$this->pengadaanBaru();
	}
	public function pengadaanBaru($sumber){
		$this->load->view('includes/header');
		$this->load->view('pengadaan/pengadaanBaru/'.$sumber.'/index');
		$this->load->view('includes/footer');
	}

	public function statusBarang(){
		$this->load->view('includes/header');
		$this->load->view('pengadaan/statusBarang/index');
		$this->load->view('includes/footer');
	}
}