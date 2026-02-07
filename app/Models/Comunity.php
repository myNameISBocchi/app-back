<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunity extends Model
{
    protected $fillable = [
        'comunityName',
        'googleMaps',
        'photoComunity',
    ];

    
}