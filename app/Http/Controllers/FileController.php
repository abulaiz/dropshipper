<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\Transaction\Sending;
use Auth;
use PDF;

class FileController extends Controller
{

    public function upload(Request $request){
    	$file = $request->file('attachment');
    	$user_id = Auth::user()->id;
    	return Storage::put('tmp/'.$user_id, $file);
    }

    public function sendingAttachment($id, $filename){
    	$data = Sending::find($id);
    	$path = 'attachment/'.$data->user_id.'/'.$id.'/'.$filename;
    	$file = Storage::get($path); 
    	return response($file, 200)->header('Content-Type', 'image/jpeg');
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
		        $pdf->Image(0, 16, 'img/bl.png', 0, true, 'C', 0, '', 0, false, 'M', 'M');
		        $pdf->Cell(0, 16, "STOCKISTMOC", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		        $pdf->Cell(0, 16, "DROPSHIPPER APPLICATION", 0, true, 'C', 0, '', 0, false, 'M', 'M');
				$style = array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
				$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
				$pdf->Line($pdf->getX()+15, $pdf->getY(), $pdf->getX()+140, $pdf->getY(), $style);
				$pdf->Line($pdf->getX()+15, $pdf->getY()+1, $pdf->getX()+140, $pdf->getY()+1, $style2);

		});

		PDF::SetAuthor('System');
		PDF::SetTitle('Bukti Pembayaran');
		PDF::SetSubject('Report of System');
		PDF::SetMargins(25, 18, 25);
		PDF::SetFontSubsetting(false);
		PDF::SetFontSize('10px');   
		PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);     
		$width = PDF::pixelsToUnits(600); 
		$height = PDF::pixelsToUnits(600);
		$resolution= array($width, $height);
		PDF::AddPage('L', $resolution);


		PDF::setY( PDF::getY()+34 );
		PDF::SetFont('times', 'B', 14);
		PDF::Cell(0, 18, "BUKTI PEMESANAN", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		$style = array('width' => 0.7, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
		PDF::Line(PDF::getX()+55, PDF::getY()-5, PDF::getX()+105, PDF::getY()-5, $style);

		PDF::Ln(10);

		PDF::Line(PDF::getX()+40, PDF::getY()-5, PDF::getX()+120, PDF::getY()-5, $style);
		PDF::Cell(0, 18, "ORDER = Super Grow UP", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		PDF::Line(PDF::getX()+40, PDF::getY()-5, PDF::getX()+120, PDF::getY()-5, $style);

		PDF::Ln(10);

		PDF::Cell(50, 17, "No ", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'001', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Nama Penerima ", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'NAMA', 0, true, '', 0, '', 0, false, 'M', 'M');

		$des = 'ALAMAT';
		PDF::Cell(50, 17, "Alamat Penerima", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(3.5, 15, ":  ", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::setCellHeightRatio(1.2);
		PDF::setY( PDF::getY()-2, false );
		PDF::MultiCell(0, 5, $des, 0, '', 0, 2, '', '', true);	
		PDF::setY( PDF::getY()+10 );

		PDF::Cell(50, 17, "Nomer Penerima", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'089-XXX-XXX-XXX', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Cell(50, 17, "Nama Pengirim", 0, 0, '', 0, '', 0, false, 'M', 'M');
		PDF::Cell(0, 17, ":  ".'PENGIRIM', 0, true, '', 0, '', 0, false, 'M', 'M');

		PDF::Ln(10);

		PDF::Line(PDF::getX()+25, PDF::getY()-5, PDF::getX()+135, PDF::getY()-5, $style);
		PDF::Cell(0, 18, "TUJUAN KECAMATAN = KELAPA GADING", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		PDF::Line(PDF::getX()+25, PDF::getY()-5, PDF::getX()+135, PDF::getY()-5, $style);

		PDF::Ln(10);

		PDF::Line(PDF::getX()+55, PDF::getY()-5, PDF::getX()+105, PDF::getY()-5, $style);
		PDF::Cell(0, 18, "VIA SICEPAT", 0, true, 'C', 0, '', 0, false, 'M', 'M');
		PDF::Line(PDF::getX()+55, PDF::getY()-5, PDF::getX()+105, PDF::getY()-5, $style);
		// PDF::setX( PDF::getX() + 110 );
		// PDF::Cell(0, 10, "Bandung, 27 Mei 2019", 0, true, 'C', 0, '', 0, false, 'M', 'M');

		// PDF::setX( PDF::getX() + 110 );


		PDF::lastPage();
		ob_end_clean();
		PDF::Output('my_file.pdf');      	
    }
    
}
