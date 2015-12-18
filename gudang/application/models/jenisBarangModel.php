<?php

class JenisBarangModel extends CI_Model
{
    public function getListJenis()
    {
        $query = $this->db->get_where('jenis_barang', array('deleted_at' => NULL));

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

    public function updateStok($id, $stok)
    {
        $query = $this->db->get_where('jenis_barang', array('id_jenis' => $id));
        $row = $query->row_array();
        $stokBaru = $row['stok'] + $stok;
        $data = array(
               'stok' => $stokBaru
            );

        $this->db->where('id_jenis', $id);
        $this->db->update('jenis_barang', $data); 
    }

    public function tambahBarang($nama, $data)
    {
        $result = $this->db->get_where('jenis_barang',
            array
            (
                'nama_jenis' => $nama
            )
        );

        if ($result->num_rows() > 0)
        {
            return FALSE;
        }
        else
        {
            $this->db->insert('jenis_barang', $data); 
            return TRUE;
        }
    }
}

/* End of file layanan_model.php */