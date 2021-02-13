<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alatberat extends Model
{
    protected $table = 'alatberat';

    function kategori(){
        return $this->belongsTo('App\Models\Kategori', 'kategori_id', 'id');
    }
}
