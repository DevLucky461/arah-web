<?php

namespace App\Http\Controllers;

use App\Models\CoinHolder;
use Illuminate\Http\Request;
use PDF;
use App\Models\User;

class CertificateController extends Controller
{
    public function index($serial_number){
        $image = base64_encode(file_get_contents(public_path('/img/cert.png')));
        $buyer = CoinHolder::where("serial_number",$serial_number)->with('buyer')->with('buyer_info')->get();
        //dd($buyer);
        $pdf = PDF::loadView('certificate',compact('image','buyer'));
        $pdf->setOptions(['isJavascriptEnabled' => true])->setPaper('a4', 'landscape');
        //return view("certificate",compact('image','buyer'));
        return $pdf->download($serial_number.'.pdf');
    }

}
