<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
		
	}

	public function stokOpname(){
		$this->load->view('includes/header');
		$this->load->view('report/stokOpname/index');
		$this->load->view('includes/footer');
	}

	public function laporanBulanan(){
		$this->load->view('includes/header');
		$this->load->view('report/laporanBulanan/index');
		$this->load->view('includes/footer');
	}

	public function kartuPersediaanBarang(){
		$this->load->view('includes/header');
		$this->load->view('report/kartuPersediaanBarang/index');
		$this->load->view('includes/footer');
	}

	public function buktiPengeluaranBarang(){
		$this->load->view('includes/header');
		$this->load->view('report/buktiPengeluaranBarang/index');
		$this->load->view('includes/footer');
	}

}