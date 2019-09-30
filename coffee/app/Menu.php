<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $primaryKey = 'id_menu';
    public $timestamps = false;

}
