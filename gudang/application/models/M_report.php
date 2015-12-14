<?php

class M_report extends CI_Model
{
	 public function getBukti()
    {   
    	$q = "SELECT penyaluran.nomor_surat, penyaluran.tgl_surat FROM penyaluran
    	WHERE penyaluran.id_penyaluran";
    	$query = $this->db->query($q);

    	 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                // $id = $row->id_odp;

                $data[] = $row;
            }
            return $data;
        }

    }

}