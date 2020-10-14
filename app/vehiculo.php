<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class vehiculo extends Model
{
    use SoftDeletes;

    protected $fillable = ['placa','marca','modelo'];
    protected $dates = ['deleted_at'];
}
