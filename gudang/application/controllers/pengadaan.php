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
		$this->load->model('jenisBarangModel');
		$data['jenisBarang'] = $this->jenisBarangModel->getListJenis();
		$this->load->model('kondisiBarangModel');
		$data['kondisiBarang'] = $this->kondisiBarangModel->getListKondisi();
		$this->load->model('rakModel');
		$data['rak'] = $this->rakModel->getListRak();
		$this->load->model('gudangModel');
		$data['gudang'] = $this->gudangModel->getListGudang();
		$this->load->view('includes/header');
		$this->load->view('pengadaan/pengadaanBaru/'.$sumber.'/index', $data);
		$this->load->view('includes/footer');
	}

	public function statusBarang()
    {         
        $this->load->model('M_statusbarang');
        $data['nama_gudang'] = $this->M_statusbarang->getGudang();
        $data['nama_kasi'] = $this->M_statusbarang->getKasi();
		$data['nama_rak'] = $this->M_statusbarang->getRak();
		$data['nama_bidang'] = $this->M_statusbarang->getBidang();
        $data['list'] = $this->M_statusbarang->getDataBarang();
           // $data['site_operation'] = $this->m_manajemenodp->getSo();

        $this->load->view('includes/header', $data);
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
			$this->load->model('pengadaanModel');
			$query = $this->pengadaanModel->insert($data);
			if($query)
			{
				$id_pengadaan = $this->pengadaanModel->getIDPengadaan();
			}
			else
			{
				continue;
			}

			$count = 0;
			$list = array();
			$hehe = array_slice($_POST,17,-2);
			foreach ($hehe as $key => $value) {
				$count++;
				$list[$count] = $value;
				echo $key . ' ' . $value . '<br> ';
				if($count == 6){
					$count = 0;
					echo '<br>';
				}
			}
			die();
		}
		else if ($sumber == 'pemda'){
			/*$data = array(
	        	'no_ba_serahterima' => $this->input->post('no_ba_serahterima'),
	        	'tgl_ba_serahterima' => $this->input->post('tgl_ba_serahterima'),
	        	'asal_penerimaan' => $this->input->post('asal_penerimaan'),
	        	'tipe_pengadaan' => 'pemda',
	        	'nama_barang' => $this->input->post('nama_barang'),
	        	'jumlah_barang' => $this->input->post('jumlah_barang'),
	        	'harga_satuan' => $this->input->post('harga_satuan'),
	        	'harga_total' => $this->input->post('harga_total')
	        	);*/
			
			//print_r($hehe);
			//echo '<br>';
			
			$data = array(
	        	'no_ba_serahterima' => $this->input->post('no_ba_serahterima'),
	        	'tgl_ba_serahterima' => $this->input->post('tgl_ba_serahterima'),
	        	'asal_penerimaan' => $this->input->post('asal_penerimaan'),
	        	'tipe_pengadaan' => 'pemda'
	        	);
			$this->load->model('pengadaanModel');
			$query = $this->pengadaanModel->insert($data);


			/*foreach ($data as $key => $value) {
				echo $key . ' ' . $value . '<br> ';
			}*/
			echo '<br>';
			$count = 0;
			$hehe = array_slice($_POST, 8, -2);
			foreach ($hehe as $key => $value) {
				$count++;
				echo $key . ' ' . $value . '<br> ';
				if($count == 5){
					$count = 0;
					echo '<br>';
				}
			}
			die();
		}
		else if ($sumber == 'hibah'){
			$data = array(
				'no_ba_serahterima' => $this->input->post('no_ba_serahterima_hibah'),
	        	'tgl_ba_serahterima' => $this->input->post('tgl_ba_serahterima_hibah'),
	        	'asal_penerimaan' => $this->input->post('asal_penerimaan_hibah'),
	        	'tipe_pengadaan' => 'pemda',
	        	'nama_barang' => $this->input->post('nama_barang_hibah'),
	        	'jumlah_barang' => $this->input->post('jumlah_barang_hibah'),
	        	'harga_satuan' => $this->input->post('harga_satuan_hibah'),
	        	'harga_total' => $this->input->post('harga_total_hibah')
	        	);
		}
		/*$this->load->model('pengadaanModel');
		$query = $this->pengadaanModel->insert($data);*/
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