<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        /*if($this->session->userdata('login') != TRUE)
		{
            $this->load->helper('url');
            $current_uri = base_url(uri_string());
            $encoded_url = urlencode($current_uri);
            $redirect_to = 'auth?ref='.$encoded_url;
            redirect($redirect_to);
		}*/
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
        $this->load->view('design/header');
        $this->load->view('home/index');
        $this->load->view('design/footer');
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
