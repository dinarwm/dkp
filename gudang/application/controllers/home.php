<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != TRUE){
            redirect('auth');
        }
    }    
    
    /*public function index() {        
    	$data = array(
    		'nama' => $this->session->userdata('nama_lengkap'),
			'username' => $this->session->userdata('username'),
			'jabatan' => $this->session->userdata('jabatan')
		);
        
        $this->load->view('design/header', $data);
        $this->load->view('dashboard/home', $data);
        $this->load->view('design/footer');
    }*/

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('home/index');
        $this->load->view('includes/footer');
    }

    public function errorPage()
    {
        /*$data = array(
            'nama' => $this->session->userdata('nama_lengkap'),
            'username' => $this->session->userdata('username'),
            'jabatan' => $this->session->userdata('jabatan')
        );*/
        //$this->load->view('design/header', $data);
        $this->load->view('design/header');
        $this->load->view('errors/error');
        $this->load->view('design/footer');
    }
}
