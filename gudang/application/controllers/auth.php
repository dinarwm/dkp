<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->session->userdata('login') == TRUE)
        {
            redirect();
        }
        $data['error'] = FALSE;
        $this->load->view('access/login', $data);         
    }

    function doLogin()
    {
        if($this->session->userdata('login') == TRUE)
        {
            redirect();
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');
            
        $this->load->model('akunModel');  
        $auth = $this->akunModel->login($username, md5($password));
        if($auth == 1)
        {
            $tmp = $this->akunModel->getDetail($username,md5($password));
            $nama = $tmp[0]->nama_user;
            $jabatan = $tmp[0]->jabatan;
            $data = array('username' => $username, 'login' => TRUE, 'nama_user' => $nama, 'jabatan' => $jabatan);
            $this->session->set_userdata($data);
            redirect();
        }
        else
        {
            $data['error'] = TRUE;
            $this->load->view('access/login', $data); 
        }
    }
    
    function doLogout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    /*public function validate() {
        $this->form_validation->set_rules('usermail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('access/login');
        }else{
            redirect('dashboard');
        }
    }*/
}
