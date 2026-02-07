<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePrivilege extends Model
{
    protected $table = 'roles_privileges';
    protected $fillable = [
        'roleId',
        'privilegeId'
    ];

    
}
