<?php

class M_statusbarang extends CI_Model
{

     public function getListRak()
    {
        $query = $this->db->get_where('rak', array('deleted_at' => NULL));

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

	public function getGudang()
    {
        $query = $this->db->get_where('gudang', array('deleted_at' => NULL));

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

	
	 public function getRekapBarang()
    {   
        $q = 'SELECT jenis_barang.nama_jenis, barang.jumlah_barang, status_barang.nama_status
        FROM jenis_barang, barang, status_barang
        WHERE barang.id_jenis = jenis_barang.id_jenis AND barang.id_status = status_barang.id_status';

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


    public function getStatusBarang()
    {
    	$q = 'SELECT status_barang.nama_status
    	FROM status_barang
    	WHERE status_barang.id_status';
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