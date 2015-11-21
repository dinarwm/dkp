<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('login') != TRUE || $this->session->userdata('hakAkses') != "admin")
		// {
		// 	redirect('auth');
		// }
	}

	public function user()
	{
		$this->load->model('master/user');
		$data['user'] = $this->user->get();
		$this->load->view('includes/header');
		$this->load->view('master/user',$data);
		$this->load->view('includes/footer');
	}

	public function insertAkun(){
		$data['nama_user']=$this->input->post('nama_user');
		$data['password']=$this->input->post('password');
		$data['jabatan_user']=$this->input->post('jabatan_user');
		$data['status']= 1;
		$this->load->model('user');
		$this->akun->insert($data);
		redirect(base_url()."master/user");
	}

	public function updateAkun(){
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');
		$data['nama_user']=$this->input->post('nama_user');
		$data['jabatan_user']=$this->input->post('jabatan_user');
		$data['telepon_user']=$this->input->post('telepon_user');
		$data['status']=$this->input->post('status');
		$this->load->model('akun');
		$this->akun->update($data);
		redirect(base_url()."master/akun");
	}

	public function deleteAkun(){
		$username=$this->input->post('username');
		$this->load->model('akun');
		$this->akun->delete($username);
		redirect(base_url()."master/akun");
	}

}