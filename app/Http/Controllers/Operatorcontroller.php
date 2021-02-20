<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;

class Operatorcontroller extends Controller
{
    public function getoperator(Request $request){
        $operator = Operator::where('kategori_id', $request->id)->get();
        if($operator){
            return response()->json($operator, 200);
        }
        else{
            return response()->json([
                'status' => 'gagal',
                'message' => 'Data operator berat tidak ditemukan'
            ], 404);
        }
    }
}
