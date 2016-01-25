<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != TRUE){
            redirect('auth');
        }
    }

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
        $this->load->model('M_report');
//        $data['list'] =$this->M_report->getLaporanBulanan(); 

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

        //insert Logo
        $image = imagecreatefrompng('assets/logo.png');
        $drawing = new PHPExcel_Worksheet_MemoryDrawing();
        $drawing->setName('Logo');
        $drawing->setCoordinates('B1');
        $drawing->setImageResource($image);
        $drawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
        $drawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
        $drawing->setHeight(60);
        $drawing->setWorksheet($this->excel->getActiveSheet());


        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Bukti Pengeluaran Barang');

        $this->excel->getActiveSheet()->setCellValue('A1', 'PEMERINTAH KOTA SURABAYA');
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('A2', 'DINAS KEBERSIHAN DAN PERTAMANAN');
        $this->excel->getActiveSheet()->mergeCells('A2:I2');
        $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('A3', 'Jl. Menur No. 31 SURABAYA Telp. (031)5967387, Fax. (031)5967390');
        $this->excel->getActiveSheet()->mergeCells('A3:I3');
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $styleArray = array('font' => array('underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE));
        $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray);
        unset($styleArray);


        $this->excel->getActiveSheet()->setCellValue('H6', 'MODEL BEND : 29');
        $this->excel->getActiveSheet()->mergeCells('H6:I6');
        $this->excel->getActiveSheet()->getStyle('H6')->getFont()->setSize(11);
        $this->excel->getActiveSheet()->getStyle('H6')->getFont()->setBold(true);

        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A12', 'BUKTI PENGELUARAN BARANG');
        $this->excel->getActiveSheet()->mergeCells('A12:I12');
        $this->excel->getActiveSheet()->getStyle('A12')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A12')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $styleArray = array('font' => array('underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE));
        $this->excel->getActiveSheet()->getStyle('A12')->applyFromArray($styleArray);
        unset($styleArray);


        $this->excel->getActiveSheet()->setCellValue('A13', 'No. : 020/        /VI/GD/43.6.5/2016');
        $this->excel->getActiveSheet()->mergeCells('A13:I13');
        $this->excel->getActiveSheet()->getStyle('A13')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('A15', 'No.');
        $this->excel->getActiveSheet()->mergeCells('A15:A16');
        $this->excel->getActiveSheet()->getStyle('A15:I16')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A15:I16')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A15:I16')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $this->excel->getActiveSheet()->getStyle('A15:I16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('B15', 'NAMA BARANG');
        $this->excel->getActiveSheet()->mergeCells('B15:D16');
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $this->excel->getActiveSheet()->setCellValue('E15', 'BANYAK');
        $this->excel->getActiveSheet()->mergeCells('E15:E16');

        $this->excel->getActiveSheet()->setCellValue('F15', 'SATUAN');
        $this->excel->getActiveSheet()->mergeCells('F15:F16');

        $this->excel->getActiveSheet()->setCellValue('G15', 'HARGA');
        $this->excel->getActiveSheet()->mergeCells('G15:H15');

        $this->excel->getActiveSheet()->setCellValue('G16', 'SATUAN');
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $this->excel->getActiveSheet()->setCellValue('H16', 'JUMLAH');
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);


        $this->excel->getActiveSheet()->setCellValue('I15', 'KET.');
        $this->excel->getActiveSheet()->mergeCells('I15:I16');

        $this->excel->getActiveSheet()->setCellValue('B22', 'Keterangan :');
        $this->excel->getActiveSheet()->mergeCells('B22:D22');
        $this->excel->getActiveSheet()->getStyle('B22:D22')->getFont()->setSize(12);

        $this->excel->getActiveSheet()->setCellValue('B24', 'Barang tersebut di atas digunakan untuk ');
        $this->excel->getActiveSheet()->mergeCells('B24:I24');
        $this->excel->getActiveSheet()->getStyle('B22:D22')->getFont()->setSize(12);

        $this->excel->getActiveSheet()->setCellValue('B25', 'Dinas Kebersihan dan Pertamanan Kota Surabaya');
        $this->excel->getActiveSheet()->mergeCells('B25:I25');
        $this->excel->getActiveSheet()->getStyle('B25:I25')->getFont()->setSize(12);


        $style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
        $this->excel->getActiveSheet()->getStyle('A15:I16')->applyFromArray($style);

        $style1 = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
        $this->excel->getActiveSheet()->getStyle('A21:I26')->applyFromArray($style1);


        $this->excel->getActiveSheet()->getStyle('A28:E43')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->setCellValue('A30', 'Yang Mengeluarkan,');
        $this->excel->getActiveSheet()->mergeCells('A30:E30');
        $this->excel->getActiveSheet()->getStyle('A30:E30')->getFont()->setSize(12);

        $this->excel->getActiveSheet()->setCellValue('A31', 'Penyimpan Barang');
        $this->excel->getActiveSheet()->mergeCells('A31:E31');
        $this->excel->getActiveSheet()->getStyle('A31:E31')->getFont()->setSize(12);

        $this->excel->getActiveSheet()->setCellValue('A32', 'Dinas Kebersihan & Pertamanan');
        $this->excel->getActiveSheet()->mergeCells('A32:E32');
        $this->excel->getActiveSheet()->getStyle('A32:E32')->getFont()->setSize(12);

        $this->excel->getActiveSheet()->setCellValue('A33', 'Kota Surabaya');
        $this->excel->getActiveSheet()->mergeCells('A33:E33');
        $this->excel->getActiveSheet()->getStyle('A33:E33')->getFont()->setSize(12);


        $this->excel->getActiveSheet()->setCellValue('G28', 'Surabaya, 11 Juni 2016');
        $this->excel->getActiveSheet()->mergeCells('G28:H28');

        $this->excel->getActiveSheet()->setCellValue('F30', 'Penerima Barang,');
        $this->excel->getActiveSheet()->mergeCells('F30:I30');

        $this->excel->getActiveSheet()->setCellValue('A33', 'Kota Surabaya');
        $this->excel->getActiveSheet()->mergeCells('A33:E33');

        $this->excel->getActiveSheet()->setCellValue('A40', 'Mengetahui');
        $this->excel->getActiveSheet()->mergeCells('A40:D40');

        $this->excel->getActiveSheet()->setCellValue('A42', 'a.n. Kepala Dinas Kebersihan & Pertamanan');
        $this->excel->getActiveSheet()->mergeCells('A42:D42');

        $this->excel->getActiveSheet()->setCellValue('A43', 'Sekertaris,');
        $this->excel->getActiveSheet()->mergeCells('A43:D43');

        $this->excel->getActiveSheet()->setCellValue('E40', 'Mengetahui');
        $this->excel->getActiveSheet()->mergeCells('E40:I40');

        $this->excel->getActiveSheet()->setCellValue('E42', 'Kepala Sub Bagian Umum & Kepegawaian');
        $this->excel->getActiveSheet()->mergeCells('E42:I42');

        $this->excel->getActiveSheet()->setCellValue('E43', 'Dinas Kebersihan dan Pertamanan Kota Surabaya');
        $this->excel->getActiveSheet()->mergeCells('E43:I43');


        $this->excel->getActiveSheet()->getStyle('G28:I43')->getFont()->setSize(12);

        $this->excel->getActiveSheet()->getStyle('A1:A3')->getFill()->getStartColor()->setARGB('#000');



        $bar = 18;
        $row_num = 1; 
        foreach ($data['list'] as $row) { 
            $this->excel->getActiveSheet()->setCellValue('A'.$bar, $row_num); 
            $this->excel->getActiveSheet()->setCellValue('B'.$bar, $row->nama_jenis);
            $this->excel->getActiveSheet()->mergeCells('B'.$bar.':D'.$bar);
            $this->excel->getActiveSheet()->setCellValue('E'.$bar, $row->stok);
            $this->excel->getActiveSheet()->setCellValue('F'.$bar, $row->satuan);
            $this->excel->getActiveSheet()->setCellValue('G'.$bar, $row->harga_satuan);
            $this->excel->getActiveSheet()->setCellValue('H'.$bar, $row->harga_total);
            $this->excel->getActiveSheet()->setCellValue('I'.$bar, $row->harga_total);
            $bar++;
        }
    

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


    public function excelKpb($nomor_kpb)
    {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->load->model('M_report');
        $data['list'] =$this->M_report->getexcelKPB($nomor_kpb);


        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Kartu Persediaan Barang');
        $this->excel->getActiveSheet()->setCellValue('A3', 'KARTU PERSEDIAAN BARANG');
        $this->excel->getActiveSheet()->mergeCells('A3:J3');
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(18);
        $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $styleArray = array('font' => array('underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE));
        $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray);
        unset($styleArray);

        
        //set cell A4 GUDANG
        $this->excel->getActiveSheet()->setCellValue('A4', 'GUDANG :');
        $this->excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(12);
        //for($col = 'A'; $col !== 'K'; $col++) {$this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);}
        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);


        //set cell A5 NAMA BARANG
        $this->excel->getActiveSheet()->setCellValue('A5', 'NAMA BARANG :');
        $this->excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(12);

        //set cell E5 SATUAN
        $this->excel->getActiveSheet()->setCellValue('E5', 'SATUAN :');
        $this->excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(12);

        //set cell K3 MODEL BEND 23
        $this->excel->getActiveSheet()->setCellValue('K3', 'Model : BEND 23');
        $this->excel->getActiveSheet()->getStyle('K3')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('K3')->getFont()->setBold(true);
        $styleArray = array('font' => array('underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE));
        $this->excel->getActiveSheet()->getStyle('K3')->applyFromArray($styleArray);
        unset($styleArray);

        $this->excel->getActiveSheet()->setCellValue('K4', 'Kartu No.');
        $this->excel->getActiveSheet()->getStyle('K4')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('K4')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->setCellValue('A7', 'Tanggal');
        $this->excel->getActiveSheet()->mergeCells('A7:A9');
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('B7', 'Nomor/Tanggal/Surat Dasar Penerimaan Pengeluaran');
        $this->excel->getActiveSheet()->mergeCells('B7:B9');
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('B7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B7:B9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(45);


        $this->excel->getActiveSheet()->setCellValue('C7', 'Uraian');
        $this->excel->getActiveSheet()->mergeCells('C7:C9');
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->setCellValue('D7', 'Barang-barang');
        $this->excel->getActiveSheet()->mergeCells('D7:F7');
        $this->excel->getActiveSheet()->getStyle('A7:F9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A7:F9')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A7:F9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('D8', 'Masuk');
        $this->excel->getActiveSheet()->mergeCells('D8:D9');
        $this->excel->getActiveSheet()->setCellValue('E8', 'Keluar');
        $this->excel->getActiveSheet()->mergeCells('E8:E9');
        $this->excel->getActiveSheet()->setCellValue('F8', 'Sisa');
        $this->excel->getActiveSheet()->mergeCells('F8:F9');

        $this->excel->getActiveSheet()->setCellValue('G7', 'Harga Satuan');
        $this->excel->getActiveSheet()->mergeCells('G7:G9');
        $this->excel->getActiveSheet()->getStyle('G7:J8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('G7:J8')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('G7:G9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('G7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('H7', 'Jumlah harga barang yang diterima/dikeluarkan/sisa');
        $this->excel->getActiveSheet()->mergeCells('H7:J8');
        $this->excel->getActiveSheet()->getStyle('H7:J8')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('H7:K9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('H7:K9')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H7:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);

        $this->excel->getActiveSheet()->setCellValue('H9', 'Bertambah');
        $this->excel->getActiveSheet()->setCellValue('I9', 'Berkurang');;
        $this->excel->getActiveSheet()->setCellValue('J9', 'Sisa');

        $this->excel->getActiveSheet()->setCellValue('K7', 'KETERANGAN');
        $this->excel->getActiveSheet()->mergeCells('K7:K9');
        $this->excel->getActiveSheet()->getStyle('K7:K9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

        $style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
        $this->excel->getActiveSheet()->getStyle('A7:K26')->applyFromArray($style);

        $this->excel->getActiveSheet()->setCellValue('A31', 'Mengetahui :');
        $this->excel->getActiveSheet()->mergeCells('A31:B31');
        $this->excel->getActiveSheet()->getStyle('A31:A33')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('A32', 'a.n. Kepala Dinas Kebersihan & Pertamanan');
        $this->excel->getActiveSheet()->mergeCells('A32:B32');

        $this->excel->getActiveSheet()->setCellValue('A33', 'Sekertaris,');
        $this->excel->getActiveSheet()->mergeCells('A33:B33');


        $this->excel->getActiveSheet()->setCellValue('I29', 'Surabaya, 31 Desember 2016');
        $this->excel->getActiveSheet()->mergeCells('I29:K29');

        $this->excel->getActiveSheet()->setCellValue('I32', 'Penyimpan Barang');
        $this->excel->getActiveSheet()->mergeCells('I32:K32');

        $this->excel->getActiveSheet()->setCellValue('I33', 'Dinas Kebersihan & Pertamanan');
        $this->excel->getActiveSheet()->mergeCells('I33:K33');

        $this->excel->getActiveSheet()->setCellValue('I34', 'Kota Surabaya');
        $this->excel->getActiveSheet()->mergeCells('I34:K34');
        $this->excel->getActiveSheet()->getStyle('I32:K34')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('A10', '1');
        $this->excel->getActiveSheet()->setCellValue('B10', '2');
        $this->excel->getActiveSheet()->setCellValue('C10', '3');
        $this->excel->getActiveSheet()->setCellValue('D10', '4');
        $this->excel->getActiveSheet()->setCellValue('E10', '5');
        $this->excel->getActiveSheet()->setCellValue('F10', '6');
        $this->excel->getActiveSheet()->setCellValue('G10', '7');
        $this->excel->getActiveSheet()->setCellValue('H10', '8');
        $this->excel->getActiveSheet()->setCellValue('I10', '9');
        $this->excel->getActiveSheet()->setCellValue('J10', '10');
        $this->excel->getActiveSheet()->setCellValue('K10', '11');
        $this->excel->getActiveSheet()->getStyle('A10:K10')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A10:K10')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A10:K10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



        $this->excel->getActiveSheet()->getStyle('A3')->getFill()->getStartColor()->setARGB('#000');

        $bar = 11;
        foreach ($data['list'] as $row) { 
            $this->excel->getActiveSheet()->setCellValue('A'.$bar, $row->tgl_spk); 
            $this->excel->getActiveSheet()->setCellValue('B'.$bar, $row->tgl_spk);
            $this->excel->getActiveSheet()->setCellValue('C'.$bar, $row->uraian_pekerjaan);
            $this->excel->getActiveSheet()->setCellValue('D'.$bar, $row->tgl_spk);
            $this->excel->getActiveSheet()->setCellValue('E'.$bar, $row->tgl_spk);
            $this->excel->getActiveSheet()->setCellValue('F'.$bar, $row->tgl_spk);
            //$this->excel->getActiveSheet()->mergeCells('B'.$bar.':D'.$bar);
            $this->excel->getActiveSheet()->setCellValue('G'.$bar, $row->harga_satuan);
            $this->excel->getActiveSheet()->setCellValue('H'.$bar, $row->tgl_spk);
            $this->excel->getActiveSheet()->setCellValue('I'.$bar, $row->tgl_spk);
            $this->excel->getActiveSheet()->setCellValue('J'.$bar, $row->tgl_spk);
            $this->excel->getActiveSheet()->setCellValue('K'.$bar, $row->tgl_spk);


            $bar++;
        }

       
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


    public function excelLapBul(){
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->load->model('M_report');
        $data['list'] =$this->M_report->getexcelLapBulPengadaan();
        $data1['list'] =$this->M_report->getexcelLapBulMasuk();
        $data2['list'] =$this->M_report->getexcelLapBulPenyaluran();
        $data3['list'] =$this->M_report->getexcelLapBulKeluar();


        $this->excel->getActiveSheet()->setTitle('Laporan Bulanan');
        $this->excel->getActiveSheet()->setCellValue('A3', 'LAPORAN PEMASUKAN DAN PENGELUARAN BARANG PENERANGAN JALAN UMUM (PJU)');
        $this->excel->getActiveSheet()->setCellValue('A4', 'MULAI TANGGAL 01 - JANUARI s/d 31 - JANUARI - 2015');
        $this->excel->getActiveSheet()->setCellValue('A5', 'DINAS KEBERSIHAN DAN PERTAMANAN KOTA SURABAYA');
        $this->excel->getActiveSheet()->mergeCells('A3:I3');
        $this->excel->getActiveSheet()->mergeCells('A4:I4');
        $this->excel->getActiveSheet()->mergeCells('A5:I5');
        $this->excel->getActiveSheet()->getStyle('A3:A5')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A3:A5')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A3:A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



        $this->excel->getActiveSheet()->setCellValue('A7', 'NO.');
        $this->excel->getActiveSheet()->mergeCells('A7:A9');
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->setCellValue('B7', 'NAMA BARANG');
        $this->excel->getActiveSheet()->mergeCells('B7:B9');
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A7:I9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A7:I9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);


        $this->excel->getActiveSheet()->setCellValue('C7', 'SATUAN');
        $this->excel->getActiveSheet()->mergeCells('C7:C9');
        $this->excel->getActiveSheet()->getStyle('C7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('C7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('C7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


        $this->excel->getActiveSheet()->setCellValue('D7', 'SISA BULAN DESEMBER TAHUN 2008');
        $this->excel->getActiveSheet()->mergeCells('D7:D9');
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('D7:D9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);



        $this->excel->getActiveSheet()->setCellValue('E7', 'PEMASUKAN BULAN JANUARI TAHUN 2015');
        $this->excel->getActiveSheet()->mergeCells('E7:E9');
        $this->excel->getActiveSheet()->getStyle('E7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('E7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('E7:E9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);


        $this->excel->getActiveSheet()->setCellValue('F7', 'JUMLAH');
        $this->excel->getActiveSheet()->mergeCells('F7:F9');
        $this->excel->getActiveSheet()->getStyle('F7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('F7')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->setCellValue('G7', 'PENGELUARAN BULAN JANUARI TAHUN 2015');
        $this->excel->getActiveSheet()->mergeCells('G7:G9');
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('G7:G9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

        $this->excel->getActiveSheet()->setCellValue('H7', 'SISA BULAN JANUARI TAHUN 2015');
        $this->excel->getActiveSheet()->mergeCells('H7:H9');
        $this->excel->getActiveSheet()->getStyle('H7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H7:H9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(false);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

        $this->excel->getActiveSheet()->setCellValue('I7', 'KET.');
        $this->excel->getActiveSheet()->mergeCells('I7:I9');
        $this->excel->getActiveSheet()->getStyle('I7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('I7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('I7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('I7:I9')->getAlignment()->setWrapText(true);


        $this->excel->getActiveSheet()->setCellValue('A10', '1');
        $this->excel->getActiveSheet()->setCellValue('B10', '2');
        $this->excel->getActiveSheet()->setCellValue('C10', '3');
        $this->excel->getActiveSheet()->setCellValue('D10', '4');
        $this->excel->getActiveSheet()->setCellValue('E10', '5');
        $this->excel->getActiveSheet()->setCellValue('F10', '6');
        $this->excel->getActiveSheet()->setCellValue('G10', '7');
        $this->excel->getActiveSheet()->setCellValue('H10', '8');
        $this->excel->getActiveSheet()->setCellValue('I10', '9');
        $this->excel->getActiveSheet()->getStyle('A10:I10')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A10:I10')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A10:I10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
        $this->excel->getActiveSheet()->getStyle('A7:I210')->applyFromArray($style);


         $bar = 11;
         $row_num = 1;
        foreach ($data['list'] as $row) { 
            $this->excel->getActiveSheet()->setCellValue('A'.$bar, $row_num); 
            $this->excel->getActiveSheet()->setCellValue('B'.$bar, $row->nama_jenis);
            $this->excel->getActiveSheet()->setCellValue('D'.$bar, $row->satuan); 
            $this->excel->getActiveSheet()->setCellValue('C'.$bar, $row->jumlah_barang);
            $this->excel->getActiveSheet()->setCellValue('E'.$bar, $row->jumlah_pengadaan);

            $bar++;
        }

         $bar = 11;
        foreach ($data1['list'] as $row) { 
            //$this->excel->getActiveSheet()->setCellValue('A'.$bar, $row_num); 
            $this->excel->getActiveSheet()->setCellValue('F'.$bar, $row->hasil_pengadaan);

            $bar++;
        }

        $bar = 11;
        foreach ($data2['list'] as $row) { 
            $this->excel->getActiveSheet()->setCellValue('G'.$bar, $row->jumlah_penyaluran);

            $bar++;
        }

         $bar = 11;
        foreach ($data3['list'] as $row) { 
            $this->excel->getActiveSheet()->setCellValue('H'.$bar, $row->hasil_penyaluran);
            $this->excel->getActiveSheet()->setCellValue('I'.$bar, $row->hasil_penyaluran);

            $bar++;
        }


        $filename='Laporan Bulanan.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');   
    }


    public function excelStok(){
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->load->model('M_report');
        $data['list'] =$this->M_report->getexcelStokAwal();

        $data1['list'] =$this->M_report->getexcelStokMasuk();
        $data2['list'] =$this->M_report->getexcelStokKeluar();

        $this->excel->getActiveSheet()->setTitle('Stok Opname');
        $this->excel->getActiveSheet()->setCellValue('A3', 'SALDO PERSEDIAAN BARANG PAKAI HABIS (ALAT TULIS KANTOR)');
        $this->excel->getActiveSheet()->setCellValue('A4', 'TAHUN ANGGARAN 2014');
        $this->excel->getActiveSheet()->mergeCells('A3:S3');
        $this->excel->getActiveSheet()->mergeCells('A4:S4');
        $this->excel->getActiveSheet()->getStyle('A3:A4')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A3:A4')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A3:A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('A6', 'NO.');
        $this->excel->getActiveSheet()->mergeCells('A6:A9');
        $this->excel->getActiveSheet()->getStyle('A6')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A6')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->setCellValue('B6', 'Nama Barang');
        $this->excel->getActiveSheet()->mergeCells('B6:B9');
        $this->excel->getActiveSheet()->getStyle('B6')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('B6')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A6:I9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A6:I9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);        

        $this->excel->getActiveSheet()->setCellValue('C6', 'Satuan');
        $this->excel->getActiveSheet()->mergeCells('C6:C9');
        $this->excel->getActiveSheet()->getStyle('C6')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('C6')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('C6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('D6', 'Saldo Awal');
        $this->excel->getActiveSheet()->mergeCells('D6:F6');
        $this->excel->getActiveSheet()->getStyle('D6')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('D6')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
        //$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(35);


        $this->excel->getActiveSheet()->getStyle('D6:F8')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('D6:F8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('D6:F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('D7', 'Per 1 Januari 2014 (Rp)');
        $this->excel->getActiveSheet()->mergeCells('D7:F7');
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('D8', 'Jumlah Barang');
        $this->excel->getActiveSheet()->mergeCells('D8:D9');
        $this->excel->getActiveSheet()->getStyle('D8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('D8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('E8', 'Harga Satuan');
        $this->excel->getActiveSheet()->mergeCells('E8:E9');
        $this->excel->getActiveSheet()->getStyle('E8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('E8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('F8', 'Jumlah Total');
        $this->excel->getActiveSheet()->mergeCells('F8:F9');
        $this->excel->getActiveSheet()->getStyle('F8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('F8')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->setCellValue('G6', 'Transaksi Tahun 2014');
        $this->excel->getActiveSheet()->mergeCells('G6:N6');
        $this->excel->getActiveSheet()->getStyle('G6')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('G6')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
        //$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(35);

        $this->excel->getActiveSheet()->getStyle('G6:N9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('G6:N9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('G6:N9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('G7', 'Penambahan (Rp)');
        $this->excel->getActiveSheet()->mergeCells('G7:I7');
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('G8', 'Jumlah Barang');
        $this->excel->getActiveSheet()->mergeCells('G8:G9');
        $this->excel->getActiveSheet()->getStyle('G8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('G8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('H8', 'Harga Satuan');
        $this->excel->getActiveSheet()->mergeCells('H8:H9');
        $this->excel->getActiveSheet()->getStyle('H8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('H8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('I8', 'Jumlah Total');
        $this->excel->getActiveSheet()->mergeCells('I8:I9');
        $this->excel->getActiveSheet()->getStyle('I8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('I8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('J7', 'Pengurangan (Rp)');
        $this->excel->getActiveSheet()->mergeCells('J7:N7');
        $this->excel->getActiveSheet()->getStyle('J7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('J7')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('J8', 'Jumlah Barang');
        $this->excel->getActiveSheet()->mergeCells('J8:K8');
        $this->excel->getActiveSheet()->getStyle('J8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('J8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('J9', 'Saldo Awal');
        $this->excel->getActiveSheet()->getStyle('J9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('J9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('K9', 'Penambahan');
        $this->excel->getActiveSheet()->getStyle('K9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('K9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('L8', 'Harga Satuan');
        $this->excel->getActiveSheet()->mergeCells('L8:M8');
        $this->excel->getActiveSheet()->getStyle('L8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('L8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('L9', 'Saldo Awal');
        $this->excel->getActiveSheet()->getStyle('L9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('L9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('M9', 'Penambahan');
        $this->excel->getActiveSheet()->getStyle('M9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('M9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('N8', 'Jumlah Total');
        $this->excel->getActiveSheet()->mergeCells('N8:N9');
        $this->excel->getActiveSheet()->getStyle('N8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('N8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('O6', 'Saldo Akhir');
        $this->excel->getActiveSheet()->mergeCells('O6:S6');
        $this->excel->getActiveSheet()->getStyle('O6')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('O6')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(false);
        //$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(35);


        $this->excel->getActiveSheet()->getStyle('O6:S9')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('O6:S9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('O6:S9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('O7', 'Per 31 Desember 2014 (Rp)');
        $this->excel->getActiveSheet()->mergeCells('O7:S7');
        $this->excel->getActiveSheet()->getStyle('O7')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('O7')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('O8', 'Jumlah Barang');
        $this->excel->getActiveSheet()->mergeCells('O8:P8');
        $this->excel->getActiveSheet()->getStyle('O8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('O8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('O9', 'Saldo Awal');
        $this->excel->getActiveSheet()->getStyle('O9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('O9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('P9', 'Penambahan');
        $this->excel->getActiveSheet()->getStyle('P9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('P9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('Q8', 'Harga Satuan');
        $this->excel->getActiveSheet()->mergeCells('Q8:R8');
        $this->excel->getActiveSheet()->getStyle('Q8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('Q8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('Q9', 'Saldo Awal');
        $this->excel->getActiveSheet()->getStyle('Q9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('Q9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('R9', 'Penambahan');
        $this->excel->getActiveSheet()->getStyle('R9')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('R9')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('S8', 'Jumlah Total');
        $this->excel->getActiveSheet()->mergeCells('S8:S9');
        $this->excel->getActiveSheet()->getStyle('S8')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('S8')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->setCellValue('A10', '1');
        $this->excel->getActiveSheet()->setCellValue('B10', '2');
        $this->excel->getActiveSheet()->setCellValue('C10', '3');
        $this->excel->getActiveSheet()->setCellValue('D10', '4');
        $this->excel->getActiveSheet()->setCellValue('E10', '5');
        $this->excel->getActiveSheet()->setCellValue('F10', '6');
        $this->excel->getActiveSheet()->setCellValue('G10', '7');
        $this->excel->getActiveSheet()->setCellValue('H10', '8');
        $this->excel->getActiveSheet()->setCellValue('I10', '9');
        $this->excel->getActiveSheet()->setCellValue('J10', '10');
        $this->excel->getActiveSheet()->setCellValue('K10', '11');
        $this->excel->getActiveSheet()->setCellValue('L10', '12');
        $this->excel->getActiveSheet()->setCellValue('M10', '13');
        $this->excel->getActiveSheet()->setCellValue('N10', '14');
        $this->excel->getActiveSheet()->setCellValue('O10', '15');
        $this->excel->getActiveSheet()->setCellValue('P10', '16');
        $this->excel->getActiveSheet()->setCellValue('Q10', '17');
        $this->excel->getActiveSheet()->setCellValue('R10', '18');
        $this->excel->getActiveSheet()->setCellValue('S10', '19');
        $this->excel->getActiveSheet()->getStyle('A10:S10')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A10:S10')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A10:S10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


         $bar = 11;
         $row_num = 1;
        foreach ($data['list'] as $row) { 
            $this->excel->getActiveSheet()->setCellValue('A'.$bar, $row_num); 
            $this->excel->getActiveSheet()->setCellValue('B'.$bar, $row->nama_jenis);
            $this->excel->getActiveSheet()->setCellValue('C'.$bar, $row->satuan); 
            $this->excel->getActiveSheet()->setCellValue('D'.$bar, $row->jumlah_barang);
            $this->excel->getActiveSheet()->setCellValue('E'.$bar, $row->harga_satuan);
            $this->excel->getActiveSheet()->setCellValue('F'.$bar, $row->harga_total);
            $this->excel->getActiveSheet()->setCellValue('J'.$bar, $row->jumlah_barang);
            $this->excel->getActiveSheet()->setCellValue('K'.$bar, $row->harga_satuan);
            $this->excel->getActiveSheet()->setCellValue('L'.$bar, $row->harga_total);
            $this->excel->getActiveSheet()->setCellValue('O'.$bar, $row->jumlah_barang);
            $this->excel->getActiveSheet()->setCellValue('P'.$bar, $row->harga_satuan);
            $this->excel->getActiveSheet()->setCellValue('Q'.$bar, $row->harga_total);
            $this->excel->getActiveSheet()->setCellValue('R'.$bar, $row->harga_satuan);
            $this->excel->getActiveSheet()->setCellValue('S'.$bar, $row->harga_total);;


            $bar++;
        }

        $bar = 11;
        foreach ($data1['list'] as $row) { 
            $this->excel->getActiveSheet()->setCellValue('G'.$bar, $row->hasil_setahun);
            $this->excel->getActiveSheet()->setCellValue('H'.$bar, $row->harga_satuan);
            $this->excel->getActiveSheet()->setCellValue('I'.$bar, '=H'.$bar.'*G'.$bar);

            $this->excel->getActiveSheet()->setCellValue('N'.$bar,'=H'.$bar.'*G'.$bar); 
            $this->excel->getActiveSheet()->setCellValue('M'.$bar, $row->harga_satuan);

            $bar++;
        } 

        $bar = 11;
        foreach ($data2['list'] as $row) { 

            $this->excel->getActiveSheet()->setCellValue('K'.$bar, $row->hasil_stahun);

            $bar++;
        } 


        $style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
        $this->excel->getActiveSheet()->getStyle('A6:S100')->applyFromArray($style);

        $filename='Stok Opname.xls'; //save our workbook as this file name

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