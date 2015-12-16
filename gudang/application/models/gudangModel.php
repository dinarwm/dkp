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
}

/* End of file layanan_model.php */