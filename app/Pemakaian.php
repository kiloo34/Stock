<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $table = 'pemakaian';

    protected $fillable = [
        'material_id',
        'tanggal',
        'jumlah'
    ];

    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
