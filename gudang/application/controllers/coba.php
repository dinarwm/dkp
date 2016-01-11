<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coba extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }    
    
    public function index()
    {
        $this->load->library('ci_qr_code');

		$params['data'] = 'This is a text to encode become QR Code';
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'tes.png';
		$this->ciqrcode->generate($params);

		echo '<img src="'.base_url().'tes.png" />';
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
