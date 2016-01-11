<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyaluran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('login') != TRUE || $this->session->userdata('hakAkses') == "umum")
		// {
		// 	redirect('auth');
		// }
		$this->load->model('penyaluranModel');
		$this->load->model('barang');
		$this->load->model('jenisBarang');
	}

	public function index()
	{
		$this->penyaluranBaru();
	}
	public function penyaluranBaru($status=NULL){
		$data['flag'] = NULL;
		if($status != NULL){
			$data['flag'] = $status;
		}
		$data['jenis'] = $this->jenisBarang->get();
		$this->load->view('includes/header');
		$this->load->view('penyaluran/penyaluranBaru/index',$data);
		$this->load->view('includes/footer');
	}
	public function insert(){
		$id_penyaluran = $this->getNextIDPenyaluran(date('dmY', strtotime($this->input->post('tgl_surat'))));
		$jumlah_detail = $this->input->post('jumlah_detail');
		if($jumlah_detail > 0)
		{
			$data = array
			(
				'id_penyaluran' => $id_penyaluran,
				'nama_penerima' => $this->input->post('nama_penerima'),
				'nomor_surat' => $this->input->post('no_surat'),
				'tgl_surat' => date('Y-m-d', strtotime($this->input->post('tgl_surat'))),
				'tgl_penyaluran' => date('Y-m-d', strtotime($this->input->post('tgl_penyaluran')))
				//'status_penyaluran' => 0
			);
			$result = $this->penyaluranModel->create($data);
			if($result)
			{
				//do detail_penyaluran
				$deleted = $this->input->post('deleted');
				$deleted = explode(",", $deleted);
				for($i = 1, $j = 0; $i <= $jumlah_detail; $i++)
				{
					if($i == $deleted[$j])
					{
						$j++;
					}
					$data = array
					(
						'id_penyaluran' => $id_penyaluran,
						'lokasi_penempatan' => $this->input->post('lokasi_barang_'.$i),
						'jumlah_barang' => $this->input->post('jumlah_barang_'.$i),
						'id_jenis' => $this->input->post('kode_barang_'.$i),
						'id_status' => 2
					);
					$this->barang->create($data);
				}
				echo '<script language="javascript">';
	            echo 'window.location.href = "' . site_url('penyaluran/penyaluranBaru/sukses') . '";';
	            echo '</script>';
			}
		}
		else
		{
			echo '<script language="javascript">';
            echo 'window.location.href = "' . site_url('penyaluran/penyaluranBaru/gagal') . '";';
            echo '</script>';
		}
	}

	function getNextIDPenyaluran($date)
	{
		$no_digit = 2;
		$id = "PNY".$date;
		$tmp = $this->penyaluranModel->getId($date);
		$n = 0;
		$lastid = "";
		foreach ($tmp as $row)
		{
			$n++;
			$lastid = $row->id_penyaluran;
		}
		if($lastid == "" || $lastid == null || $n == 0)
		{
			$id = $id."-01";
		}
		else
		{
			$str = explode("PNY", $lastid);
			$str = explode("-", $str[1]);
			$str = $str[1];
			++$str;
			$tmp2 = "";
			for($i = 0; $i < $no_digit - strlen($str); $i++)
			{
				$tmp2 = $tmp2."0";
			}
			$str = $tmp2.$str;
			$id = $id."-".$str;
		}
		return $id;
	}
}