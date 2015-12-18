<?php

class M_report extends CI_Model
{

	 public function getBukti()
    {   
    	$q = "SELECT penyaluran.nomor_surat, penyaluran.tgl_surat, gudang.nama_gudang FROM penyaluran,gudang, barang, rak
    	WHERE penyaluran.id_penyaluran AND gudang.id_gudang = rak.id_gudang AND barang.id_rak = rak.id_rak";
    	$query = $this->db->query($q);

    	 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                // $id = $row->id_odp;

                $data[] = $row;
            }
            return $data;
        }

    }

     public function getRekapBarang()
    {
        $q = "SELECT barang.nama_barang, barang.jumlah_barang, pengadaan.asal_penerimaan, pengadaan.tgl_ba_penerimaan, pengadaan.nomer_spk FROM barang,pengadaan WHERE barang.id_pengadaan = pengadaan.id_pengadaan";
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                // $id = $row->id_odp;

                $data[] = $row;
            }
            return $data;
        }
    }

    public function getRekapPenyaluranBarang()
    {
        $q = "SELECT penyaluran.nomor_surat, penyaluran.tgl_penyaluran, barang.nama_barang, barang.jumlah_barang, penyaluran.nama_penerima FROM penyaluran,barang WHERE penyaluran.id_penyaluran = barang.id_penyaluran ";
        $query = $this->db->query($q);

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {

                $data[] = $row;
                # code...
            }
            return $data;
        }
    }

    public function getKPB()
    {
        $q = "SELECT jenis_barang.nomor_kpb, gudang.nama_gudang, jenis_barang.nama_jenis
        FROM jenis_barang, gudang, rak,barang
        WHERE gudang.id_gudang = rak.id_gudang AND barang.id_rak = rak.id_rak AND jenis_barang.id_jenis = barang.id_jenis";
        $query = $this->db->query($q);

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {

                $data[] = $row;
                # code...
            }
            return $data;
        }
    }


    public function getexcelBPB($nomor_surat)
    {
        /*$this->db->select("barang.nama_barang,barang.jumlah_barang, barang.ukuran,  barang.harga_satuan, barang.harga_total, penyaluran.tgl_penyaluran");
        $this->db->from("barang,penyaluran");
        $this->db->where("penyaluran.id_penyaluran = barang.id_penyaluran AND penyaluran.nomor_surat = '000123' ");*/
        $q = "select barang.nama_barang,barang.jumlah_barang, barang.ukuran,  barang.harga_satuan, barang.harga_total
        from barang,penyaluran
        where penyaluran.id_penyaluran = barang.id_penyaluran AND penyaluran.nomor_surat = '$nomor_surat'";
        $query = $this->db->query($q);

        if($query->num_rows() > 0){
            return $query->result_array();
            }
    }

    public function getexcelKPB($nomor_surat)
    {
        $q = "select penyaluran.tgl_penyaluran, penyaluran.nomor_surat, barang.jumlah_barang, barang.harga_satuan
        from penyaluran,barang
        where barang.id_penyaluran = penyaluran.id_penyaluran AND penyaluran.nomor_surat = '$nomor_surat'";
        $query = $this->db->query($q);

        if($query->num_rows() > 0){
            return $query->result_array();
            }
    }

}

