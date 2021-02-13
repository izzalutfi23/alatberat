<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['user_id', 'alatberat_id', 'status', 'start_date', 'end_date', 'total'];
}
