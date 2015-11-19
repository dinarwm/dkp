<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('home/index');
		$this->load->view('includes/footer');
	}
}

/* End of file homeController.php */
/* Location: ./application/controllers/homeController.php */