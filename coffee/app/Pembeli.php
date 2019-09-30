<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'pembeli';

    public function ongkir()
    {
    	return $this->belongsTo('App\Ongkir','id_ongkir','id_ongkir');
    }
}
