<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'icon', 'title', 'description',
    ];
    // public $table='services';
    // public $primaryKey='id';
    // public $incrementing=true;
    // public $keyType='int';
    // public $timestamps=false;
}
