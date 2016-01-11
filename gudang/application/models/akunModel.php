<?php

class AkunModel extends CI_Model
{
    public function getListAkun()
    {
        $query = $this->db->get_where('user', array('deleted_at' => NULL));

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

    public function tambahUser($nama, $data)
    {
        $result = $this->db->get_where('user',
            array
            (
                'nama_user' => $nama
            )
        );

        if ($result->num_rows() > 0)
        {
            return FALSE;
        }
        else
        {
            $this->db->insert('user', $data); 
            return TRUE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('user', array('deleted_at' => date('Y-m-d H:i:s')));
    }

    public function getAkun($id)
    {
        $query = $this->db->get_where('user', array('id_user' => $id));

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
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
        return TRUE;
    }
}

/* End of file layanan_model.php */