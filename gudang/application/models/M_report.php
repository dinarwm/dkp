<?php

class M_report extends CI_Model
{


     public function getRekapBarang()
    {
        $q = "SELECT jenis_barang.nama_jenis, barang.jumlah_barang, pengadaan.asal_penerimaan, pengadaan.tgl_ba_penerimaan, pengadaan.nomer_spk, pengadaan.tipe_pengadaan 
        FROM barang,pengadaan, jenis_barang
        WHERE barang.id_pengadaan = pengadaan.id_pengadaan AND barang.id_jenis = jenis_barang.id_jenis";
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
        $q = "SELECT penyaluran.nomor_surat, penyaluran.tgl_penyaluran, jenis_barang.nama_jenis, barang.jumlah_barang, penyaluran.nama_penerima 
        FROM penyaluran,barang, jenis_barang 
        WHERE penyaluran.id_penyaluran = barang.id_penyaluran AND jenis_barang.id_jenis = barang.id_jenis";
        $query = $this->db->query($q);

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {

                $data[] = $row;
                # code...
            }
            return $data;
        }
    }
   

     public function getBukti()
    {   
        $q = 'SELECT penyaluran.nomor_surat, penyaluran.tgl_surat, jenis_barang.nama_jenis, gudang.nama_gudang
        FROM penyaluran, jenis_barang, barang, rak, gudang
        WHERE penyaluran.id_penyaluran = barang.id_penyaluran AND barang.id_jenis = jenis_barang.id_jenis 
        AND barang.id_rak = rak.id_rak AND rak.id_gudang = gudang.id_gudang';
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                // $id = $row->id_odp;

                $data[] = $row;
            }
            return $data;
        }

    }

     public function getexcelBPB($nomor_surat)
    {
        $q = "SELECT jenis_barang.nama_jenis, jenis_barang.stok, jenis_barang.satuan, barang.harga_satuan, barang.harga_total
        FROM jenis_barang, barang, penyaluran
        WHERE barang.id_jenis = jenis_barang.id_jenis AND penyaluran.nomor_surat = '$nomor_surat'";

        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data[] = $row;
            }
            return $data;
        }

    }

    public function getKPB()
    {
        $q = "SELECT jenis_barang.nomor_kpb, gudang.nama_gudang, jenis_barang.nama_jenis
        FROM jenis_barang, gudang, rak,barang
        WHERE gudang.id_gudang = rak.id_gudang AND barang.id_rak = rak.id_rak AND jenis_barang.id_jenis = barang.id_jenis
        GROUP BY jenis_barang.nomor_kpb";
        $query = $this->db->query($q);

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {

                $data[] = $row;
                # code...
            }
            return $data;
        }
    }

    public function getexcelKPB($nomor_kpb)
    {
        $q = "SELECT pengadaan.tgl_spk, pengadaan.tgl_ba_penerimaan, pengadaan.uraian_pekerjaan, barang.harga_satuan
        FROM pengadaan, barang, jenis_barang
        WHERE pengadaan.id_pengadaan = barang.id_pengadaan 
        AND barang.id_jenis = jenis_barang.id_jenis 
        AND jenis_barang.nomor_kpb = '$nomor_kpb'";

        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data[] = $row;
            }
            return $data;
        }

    }


    public function getexcelLapBulPengadaan()
    {
        $q = "SELECT jenis_barang.nama_jenis, sum(barang.jumlah_barang) as jumlah_pengadaan, barang.jumlah_barang, jenis_barang.satuan
        FROM barang, jenis_barang, pengadaan 
        WHERE barang.id_jenis = jenis_barang.id_jenis AND barang.id_pengadaan is NOT NULL AND barang.id_pengadaan = pengadaan.id_pengadaan 
        AND MONTH(pengadaan.tgl_spk) = '1' AND YEAR(pengadaan.tgl_spk) = '2016' 
        GROUP BY jenis_barang.nama_jenis";
    
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data[] = $row;
            }
            return $data;
        }
    }

    public function getexcelLapBulMasuk()
    {
        $q = "SELECT jenis_barang.nama_jenis, sum(barang.jumlah_barang) as hasil_pengadaan, barang.jumlah_barang, jenis_barang.satuan
        FROM barang, jenis_barang, pengadaan 
        WHERE barang.id_jenis = jenis_barang.id_jenis AND barang.id_pengadaan is NOT NULL AND barang.id_pengadaan = pengadaan.id_pengadaan 
        AND MONTH(pengadaan.tgl_spk) = '1' AND YEAR(pengadaan.tgl_spk) = '2016' 
        GROUP BY jenis_barang.nama_jenis";
    
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data1[] = $row;
            }
            return $data1;
        }
    }

    public function getexcelLapBulPenyaluran()
    {
        $q = "SELECT jenis_barang.nama_jenis, (jumlah_barang -sum(barang.jumlah_barang)) as jumlah_penyaluran
        FROM barang, jenis_barang, penyaluran
        WHERE barang.id_jenis = jenis_barang.id_jenis AND barang.id_penyaluran is NOT NULL AND barang.id_penyaluran = penyaluran.id_penyaluran
        AND MONTH(penyaluran.tgl_surat) = '1' AND YEAR(penyaluran.tgl_surat) = '2016' 
        GROUP BY jenis_barang.nama_jenis";
    
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data2[] = $row;
            }
            return $data2;
        }
    }

    public function getexcelLapBulKeluar()
    {
        $q = "SELECT jenis_barang.nama_jenis, sum(barang.jumlah_barang) as hasil_penyaluran
        FROM barang, jenis_barang, penyaluran
        WHERE barang.id_jenis = jenis_barang.id_jenis AND barang.id_penyaluran is NOT NULL AND barang.id_penyaluran = penyaluran.id_penyaluran
        AND MONTH(penyaluran.tgl_surat) = '1' AND YEAR(penyaluran.tgl_surat) = '2016' 
        GROUP BY jenis_barang.nama_jenis";
    
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data3[] = $row;
            }
            return $data3;
        }
    }

    public function getexcelStokAwal()
    {
        $q = "SELECT jenis_barang.nama_jenis, jenis_barang.satuan, barang.harga_satuan, barang.harga_total, barang.jumlah_barang
        FROM jenis_barang, barang
        WHERE jenis_barang.id_jenis = barang.id_jenis
        GROUP BY jenis_barang.nama_jenis";        
    
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data[] = $row;
            }
            return $data;
         } 
    }

    public function getexcelStokMasuk()
    {
        $q = "SELECT pengadaan.tgl_spk, barang.harga_satuan, sum(barang.jumlah_barang) as hasil_setahun
        FROM pengadaan,barang 
        WHERE barang.id_pengadaan = pengadaan.id_pengadaan AND barang.id_pengadaan is NOT NULL AND YEAR(pengadaan.tgl_spk) = '2016'
        ORDER BY pengadaan.tgl_spk DESC LIMIT 1";
    
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data1[] = $row;
            }
            return $data1;
        }
    }

    public function getexcelStokKeluar()
    {
        $q = "SELECT penyaluran.tgl_surat, barang.harga_satuan, sum(barang.jumlah_barang) as hasil_stahun
        FROM penyaluran,barang 
        WHERE barang.id_penyaluran = penyaluran.id_penyaluran AND barang.id_penyaluran is NOT NULL AND YEAR(penyaluran.tgl_surat) = '2016'
        ORDER BY penyaluran.tgl_surat DESC LIMIT 1";
    
        $query = $this->db->query($q);

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $data2[] = $row;
            }
            return $data2;
        }
    }

}

