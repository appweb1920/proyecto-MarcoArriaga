<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table = "productos";
    protected $fillable =  ['nombre', 'id_marca', 'costo', 'precio', 'cantidad'];
}
