<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    public $primaryKey = 'id_pesan';
    public $timestamps = false;

    public function menu()
    {
    	return $this->hasOne('App\Menu','kode_menu','kode_menu');
    }

    public function pembeli()
    {
    	return $this->belongsTo('App\Pembeli','kode_pembeli','kode_pembeli');
    }
}
