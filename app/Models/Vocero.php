<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocero extends Model
{
    protected $fillable = [
        'userId',
        'firstName',
        'lastName',
        'identification',
        'phone',
        'status',
        'comunityId',
        'councilId',
        'unitId',
        'committeeId'
    ];
}
