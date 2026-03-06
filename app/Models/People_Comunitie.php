<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People_Comunitie extends Model
{
    protected $table = 'people_comunitie';
    protected $fillable = [
        'peopleId',
        'comunityId'
    ];
}
