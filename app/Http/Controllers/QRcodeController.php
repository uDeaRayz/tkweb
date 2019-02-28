<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Qrcode;


class QRcodeController extends Controller
{
    public function gendata(){

        $date = date('Y-m-d');
        $value = DB::table('qrcode')->where('qr_date',$date)->first();
        if ($value == "") {
            $qrcode = rand(1,999999);
            $qr =  Qrcode::create([
                'qr_date' => $date,
                'qr_id' => $qrcode,
            ]);
        }
        else{
            $qrcode = $value->qr_id;
        }
        return view('qrcode', compact('qrcode'));
    }
}
