<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $table = 'direction';

    protected $primaryKey = 'direction_id';

    protected $keyType = 'int';

    protected $fillable = [
        'direction_id',
        'direction_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
