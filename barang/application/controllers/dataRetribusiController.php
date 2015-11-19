<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DataRetribusiController extends CI_Controller {

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('dataRetribusi/index');
		$this->load->view('includes/footer');
	}
}

/* End of file dataRetribusiController.php */
/* Location: ./application/controllers/dataRetribusiController.php */