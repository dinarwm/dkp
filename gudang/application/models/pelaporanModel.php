<?php

class PelaporanModel extends CI_Model
{
	public function getNoSurat($status)
    {
    	$this->db->select('barang.id_penyaluran, penyaluran.nomor_surat');
    	$this->db->distinct();
    	$this->db->from('barang');
    	$this->db->join('penyaluran', 'penyaluran.id_penyaluran = barang.id_penyaluran');
    	$this->db->where('barang.id_status',$status);
        $query =$this->db->get();
        return $query->result();
    }
    public function getBarang($status,$id_penyaluran)
    {
        $this->db->select('barang.*, jenis_barang.nama_jenis');
        $this->db->from('barang');
        $this->db->where('barang.id_status',$status);
        $this->db->where('id_penyaluran', $id_penyaluran);
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        $query =$this->db->get();
        return $query->result();
    }
    public function getBarangById($id_barang)
    {
        $this->db->select('barang.*, jenis_barang.nama_jenis');
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        $query = $this->db->get_where('barang', array('id_barang' => $id_barang));
        return $query->result();
    }

}

/* End of file pelaporanModel.php */