<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemerintah extends Model
{
    protected $table = 'pemerintah';

    protected $fillable = ['nama','jabatan','file_gambar'];
}
