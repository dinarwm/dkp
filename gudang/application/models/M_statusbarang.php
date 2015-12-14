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
		$this->db->select('NAMA_KASI');
		$this->db->select('ID_KASI');
		$query = $this->db->get('kasi');

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
		$this->db->select('NAMA_RAK');
		$this->db->select('ID_RAK');
		$query = $this->db->get('rak');

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
		$this->db->select('NAMA_BIDANG');
		$this->db->select('ID_BIDANG');
		$query = $this->db->get('bidang');

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
    	$q = "SELECT gudang.nama_gudang, barang.nama_barang, barang.jumlah_barang FROM gudang, barang, rak
    	WHERE gudang.id_gudang = rak.id_rak AND rak.id_rak = barang.id_barang";
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