<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['user_id', 'alatberat_id', 'operator_id', 'status', 'start_date', 'end_date', 'total', 
    'nama_penyewa', 'alamat_proyek'];
    protected $primaryKey = 'id';

    function alat(){
        return $this->belongsTo('App\Models\Alatberat', 'alatberat_id', 'id');
    }

    function operator(){
        return $this->belongsTo('App\Models\Operator', 'operator_id', 'id');
    }
}
