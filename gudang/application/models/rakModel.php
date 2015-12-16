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
}

/* End of file layanan_model.php */