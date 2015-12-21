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
		
		$this->load->model('gudangModel');
		$data['gudang'] = $this->gudangModel->getListGudang();
		$this->load->view('includes/header');
		$this->load->view('pengadaan/pengadaanBaru/'.$sumber.'/index', $data);
		$this->load->view('includes/footer');
	}

	public function statusBarang()
    {         
        $this->load->model('M_statusbarang');
		$data['nama_rak'] = $this->M_statusbarang->getRak();
        $data['nama_gudang'] = $this->M_statusbarang->getGudang();
		
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
			
			$hehe = array_slice($_POST,19,-2);
			$this->addBarang($hehe, $id_pengadaan, $data['tipe_pengadaan']);
		}
		else if ($sumber == 'pemda'){			
			$data = array(
	        	'no_ba_serahterima' => $this->input->post('no_ba_serahterima'),
	        	'tgl_ba_serahterima' => $this->input->post('tgl_ba_serahterima'),
	        	'asal_penerimaan' => $this->input->post('asal_penerimaan'),
	        	'tipe_pengadaan' => 'pemda'
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

			$hehe = array_slice($_POST,10,-2);
			$this->addBarang($hehe, $id_pengadaan, $data['tipe_pengadaan']);
		}
		else if ($sumber == 'hibah'){
			$data = array(
				'no_ba_serahterima' => $this->input->post('no_ba_serahterima_hibah'),
	        	'tgl_ba_serahterima' => $this->input->post('tgl_ba_serahterima_hibah'),
	        	'asal_penerimaan' => $this->input->post('asal_penerimaan_hibah'),
	        	'tipe_pengadaan' => 'hibah'
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

			$hehe = array_slice($_POST,10,-2);
			$this->addBarang($hehe, $id_pengadaan, $data['tipe_pengadaan']);
		}
		
	}

	public function getRakGudang($id_gudang){
		$this->load->model('rakModel');
		$data = $this->rakModel->getRakGudang($id_gudang);
		echo json_encode($data);
	}

	public function addBarang($hehe, $id_pengadaan, $tipe_pengadaan){
		$list = array();
		$count = 0;
		$sukses = 0;
		foreach ($hehe as $key => $value) {
			$count++;
			$list[$count] = $value;
			//echo $key . ' ' . $value . '<br> ';
			if($count == 10){
				$count = 0;
				$data = array(
					'id_jenis' => $list[4],
					'id_kondisi' => $list[7],
					'id_rak' => $list[6],
					'id_pengadaan' => $id_pengadaan,
					'id_status' => '1',
					'jumlah_barang' => $list[8],
					'harga_satuan' => $list[9],
					'harga_total' => $list[10]
					);
				$this->load->model('barangModel');
				$this->load->model('jenisBarangModel');
				$query = $this->barangModel->insert($data);
				$query = $this->jenisBarangModel->updateStok($list[4], $list[8]);
				//echo '<br>';
				$sukses = 1;
			}
		}
		if($sukses == 1){
			echo '<script language="javascript">';
            echo 'window.location.href = "' . site_url('pengadaan/pengadaanBaru/' . $tipe_pengadaan . '/sukses') . '";';
            echo '</script>';
		}
		else{
			echo '<script language="javascript">';
            echo 'window.location.href = "' . site_url('pengadaan/pengadaanBaru/'. $tipe_pengadaan .'/gagal') . '";';
            echo '</script>';
		}
	}
}