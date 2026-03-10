<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class people_committee extends Model
{
    protected $table = 'peoples_committee';
    protected $fillable = [
        'peopleId',
        'committeeId'
    ];
}
