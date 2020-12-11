<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productos extends Model
{
    use SoftDeletes;
    protected $table = "productos";
    protected $fillable =  ['nombre', 'id_marca', 'costo', 'precio', 'cantidad'];
}
