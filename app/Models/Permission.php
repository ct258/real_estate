<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';

    protected $primaryKey = 'permission_id';

    protected $keyType = 'int';

    protected $fillable = [
        'permission_id',
        'permission_name',
        'permission_link',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}
