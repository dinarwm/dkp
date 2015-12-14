<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
		
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
		$this->load->view('includes/header');
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

	public function excelBpb($mode)
    {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);

        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Bukti Pengeluaran Barang');
        $this->excel->getActiveSheet()->setCellValue('A1', 'PEMERINTAH KOTA SURABAYA');

        $this->excel->getActiveSheet()->mergeCells('A2:F2');
        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A12', 'BUKTI PENGELUARAN BARANG');
        $this->excel->getActiveSheet()->mergeCells('A12:I12');

        $this->excel->getActiveSheet()->setCellValue('A13', 'Nomor Surat');

        $this->excel->getActiveSheet()->setCellValue('A15', 'NO');
        $this->excel->getActiveSheet()->mergeCells('A15:A16');

        $this->excel->getActiveSheet()->setCellValue('B15', 'NAMA BARANG');
        $this->excel->getActiveSheet()->mergeCells('B15:B16');

        $this->excel->getActiveSheet()->setCellValue('E15', 'BANYAK');
        $this->excel->getActiveSheet()->mergeCells('E15:E16');

        $this->excel->getActiveSheet()->setCellValue('F15', 'SATUAN');
        $this->excel->getActiveSheet()->mergeCells('F15:F16');

        $this->excel->getActiveSheet()->setCellValue('G15', 'HARGA');
        $this->excel->getActiveSheet()->mergeCells('G15:H15');

        $this->excel->getActiveSheet()->setCellValue('G16', 'SATUAN');

        $this->excel->getActiveSheet()->setCellValue('H16', 'JUMLAH');

        $this->excel->getActiveSheet()->setCellValue('I15', 'KETERANGAN');
        $this->excel->getActiveSheet()->mergeCells('I15:I16');


        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
        //set aligment to center for that merged cell (A1 to P1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#000');

        $this->db->select(""); 
        $this->db->from('KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN');
        $this->db->where("MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS = KOMPLAIN.JENIS_KOMPLAIN AND KOMPLAIN.NAMA_MEDIA<>'Plasa' AND KOMPLAIN.STATUS_KOMPLAIN = 'In Progress'");
        

       
        $query = $this->db->get();
        foreach ($query->result_array() as $row) 
        {
            $exceldata[] = $row;
        }
        

        //Fill data 
        $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

         
        $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('K4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('L4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('M4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('N4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('O4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
       
        $filename='Laporan Komplain.xls'; //save our workbook as this file name

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