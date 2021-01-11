<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';

    protected $fillable = [
        'kode',
        'nama',
        'jumlah'
    ];

    public function pemakaian()
    {
        return $this->hasMany('App\Pemakaian');
    }
}
