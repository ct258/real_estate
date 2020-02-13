<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'route';

    protected $primaryKey = 'route_id';

    protected $keyType = 'int';

    protected $fillable = [
        'route_id',
        'route_link',
        'route_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
