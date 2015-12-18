<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen extends CI_Controller{
    //put your code here
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
        }
        else if($this->session->userdata('jabatan') != "Admin")
        {
          redirect('dashboard');
        }*/
    }    

    public function index() {        
        $this->user();
    }

    public function user() {
        $this->load->model('akunModel');
        $data['list'] = $this->akunModel->getListAkun();
        $this->load->view('includes/header');
        $this->load->view('manajemen/user/index', $data);
        $this->load->view('includes/footer');
    }

    public function barang() {
      $this->load->model('jenisBarangModel');
        $data['list'] = $this->jenisBarangModel->getListJenis();
        $this->load->view('includes/header');
        $this->load->view('manajemen/barang/index', $data);
        $this->load->view('includes/footer');
    }

    public function tambahBarang() {
        $this->load->view('includes/header');
        $this->load->view('manajemen/barang/tambah');
        $this->load->view('includes/footer');
    }

    public function tambah($master) {
        if($master == 'barang'){
          $data = array(
            'nama_jenis' => $this->input->post('nama_barang_tambah'),
            'stok' => $this->input->post('stok_awal_tambah'),
            'nomor_kpb' => $this->input->post('nomor_kpb_tambah'),
            'satuan' => $this->input->post('satuan_tambah'));
        }
        $this->load->model('jenisBarangModel');
        if($this->jenisBarangModel->tambahBarang($this->input->post('nama_barang_tambah'), $data))
        {
              echo '<script language="javascript">';
              echo 'alert("Barang berhasil ditambahkan");';
              echo 'window.location.href = "' . site_url('manajemen/barang') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal menambahkan akun. Username telah terpakai");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    /*

    public function showlist() {        
        $this->load->model('akun');
        $data['list'] = $this->akun->getListUser();
        $this->header();
        $this->load->view('manajemen_user/all_user', $data);
        $this->load->view('design/footer');
    }

    public function delete($id) {
        $this->load->model('akun');
        $this->akun->delete($id);
        echo '<script language="javascript">';
        echo 'alert("Akun berhasil dihapus");';
        echo 'window.location.href = "' . site_url('users/showlist') . '";';
        echo '</script>';
    }

    public function edit($id) {
        $this->load->model('akun');
        $data['result'] = $this->akun->edit($id);
        $this->header();
        $this->load->view('manajemen_user/edit_user', $data);
        $this->load->view('design/footer');
    }

    public function update($id) {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $passAwal = $this->input->post('passAwal');
        $data = array(
            'NAMA_LENGKAP' => $this->input->post('nama'),
            'USERNAME' => $username,
             'JABATAN' => $this->input->post('jabatan'));
        if($pass != $passAwal){
          $data['PASSWORD'] = md5($pass);
        }
        $this->load->model('akun');
        if($this->akun->update($id, $username, $data))
        {
              echo '<script language="javascript">';
              echo 'alert("Akun berhasil diupdate");';
              echo 'window.location.href = "' . site_url('users/showlist') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal mengupdate akun. Username telah terpakai");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    function header(){
      $data = array(
            'nama' => $this->session->userdata('nama_lengkap'),
            'username' => $this->session->userdata('username'),
            'jabatan' => $this->session->userdata('jabatan')
        );
        $this->load->view('design/header', $data);
    }*/

}
