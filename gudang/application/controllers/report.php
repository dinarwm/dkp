<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
		
	}

    public function rekapBarang(){

        $this->load->model('M_report');
        $data['list'] = $this->M_report->getRekapBarang();

        $this->load->view('includes/header');
        $this->load->view('report/RekapBarang/index',$data);
        $this->load->view('includes/footer');
    }

    public function rekapPenyaluranBarang(){

        $this->load->model('M_report');
        $data['list'] = $this->M_report->getRekapPenyaluranBarang();

        $this->load->view('includes/header');
        $this->load->view('report/RekapPenyaluranBarang/index',$data);
        $this->load->view('includes/footer');
    }

	public function stokOpname(){
		$this->load->view('includes/header');
		$this->load->view('report/stokOpname/index');
		$this->load->view('includes/footer');
	}

	public function laporanBulanan(){
		$this->load->view('includes/header');
		$this->load->view('report/laporanBulanan/index');
		$this->load->view('includes/footer');
	}

	public function kartuPersediaanBarang(){

        $this->load->model('M_report');
        $data['list'] =$this->M_report->getKPB();  

		$this->load->view('includes/header', $data);
		$this->load->view('report/kartuPersediaanBarang/index');
		$this->load->view('includes/footer');
	}

	public function buktiPengeluaranBarang(){

		$this->load->model('M_report');
        $data['list'] = $this->M_report->getBukti();

		$this->load->view('includes/header', $data);
		$this->load->view('report/buktiPengeluaranBarang/index');
		$this->load->view('includes/footer');
	}

	public function excelBpb($nomor_surat)
    {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->load->model('M_report');
        $data['list'] =$this->M_report->getexcelBPB($nomor_surat);  



        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Bukti Pengeluaran Barang');
        $this->excel->getActiveSheet()->setCellValue('A1', 'PEMERINTAH KOTA SURABAYA');
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
        $this->excel->getActiveSheet()->setCellValue('A2', 'DINAS KEBERSIHAN DAN PERTAMANAN');
        $this->excel->getActiveSheet()->mergeCells('A2:I2');
        $this->excel->getActiveSheet()->setCellValue('A3', 'Jl. Menur No. 31 SURABAYA Telp. (031)5967387, Fax. (031)5967390');
        $this->excel->getActiveSheet()->mergeCells('A3:I3');
        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A12', 'BUKTI PENGELUARAN BARANG');
        $this->excel->getActiveSheet()->mergeCells('A12:I12');
        $this->excel->getActiveSheet()->setCellValue('A13', 'Nomor Surat');
        $this->excel->getActiveSheet()->mergeCells('A13:I13');
        $this->excel->getActiveSheet()->setCellValue('A15', 'NO');
        $this->excel->getActiveSheet()->mergeCells('A15:A16');
        $this->excel->getActiveSheet()->setCellValue('B15', 'NAMA BARANG');
        $this->excel->getActiveSheet()->mergeCells('B15:D16');
        $this->excel->getActiveSheet()->setCellValue('E15', 'BANYAK');
        $this->excel->getActiveSheet()->mergeCells('E15:E16');
        $this->excel->getActiveSheet()->setCellValue('F15', 'SATUAN');
        $this->excel->getActiveSheet()->mergeCells('F15:F16');
        $this->excel->getActiveSheet()->setCellValue('G15', 'HARGA');
        $this->excel->getActiveSheet()->mergeCells('G15:H15');
        $this->excel->getActiveSheet()->setCellValue('G16', 'SATUAN');
        $this->excel->getActiveSheet()->setCellValue('H16', 'JUMLAH');
        $this->excel->getActiveSheet()->setCellValue('I15', 'KET.');
        $this->excel->getActiveSheet()->mergeCells('I15:I16');


        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
        //set aligment to center for that merged cell (A1 to P1)
        $this->excel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A12:A16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A16:I16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A12:I15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1:A2')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A12:A13')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A15:I16')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->getStyle('A1:A2')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A12')->getFont()->setSize(16);

        $this->excel->getActiveSheet()->getStyle('A1:A3')->getFill()->getStartColor()->setARGB('#000');

        $rownumber=18;
        $count = 17;
        foreach ($data['list'] as $row) {
            $exceldata[] = $row;
            $count++;
        }
        $nomer = 1;
        for($i=18; $i<=$count; $i++)
        {
            $this->excel->getActiveSheet()->setCellValue('A'.$i, $nomer++);
            //$this->excel->getActiveSheet()->mergeCells('B'.$rownumber.':D'.$rownumber);
        }
        $this->excel->getActiveSheet()->fromArray($exceldata, null, 'B18');
        //$this->excel->getActiveSheet()->mergeCells('B'.$rownumber.':D'.$rownumber);



        //  $rownumber=18;
        // $count = 1;
        // foreach ($data['list'] as $row) {
        //     $this->excel->getActiveSheet()->setCellValue('A'.$rownumber, $count);
        //     $this->excel->getActiveSheet()->setCellValue('B'.$rownumber, $row->nama_barang);
        //     $this->excel->getActiveSheet()->mergeCells('B'.$rownumber.':D'.$rownumber);
        //     $this->excel->getActiveSheet()->setCellValue('E'.$rownumber, $row->jumlah_barang);
        //     $this->excel->getActiveSheet()->setCellValue('F'.$rownumber, $row->ukuran);
        //     $this->excel->getActiveSheet()->setCellValue('G'.$rownumber, $row->harga_satuan);
        //     $this->excel->getActiveSheet()->setCellValue('F'.$rownumber, $row->harga_total);
        //     $count++;


        // foreach ($data['list'] as $row) 
        // {
        //    $count++;
        //    $list['no'] = $count;
        //    $list['nama_barang'] = $row->nama_barang;
        //    $list['jumlah_barang'] = $row->jumlah_barang;
        //    $list['ukuran'] = $row->ukuran;
        //    $list['harga_satuan'] = $row->harga_satuan;
        //    $list['harga_total'] = $row->harga_total;
        // }
        

        // //Fill data 
        //  $this->excel->getActiveSheet()->fromArray($list, null, 'A18');
        
       
        $filename='Bukti Pengeluaran Barang.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');     
    }


    public function excelKpb($nomor_surat)
    {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->load->model('M_report');
        $data['list'] =$this->M_report->getexcelKPB($nomor_surat); 


        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Kartu Persediaan Barang');
        $this->excel->getActiveSheet()->setCellValue('A2', 'KARTU PERSEDIAAN BARANG');

        $this->excel->getActiveSheet()->mergeCells('A2:K2');
        $this->excel->getActiveSheet()->mergeCells('A2:A3');

        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A4', 'GUDANG :');
        $this->excel->getActiveSheet()->setCellValue('A5', 'NAMA BARANG :');
        $this->excel->getActiveSheet()->setCellValue('E5', 'SATUAN :');

        $this->excel->getActiveSheet()->setCellValue('A7', 'TANGGAL');
        $this->excel->getActiveSheet()->mergeCells('A7:A9');

        $this->excel->getActiveSheet()->setCellValue('B7', 'Nomor/Tanggal/Surat Dasar Penerimaan Pengeluaran');
        $this->excel->getActiveSheet()->mergeCells('B7:B9');

        $this->excel->getActiveSheet()->setCellValue('C7', 'Uraian');
        $this->excel->getActiveSheet()->mergeCells('C7:C9');

        $this->excel->getActiveSheet()->setCellValue('D7', 'Barang-barang');
        $this->excel->getActiveSheet()->mergeCells('D7:F7');

        $this->excel->getActiveSheet()->setCellValue('D8', 'Masuk');
        $this->excel->getActiveSheet()->mergeCells('D8:D9');

        $this->excel->getActiveSheet()->setCellValue('E8', 'Keluar');
        $this->excel->getActiveSheet()->mergeCells('E8:E9');

        $this->excel->getActiveSheet()->setCellValue('F8', 'Sisa');
        $this->excel->getActiveSheet()->mergeCells('F8:F9');

        $this->excel->getActiveSheet()->setCellValue('H7', 'Harga Satuan');

        $this->excel->getActiveSheet()->setCellValue('G7', 'Jumlah harga barang yang diterima/dikeluarkan/sisa');
        $this->excel->getActiveSheet()->mergeCells('G7:I7');

        $this->excel->getActiveSheet()->setCellValue('G8', 'Bertambah');
        $this->excel->getActiveSheet()->mergeCells('G8:G9');

        $this->excel->getActiveSheet()->setCellValue('H8', 'Berkurang');
        $this->excel->getActiveSheet()->mergeCells('H8:H9');

        $this->excel->getActiveSheet()->setCellValue('I8', 'Sisa');
        $this->excel->getActiveSheet()->mergeCells('I8:I9');

        $this->excel->getActiveSheet()->setCellValue('J7', 'KETERANGAN');
        $this->excel->getActiveSheet()->mergeCells('J7:J9');


        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
        //set aligment to center for that merged cell (A1 to P1)
        $this->excel->getActiveSheet()->getStyle('A7:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1:J9')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#000');

        // $this->db->select(""); 
        // $this->db->from('');
        // $this->db->where("''");
        

       
        // $query = $this->db->get();
        // foreach ($data['list']->result_array() as $row) 
        // {
        //     $exceldata[] = $row;

        // $rownumber=11;
        // $count = 10;
        // foreach ($data['list'] as $row) {
        //     $exceldata[] = $row;
        //     $count++;
        // }
        // $nomer = 1;
        // for($i=11; $i<=$count; $i++)
        // {
        //     $this->excel->getActiveSheet()->setCellValue('A'.$i, $nomer++);
        //     //$this->excel->getActiveSheet()->mergeCells('B'.$rownumber.':D'.$rownumber);
        // }

        // //Fill data 
        // $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A11');
        
       
        $filename='Kartu Persediaan Barang.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');     
    }


}