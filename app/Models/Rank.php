<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'rank';

    protected $primaryKey = 'rank_id';

    protected $keyType = 'int';

    protected $fillable = [
        'rank_id',
        'rank_level',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
