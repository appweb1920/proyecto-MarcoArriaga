<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    protected $table = "marcas";
    protected $fillable =  ['nombre'];
}
