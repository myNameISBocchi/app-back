<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Person extends Model
{
    protected $table = 'peoples';
    protected $fillable = [
        'firstName',
        'lastName',
        'identification',
        'phone',
        'date',
        'photoPerson',
        'cityId',
        'email',
        'password',
        'status'
    ];
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}