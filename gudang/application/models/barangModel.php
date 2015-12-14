<?php

class BarangModel extends CI_Model
{
	public function insert($data)
 	{
 		return $this->db->insert('barang', $data); 
 	}

 	public function getIDBarang(){
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