<?php

class PengadaanModel extends CI_Model
{
	public function insert($data)
 	{
 		if($data['tipe_pengadaan'] == 'pengadaan'){
 			$sql = "INSERT INTO PENGADAAN (no_ba_penerimaan, no_ba_pemeriksaan, tgl_ba_penerimaan, tgl_ba_pemeriksaan, kegiatan, nomer_spk, tgl_spk, uraian_pekerjaan, nama_rekanan, alamat_rekanan, nilai_spk, rekening_belanja, tipe_pengadaan) VALUES ('" . $data['no_ba_penerimaan'] ."', '".$data['no_ba_pemeriksaan']."', STR_TO_DATE('".$data['tgl_ba_penerimaan']."','%d/%m/%Y'), STR_TO_DATE('".$data['tgl_ba_pemeriksaan']."','%d/%m/%Y'), '".$data['kegiatan']."', '".$data['nomer_spk']."', STR_TO_DATE('".$data['tgl_spk']."','%d/%m/%Y'), '".$data['uraian_pekerjaan']."', '".$data['nama_rekanan']."', '".$data['alamat_rekanan']."', '".$data['nilai_spk']."', '".$data['rekening_belanja']."', '".$data['tipe_pengadaan']."' )";
        	return $this->db->query($sql);
        	//return $data['tgl_ba_penerimaan'];
 		}
 		else if ($data['tipe_pengadaan'] == 'pemda'){
 			$sql = "INSERT INTO PENGADAAN (no_ba_serahterima, tgl_ba_serahterima, asal_penerimaan, tipe_pengadaan) VALUES ('" . $data['no_ba_serahterima'] ."', STR_TO_DATE('".$data['tgl_ba_serahterima']."','%d/%m/%Y'), '".$data['asal_penerimaan']."', '".$data['tipe_pengadaan']."' )";
        	//$result = $this->db->query($sql);
        	return $this->db->query($sql);
 		}
 		else if ($data['tipe_pengadaan'] == 'hibah'){
 			$sql = "INSERT INTO PENGADAAN (no_ba_serahterima, tgl_ba_serahterima, asal_penerimaan, tipe_pengadaan) VALUES ('" . $data['no_ba_serahterima'] ."', STR_TO_DATE('".$data['tgl_ba_serahterima']."','%d/%m/%Y'), '".$data['asal_penerimaan']."', '".$data['tipe_pengadaan']."' )";
        	return $this->db->query($sql);
 		}
 	}

 	public function getIDPengadaan(){
 		$this->db->select_max('id_pengadaan');
		$query = $this->db->get('pengadaan');
		if ($query->num_rows() > 0)
		{
    		$row = $query->row_array();
    		return $row['id_pengadaan'];
    	}
    	else
    	{
    		return false;
    	}
 	}
}

/* End of file layanan_model.php */