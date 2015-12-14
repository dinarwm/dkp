<?php

class M_statusbarang extends CI_Model
{
	public function getGudang()
	{
		$q = 'SELECT gudang.nama_gudang FROM gudang WHERE gudang.id_gudang'; 
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


	public function getKasi()
	{
		$q = 'SELECT kasi.nama_kasi FROM kasi WHERE kasi.id_kasi'; 
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
		$q = 'SELECT rak.nama_rak FROM rak WHERE rak.id_rak'; 
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

	
	public function getBidang()
	{
		$q = 'SELECT bidang.nama_bidang FROM bidang WHERE bidang.id_bidang'; 
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
    	$q = "SELECT bidang.nama_bidang, kasi.nama_kasi, rak.nama_rak, gudang.nama_gudang, jenis_barang.nama_jenis, jenis_barang.nomor_kpb 
    	FROM bidang, kasi, gudang, rak, barang, jenis_barang
    	WHERE bidang.id_bidang = kasi.id_kasi AND kasi.id_kasi = gudang.id_gudang AND gudang.id_gudang = rak.id_rak AND rak.id_rak = barang.id_barang AND barang.id_jenis = jenis_barang.id_jenis";
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