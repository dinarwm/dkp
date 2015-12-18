<?php

class M_statusbarang extends CI_Model
{

	public function getGudang()
	{
		$q = 'SELECT gudang.nama_gudang FROM gudang
		WHERE gudang.id_gudang '; 
		$query = $this->db->query($q); 
		

		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}
		else
		{
			return false;
		}
	}

	public function getRak()
	{
		$q = 'SELECT rak.nama_rak FROM gudang, rak 
		WHERE rak.id_gudang =gudang.id_gudang'; 
		$query = $this->db->query($q); 

		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}
		else
		{
			return false;
		}
	}

	
	 public function getDataBarang()
    {   
    	$q = "SELECT rak.nama_rak, gudang.nama_gudang, jenis_barang.nama_jenis, jenis_barang.nomor_kpb, 
    	barang.nama_barang, barang.id_status, status_barang.nama_status
    	FROM gudang, rak, jenis_barang, barang, status_barang
    	WHERE gudang.id_gudang = rak.id_gudang AND rak.id_rak = barang.id_rak AND jenis_barang.id_jenis AND barang.id_status = status_barang.id_status";
    	$query = $this->db->query($q);

    	 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                // $id = $row->id_odp;

                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;   
        }

    }

}