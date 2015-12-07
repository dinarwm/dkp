<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengadaan extends CI_Controller {

	public function index()
	{
		$this->pengadaanBaru();
	}
	public function pengadaanBaru($sumber, $status=NULL){
		$data['flag'] = NULL;
		if($status != NULL){
			$data['flag'] = $status;
		}
		$this->load->view('includes/header');
		$this->load->view('pengadaan/pengadaanBaru/'.$sumber.'/index', $data);
		$this->load->view('includes/footer');
	}

	public function statusBarang(){
		$this->load->view('includes/header');
		$this->load->view('pengadaan/statusBarang/index');
		$this->load->view('includes/footer');
	}

	public function insert($sumber){
		if($sumber == 'pengadaan'){
			$data = array(
	        	'no_ba_penerimaan' => $this->input->post('no_ba_penerimaan'),
	        	'no_ba_pemeriksaan' => $this->input->post('no_ba_pemeriksaan'),
	        	'tgl_ba_penerimaan' => $this->input->post('tgl_ba_penerimaan'),
	        	'tgl_ba_pemeriksaan' => $this->input->post('tgl_ba_pemeriksaan'),
	        	'kegiatan' => $this->input->post('kegiatan'),
	        	'nomer_spk' => $this->input->post('nomer_spk'),
	        	'tgl_spk' => $this->input->post('tgl_spk'),
	        	'uraian_pekerjaan' => $this->input->post('uraian_pekerjaan'),
	        	'nama_rekanan' => $this->input->post('nama_rekanan'),
	        	'alamat_rekanan' => $this->input->post('alamat_rekanan'),
	        	'nilai_spk' => $this->input->post('nilai_spk'),
	        	'rekening_belanja' => $this->input->post('rekening_belanja'),
	        	'tipe_pengadaan' => 'pengadaan'
	        	);
		}
		else if ($sumber == 'pemda'){
			$data = array(
	        	'no_ba_serahterima' => $this->input->post('no_ba_serahterima'),
	        	'tgl_ba_serahterima' => $this->input->post('tgl_ba_serahterima'),
	        	'asal_penerimaan' => $this->input->post('asal_penerimaan'),
	        	'tipe_pengadaan' => 'pemda',
	        	'nama_barang' => $this->input->post('nama_barang'),
	        	'jumlah_barang' => $this->input->post('jumlah_barang'),
	        	'harga_satuan' => $this->input->post('harga_satuan'),
	        	'harga_total' => $this->input->post('harga_total')
	        	);
		}
		else if ($sumber == 'pemda'){
			$data = array(
	        	'tipe_pengadaan' => 'pemda',
	        	'nama_barang' => $this->input->post('nama_barang_hibah'),
	        	'jumlah_barang' => $this->input->post('jumlah_barang_hibah'),
	        	'harga_satuan' => $this->input->post('harga_satuan_hibah'),
	        	'harga_total' => $this->input->post('harga_total_hibah')
	        	);
		}
		$this->load->model('pengadaanModel');
		$query = $this->pengadaanModel->insert($data);
		if($query){
			echo '<script language="javascript">';
            echo 'window.location.href = "' . site_url('pengadaan/pengadaanBaru/' . $data['tipe_pengadaan'] . '/sukses') . '";';
            echo '</script>';
		}
		else{
			echo '<script language="javascript">';
            echo 'window.location.href = "' . site_url('pengadaan/pengadaanBaru/'. $data['tipe_pengadaan'] .'/gagal') . '";';
            echo '</script>';
		}
	}
}