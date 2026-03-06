<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People_Council extends Model
{
   protected $table = 'people_council';
   protected $fillable = [
    'peopleId',
    'councilId'
   ];
}
