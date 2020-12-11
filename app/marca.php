<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class marca extends Model
{
    use SoftDeletes;
    protected $table = "marcas";
    protected $fillable =  ['nombre'];
}
