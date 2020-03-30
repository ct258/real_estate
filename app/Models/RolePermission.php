<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permission';

    protected $primaryKey = 'role_permission_id';

    protected $keyType = 'int';

    protected $fillable = [
        'role_id',
        'permission_id',
        'role_permission_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

}
