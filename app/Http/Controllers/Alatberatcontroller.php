<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alatberat;

class Alatberatcontroller extends Controller
{
    public function getalatberat(){
        $alat = Alatberat::with(['kategori'=>function($q){
            $q->select('id', 'nama');
        }])->get();
        if($alat){
            return response()->json([
                'status' => 'success',
                'data' => $alat
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'gagal',
                'message' => 'Data alat berat tidak ditemukan'
            ], 404);
        }
    }
}
