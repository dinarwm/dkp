<?php

class RakModel extends CI_Model
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

    public function getRakGudang($id_gudang)
    {
        $query = $this->db->get_where('rak', array('deleted_at' => NULL, 'id_gudang' => $id_gudang));

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

    public function daftarRak()
    {
        $q = "SELECT rak.*, gudang.nama_gudang FROM rak, gudang WHERE rak.id_gudang = gudang.id_gudang and rak.deleted_at IS NULL";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function daftarRakGudang($id)
    {
        if ($id == 0)
        {
            $q = "SELECT rak.*, gudang.nama_gudang FROM rak, gudang WHERE rak.id_gudang = gudang.id_gudang and rak.deleted_at IS NULL";    
        }
        else
        {
            $q = "SELECT rak.*, gudang.nama_gudang FROM rak, gudang WHERE rak.id_gudang = gudang.id_gudang and rak.id_gudang = '$id' and rak.deleted_at IS NULL";    
        }
        $query = $this->db->query($q);
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function tambahRak($nama, $data){
        $result = $this->db->get_where('rak',
            array
            (
                'nama_rak' => $nama
            )
        );

        if ($result->num_rows() > 0)
        {
            return FALSE;
        }
        else
        {
            $this->db->insert('rak', $data); 
            return TRUE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id_rak', $id);
        return $this->db->update('rak', array('deleted_at' => date('Y-m-d H:i:s')));
    }

    public function getRak($id)
    {
        $query = $this->db->get_where('rak', array('id_rak' => $id));

        if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else 
        {
            return FALSE;
        }
    }

    public function edit($id, $data)
    {
        $this->db->where('id_rak', $id);
        $this->db->update('rak', $data);
        return TRUE;
    }
}

/* End of file layanan_model.php */