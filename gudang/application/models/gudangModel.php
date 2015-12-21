<?php

class GudangModel extends CI_Model
{
    public function getListGudang()
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

    public function tambahGudang($nama, $data){
        $result = $this->db->get_where('gudang',
            array
            (
                'nama_gudang' => $nama
            )
        );

        if ($result->num_rows() > 0)
        {
            return FALSE;
        }
        else
        {
            $this->db->insert('gudang', $data); 
            return TRUE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id_gudang', $id);
        return $this->db->update('gudang', array('deleted_at' => date('Y-m-d H:i:s')));
    }

    public function getGudang($id)
    {
        $query = $this->db->get_where('gudang', array('id_gudang' => $id));

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
        $this->db->where('id_gudang', $id);
        $this->db->update('gudang', $data);
        return TRUE;
    }
}

/* End of file layanan_model.php */