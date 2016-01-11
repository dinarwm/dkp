<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelaporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('login') != TRUE || $this->session->userdata('hakAkses') == "umum")
		// {
		// 	redirect('auth');
		// }
		$this->load->model('pelaporanModel');
		$this->load->model('barang');
		$this->load->model('jenisBarang');
	}

	public function index()
	{
		$this->pelaporanBaru();
	}

	public function pelaporanBaru($status=NULL){
		$data['flag'] = NULL;
		if($status != NULL){
			$data['flag'] = $status;
		}
		$this->load->view('includes/header');
		$this->load->view('penyaluran/pelaporan/index',$data);
		$this->load->view('includes/footer');
	}

	public function getNomerSurat($status){
      $data = $this->pelaporanModel->getNoSurat($status);
      echo json_encode($data);
    }

    public function getBarang($status,$id_penyaluran){
      $data = $this->pelaporanModel->getBarang($status,$id_penyaluran);
      echo json_encode($data);
    }

    public function tambahLaporan($id_barang){
    	$data['data'] = $this->pelaporanModel->getBarangById($id_barang);
    	//print_r($data['data']);
		$this->load->view('includes/header');
		$this->load->view('penyaluran/pelaporan/tambah',$data);
		$this->load->view('includes/footer');
	}

	public function doTambahLaporan(){
		$id_barang = $this->input->post('id_barang_add');
		$uploads_dir = './foto_bukti';
        $tmp_name = $_FILES["foto_bukti"]["tmp_name"];
        $type = pathinfo($_FILES["foto_bukti"]["name"], PATHINFO_EXTENSION);;
        $name = $id_barang.".".$type;
        $res = move_uploaded_file($tmp_name, "$uploads_dir/$name");

        $term = array('id_barang' => $id_barang);
		$data = array(
					'id_status' => 3,
					'foto_bukti' => base_url().'foto_bukti/'.$name
				);

        if ($res){
        	$result = $this->barang->update($term, $data);

        	if($result){
        		echo '<script language="javascript">';
	            echo 'window.location.href = "' . site_url('pelaporan/pelaporanBaru/sukses') . '";';
	            echo '</script>';
        	}
        	else{
        		echo '<script language="javascript">';
	            echo 'window.location.href = "' . site_url('pelaporan/pelaporanBaru/gagal') . '";';
	            echo '</script>';
			}	            
        }
        else{
        	echo '<script language="javascript">';
            echo 'window.location.href = "' . site_url('pelaporan/pelaporanBaru/gagal') . '";';
            echo '</script>';
        }
    }

    public function detailLaporan($id_barang){
    	$data['data'] = $this->pelaporanModel->getBarangById($id_barang);
    	//print_r($data['data']);
		$this->load->view('includes/header');
		$this->load->view('penyaluran/pelaporan/detail',$data);
		$this->load->view('includes/footer');
	}

}