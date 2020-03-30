<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    protected $primaryKey = 'unit_id';

    protected $keyType = 'int';

    protected $fillable = [
        'unit_id',
        'unit_value',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}
