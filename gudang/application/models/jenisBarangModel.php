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

    public function getJenisBarang($id)
    {
        $query = $this->db->get_where('jenis_barang', array('id_jenis' => $id));

        if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else 
        {
            return FALSE;
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

    public function delete($id)
    {
        $this->db->where('id_jenis', $id);
        return $this->db->update('jenis_barang', array('deleted_at' => date('Y-m-d H:i:s')));
    }

    public function edit($nama, $id, $data)
    {
        $nama = strtolower($nama);
        
        $query = $this->db->get_where('jenis_barang', array('nama_jenis' => $nama));

        if ($query->num_rows() > 0)
        {
            $query = $this->db->get_where('jenis_barang', array('nama_jenis' => $nama, 'deleted_at' => NULL));
            if ($query->num_rows() > 0)
            {
                return FALSE;  
            }
            else
            {
                $this->db->where('nama_jenis', $nama);
                $this->db->update('jenis_barang', array('deleted_at' => NULL));  

                $this->db->where('id_jenis', $id);
                $this->db->update('jenis_barang', array('deleted_at' => date('Y-m-d H:i:s')));
                return TRUE;
            }   
        }
        else
        {
            $this->db->where('id_jenis', $id);
            $this->db->update('jenis_barang', $data);
            return TRUE;
        }
    }
}

/* End of file layanan_model.php */