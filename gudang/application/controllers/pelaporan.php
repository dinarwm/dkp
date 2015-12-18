<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelaporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('login') != TRUE || $this->session->userdata('hakAkses') == "umum")
		// {
		// 	redirect('auth');
		// }
		$this->load->model('penyaluranModel');
		$this->load->model('barang');
		$this->load->model('jenisBarang');
	}

	public function index()
	{
		$this->pelaporanBaru();
	}
	public function pelaporanBaru($status=NULL){
		$data['flag'] = NULL;
		if($status != NULL){
			$data['flag'] = $status;
		}
		$data['jenis'] = $this->jenisBarang->get();
		$this->load->view('includes/header');
		$this->load->view('penyaluran/pelaporan/index',$data);
		$this->load->view('includes/footer');
	}
	public function insert(){
	
	}
}