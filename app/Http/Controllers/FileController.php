<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use PDF;

class FileController extends Controller
{
    public function upload(Request $request){
    	$file = $request->file('attachment');
    	$user_id = Auth::user()->id;
    	return Storage::put('tmp/'.$user_id, $file);
    }

    public function dummyPDF(){

		// Content
		$html = 'Write something here';

		// Custom Header
		PDF::setHeaderCallback(function($pdf) {

		        // Set font
		        $pdf->SetFont('times', 'B', 15);
		        // Title
		        $pdf->SetY(18);
		        $pdf->Cell(0, 16, "RUKUN TETANGGA 04 RUKUN WARGA 06", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		        $pdf->Cell(0, 16, "KELURAHAN CIKUTRA KECAMATAN CIBEUNYING KIDUL", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		        $pdf->Cell(0, 16, "KOTA BANDUNG", 0, true, 'C', 0, '', 0, false, 'M', 'M');
				$style = array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
				$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

				$pdf->Line($pdf->getX(), $pdf->getY(), $pdf->getX()+160, $pdf->getY(), $style);
				$pdf->Line($pdf->getX(), $pdf->getY()+1, $pdf->getX()+160, $pdf->getY()+1, $style2);

		});

		PDF::SetAuthor('System');
		PDF::SetTitle('My Report');
		PDF::SetSubject('Report of System');
		PDF::SetMargins(25, 18, 25);
		PDF::SetFontSubsetting(false);
		PDF::SetFontSize('10px');   
		PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);     
		PDF::AddPage('P', 'A4');

		$txt = 'Yang bertanda tangan di bawah ini, Ketua RT dan Ketua RW Kelurahan Cikutra Kecamatan Cibeunying Kidul dengan ini menerangkan bahwa seorang penduduk :';

		PDF::setY( PDF::getY()+34 );
		PDF::SetFont('times', 'B', 14);
		PDF::Cell(0, 18, "SURAT PENGANTAR", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		$style = array('width' => 0.7, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
		PDF::Line(PDF::getX()+55, PDF::getY()-5, PDF::getX()+105, PDF::getY()-5, $style);
		PDF::SetFont('times', '', 12);
		PDF::Cell(0, 18, "No. ... /Set RT/.../ 20 .....", 0, true, 'C', 0, '', 0, false, 'M', 'M');

		PDF::setCellHeightRatio(1.5);
		PDF::MultiCell(0, 5, $txt, 0, '', 0, 2, '', '', true);	
		PDF::Ln(10);

		PDF::Cell(50, 17, "Nama", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'nama', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Noppen", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'nik', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Jenis Kelamin", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'jenis_kelamin', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Tempat/Tgl.Lahir (umur)", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'lahir', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Kewarganegaraan", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'kewarganegaraan', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Status Perkawinan", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'perkawinan', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Pekerjaan", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'pekerjaan', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Agama", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'agama', 0, true, '', 0, '', 0, false, 'M', 'M');

		$des = 'alamat';
		PDF::Cell(50, 17, "Alamat", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(3.5, 15, ":  ", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::setCellHeightRatio(1.2);
		PDF::setY( PDF::getY()-2, false );
		PDF::MultiCell(0, 5, $des, 0, '', 0, 2, '', '', true);	
		PDF::setY( PDF::getY()+10 );

		PDF::Cell(50, 17, "SKP. Tgl / Nomor", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  -", 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "KK. Tgl / Nomor", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  -", 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Ln(2);

		PDF::Cell(50, 17, "Pengantar ini diperlukan untuk membuat : ", 0, true, '', 0, '', 0, false, 'M', 'M');
		PDF::setY( PDF::getY()-4 );
		PDF::MultiCell(0, 5, 'keperluan', 0, '', 0, 2, '', '', true);	

		PDF::Ln(10);

		PDF::Cell(0, 15, "Demikian Surat Pengantar ini kami buat, untuk mendapatkan pelayanan sebagaimana mestinya.", 0, true, '', 0, '', 0, false, 'M', 'M');

		// PDF::setX( PDF::getX() + 110 );
		// PDF::Cell(0, 10, "Bandung, 27 Mei 2019", 0, true, 'C', 0, '', 0, false, 'M', 'M');

		// PDF::setX( PDF::getX() + 110 );


		PDF::lastPage();
		ob_end_clean();
		PDF::Output('my_file.pdf', 'I');      	
    }
    
}
