<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class Kategoricontroller extends Controller
{
    public function getkategori(){
        $kategori = Kategori::select('id', 'nama')->get();
        if($kategori){
            return response()->json([
                'status' => 'success',
                'data' => $kategori
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'gagal',
                'message' => 'Data kategori tidak ditemukan'
            ], 404);
        }
    }
}
