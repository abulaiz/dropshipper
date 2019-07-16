<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product\Product;
use App\Model\Product\Mutation;
use Validator;
use Auth;
use PDF;

class ProductController extends Controller
{
    public function available(){
    	$data = Product::whereRaw('qty-booked > 0')->get();
    	return response()->json(['data' => $data]);
    }

    // input = product_id, qty
    public function checkAv(Request $req){
    	$data = Product::find($req->product_id);
    	$stok = $data->qty - $data->booked;
    	if($req->qty <= $stok){
    		// jika berhasil
    		$data->booked += $req->qty;
    		$data->save();
    		return response()->json(['success' => true]);
    	} else {
    		// Jika gagal
    		return response()->json(['success' => false, 'available' => $stok]);
    	}
    }

    public function stock(){
        $data = Product::all();
        $res = [];
        $last_update = "0000-00-00 00:00:00";
        foreach ($data as $item) {
            $last_update = $last_update > $item->updated_at ? $last_update : $item->updated_at; 
            $res[] = [
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'qty' => $item->qty,
                'in' => Mutation::where('product_id', $item->id)->where('status', '2')->sum('qty'),
                'out' => Mutation::where('product_id', $item->id)->where('status', '1')->sum('qty'),
            ];
        }

        return response()->json(['data' => $res, 'last_updated' => $last_update]);
    }

    public function add(Request $req){
        $rules = ['qty' => 'required|integer|min:1'];
        $v = Validator::make($req->all(), $rules);
        if($v->passes()){

            $p = Product::find($req->id);
            $p->qty += $req->qty;
            $p->save();
            Mutation::create([
                'user_id' => Auth::user()->id,
                'product_id' => $req->id,
                'qty' => $req->qty,
                'status' => '2',
                'description' => 'Ditambahkan oleh admin'
            ]);
            return response()->json(['success' => true]);

        } else {
            return response()->json(['success' => false]);            
        }
    }

    public function print_stock(){
        // // Custom Header
        // PDF::setHeaderCallback(function($pdf) {

        //         // Set font
        //         $pdf->SetFont('times', 'B', 15);
        //         // Title
        //         $pdf->SetY(18);
        //         $pdf->Cell(0, 16, "STOCKISTMOC", 0, true, 'C', 0, '', 0, false, 'M', 'M');
        //         $pdf->Cell(0, 16, "DROPSHIPPER APPLICATION", 0, true, 'C', 0, '', 0, false, 'M', 'M');
        //         $style = array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        //         $style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        //         $pdf->Line($pdf->getX()+15, $pdf->getY(), $pdf->getX()+170, $pdf->getY(), $style);
        //         $pdf->Line($pdf->getX()+15, $pdf->getY()+1, $pdf->getX()+170, $pdf->getY()+1, $style2);

        // });
        PDF::SetAuthor('System');
        PDF::SetTitle('Daftar Stok Produk');
        PDF::SetSubject('Report of System');
        PDF::SetMargins(25, 18, 25);
        PDF::SetFontSubsetting(false);
        PDF::SetFontSize('10px');   
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);     
        $width = PDF::pixelsToUnits(650); 
        $height = PDF::pixelsToUnits(650);
        $resolution= array($width, $height);
        PDF::AddPage('L', $resolution);
        // PDF::Ln(23);

        $data = Product::all();
        $res = [];
        $last_update = "0000-00-00 00:00:00";
        foreach ($data as $item) {
            $last_update = $last_update > $item->updated_at ? $last_update : $item->updated_at; 
            $res[] = (object)[
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'qty' => $item->qty,
                'in' => Mutation::where('product_id', $item->id)->where('status', '2')->sum('qty'),
                'out' => Mutation::where('product_id', $item->id)->where('status', '1')->sum('qty'),
            ];
        }
        $i=1;
        $html='<h1 style="text-align:center;">Daftar Produk</h1>
                <p>Tanggal = '.substr($last_update, 0, 10).'</p>
                <p>Waktu = '.substr($last_update, 11, 5).'</p>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="3">
                        <tr bgcolor="#ffffff" style="font-weight:bold;">
                            <th width="5%" align="center">No</th>
                            <th width="35%" align="center">Nama Produk</th>
                            <th width="20%" align="center">Masuk</th>
                            <th width="20%" align="center">Keluar</th>
                            <th width="20%" align="center">Sisa</th>
                        </tr>';
        foreach($res as $item){
            $html.='<tr bgcolor="#ffffff">
                        <td align="center">'.$i++.'</td>
                        <td>'.$item->name.'</td>
                        <td align="center">'.$item->in.' '.$item->type.'</td>
                        <td align="center">'.$item->out.' '.$item->type.'</td>
                        <td align="center">'.$item->qty.' '.$item->type.'</td>
                    </tr>';
        }
        $html.='</table>';

        PDF::writeHTML($html, true, false, true, false, '');
        PDF::lastPage();
        ob_end_clean(); 
        PDF::Output('Resi Pengiriman.pdf');               
    }    

}
