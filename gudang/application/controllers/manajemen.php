<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != TRUE){
            redirect('auth');
        }
    }    

    public function index() {        
        $this->user();
    }


    public function daftar($sumber)
    {
      if ($sumber == 'user'){
        $this->load->model('akunModel');
        $data['list'] = $this->akunModel->getListAkun();
      }
      else if ($sumber == 'barang'){
        $this->load->model('jenisBarangModel');
        $data['list'] = $this->jenisBarangModel->getListJenis();
      }
      else if ($sumber == 'rak'){
        $this->load->model('rakModel');
        $this->load->model('gudangModel');
        $data['list'] = $this->rakModel->daftarRak();
        $data['gudang'] = $this->gudangModel->getListGudang();
      }
      else if ($sumber == 'gudang'){
        $this->load->model('gudangModel');
        $data['list'] = $this->gudangModel->getListGudang();
      }
        $this->load->view('includes/header');
        $this->load->view('manajemen/'.$sumber.'/index', $data);
        $this->load->view('includes/footer');
    }

    public function tambahBaru($sumber){
      if($sumber == 'user' || $sumber == 'rak'){
        $this->load->model('gudangModel');
        $data['gudang'] = $this->gudangModel->getListGudang();
      }
      else{
        $data = '';
      }
      $this->load->view('includes/header');
      $this->load->view('manajemen/'.$sumber.'/tambah', $data);
      $this->load->view('includes/footer');
    }

    public function tambah($master) {
        if($master == 'barang'){
          $data = array(
            'nama_jenis' => $this->input->post('nama_barang_tambah'),
            'stok' => $this->input->post('stok_awal_tambah'),
            'nomor_kpb' => $this->input->post('nomor_kpb_tambah'),
            'satuan' => $this->input->post('satuan_tambah'));
          $this->load->model('jenisBarangModel');
          $query = $this->jenisBarangModel->tambahBarang($this->input->post('nama_barang_tambah'), $data);
        }
        else if($master == 'user'){
          $data = array(
            'nama_user' => $this->input->post('nama_tambah'),
            'hak_akses' => $this->input->post('jabatan_tambah'),
            'password' => md5($this->input->post('password_tambah'))
            );  
          $this->load->model('akunModel');
          $query = $this->akunModel->tambahUser($this->input->post('nama_tambah'), $data);
        }
        else if($master == 'gudang'){
          $data = array(
            'nama_gudang' => $this->input->post('nama_gudang_tambah'),
            'alamat_gudang' => $this->input->post('alamat_gudang_tambah'),
            'pj_gudang' => $this->input->post('pj_gudang_tambah')
            );  
          $this->load->model('gudangModel');
          $query = $this->gudangModel->tambahGudang($this->input->post('nama_gudang_tambah'), $data);
          
        }
        else if($master == 'rak'){
          $data = array(
            'id_gudang' => $this->input->post('gudang_rak_tambah'),
            'nama_rak' => $this->input->post('nama_rak_tambah')
            );  
          $this->load->model('rakModel');
          $query = $this->rakModel->tambahRak($this->input->post('nama_rak_tambah'), $data);

        }

        if($query)
        {
              echo '<script language="javascript">';
              echo 'alert("Data berhasil ditambahkan");';
              echo 'window.location.href = "' . site_url('manajemen/daftar/'.$master) . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal menambahkan data");';
              echo 'window.location.href = "' . site_url('manajemen/daftar/'.$master) . '";';
              echo '</script>';
        }
    }

    public function getRak($id){
      $this->load->model('rakModel');
      $data = $this->rakModel->daftarRakGudang($id);
      echo json_encode($data);
    }

    public function delete($master, $id) {
      if ($master == 'barang')
      {
        $this->load->model('jenisBarangModel');
        $query = $this->jenisBarangModel->delete($id);
      }
      else if($master == 'user')
      {
        $this->load->model('akunModel');
        $query = $this->akunModel->delete($id);
      }
      else if($master == 'gudang')
      {
        $this->load->model('gudangModel');
        $query = $this->gudangModel->delete($id);
      }
      else if($master == 'rak')
      {
        $this->load->model('rakModel');
        $query = $this->rakModel->delete($id);
      }

      if ($query)
      {
        echo '<script language="javascript">';
        echo 'alert("Data berhasil dihapus");';
        echo 'window.location.href = "' . site_url('manajemen/daftar/'.$master) . '";';
        echo '</script>';
      } 
      else
      {
        echo '<script language="javascript">';
        echo 'alert("Gagal menghapus data");';
        echo 'window.location.href = "' . site_url('manajemen/daftar/'.$master) . '";';
        echo '</script>';
      }
    }

    public function edit($master, $id) {
      
      if ($master == 'user'){
        $this->load->model('akunModel');
        $data['result'] = $this->akunModel->getAkun($id);
      }
      /*else if ($master == 'barang'){
        $this->load->model('jenisBarangModel');
        $data['result'] = $this->jenisBarangModel->getJenisBarang($id);
      }*/
      else if ($master == 'gudang'){
        $this->load->model('gudangModel');
        $data['result'] = $this->gudangModel->getGudang($id);
      }
      else if ($master == 'rak'){
        $this->load->model('gudangModel');
        $data['gudang'] = $this->gudangModel->getListGudang();
        $this->load->model('rakModel');
        $data['result'] = $this->rakModel->getRak($id);
      }
      
      $this->load->view('includes/header');
      $this->load->view('manajemen/'.$master.'/edit', $data);
      $this->load->view('includes/footer');
    }

    public function update($master, $id) {
      if ($master == 'user'){
        $data = array(
          'hak_akses' => $this->input->post('jabatan_edit'),
          'nama_user' => $this->input->post('nama_edit')
          );
        if ($this->input->post('password_edit') != NULL)
        {
          $data['password'] = md5($this->input->post('password_edit'));
        }
        $this->load->model('akunModel');
        $query = $this->akunModel->edit($id, $data);
      }
      /*else if ($master == 'barang'){
        $data = array(
          'nama_jenis' => $this->input->post('nama_barang_edit'),
          'nomor_kpb' => $this->input->post('nomor_kpb_edit'),
          'stok' => $this->input->post('stok_awal_edit'),
          );
        $this->load->model('jenisBarangModel');
        $data['result'] = $this->jenisBarangModel->edit($id, $data);
      }*/
      else if ($master == 'gudang'){
        $data = array(
          'nama_gudang' => $this->input->post('nama_gudang_edit'),
          'alamat_gudang' => $this->input->post('alamat_gudang_edit'),
          'pj_gudang' => $this->input->post('pj_gudang_edit'),
          );
        $this->load->model('gudangModel');
        $query = $this->gudangModel->edit($id, $data);
      }
      else if ($master == 'rak'){
        $data = array(
          'nama_rak' => $this->input->post('nama_rak_edit'),
          'id_gudang' => $this->input->post('gudang_rak_edit')
          );
        $this->load->model('rakModel');
        $query = $this->rakModel->edit($id, $data);
      }
      
      if ($query)
      {
        echo '<script language="javascript">';
        echo 'alert("Data berhasil diubah");';
        echo 'window.location.href = "' . site_url('manajemen/daftar/'.$master) . '";';
        echo '</script>';
      } 
      else
      {
        echo '<script language="javascript">';
        echo 'alert("Gagal mengubah data");';
        echo 'window.location.href = "' . site_url('manajemen/daftar/'.$master) . '";';
        echo '</script>';
      }
    }

}
