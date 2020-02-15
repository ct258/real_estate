<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'house';

    protected $primaryKey = 'house_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'direction_id',
        'house_id',
        'house_facade',
        'house_way',
        'house_floor',
        'house_bedroom',
        'house_toilet',
        'house_furniture',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
