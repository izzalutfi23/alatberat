<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use DateTime;

class Transaksicontroller extends Controller
{
    public function store(Request $request){
        // Mencari jumlah hari sewa
        $fdate = $request->start_date;
        $tdate = $request->end_date;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $totalsewa = $days*$request->hargasewaalat;
        // Insert ke tabel transaksi
        $transaksi = Transaksi::create([
            'user_id' => Auth()->user()->id,
            'alatberat_id' => $request->alatberat_id,
            'status' => 'pending',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total' => $totalsewa
        ]);
        if($transaksi){
            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi berhasil ditambahkan',
                'data' => $transaksi
            ]);
        }
        else{
            return response()->json([
                'status' => 'gagal',
                'message' => 'Data transaksi gagal ditambahkan'
            ]);
        }
    }
}
