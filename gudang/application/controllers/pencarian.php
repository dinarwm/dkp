<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pencarian extends CI_Controller {

	public function index()
	{
		$this->barang();
	}

	public function barang(){
		$this->load->view('includes/header');
		$this->load->view('pencarian/barang/index');
		$this->load->view('includes/footer');
	}

	public function pjgudang(){
		$this->load->view('includes/header');
		$this->load->view('pencarian/pjgudang/index');
		$this->load->view('includes/footer');
	}
}