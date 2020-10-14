<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class conductor extends Model
{
    use SoftDeletes;

    protected $fillable = ['numID','nombre','estado','placa_veh'];
    protected $dates = ['deleted_at'];
}
