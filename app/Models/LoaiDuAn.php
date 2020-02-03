<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiDuAn extends Model
{
    protected $table = 'loaiduan';

    protected $primaryKey = 'loaida_id';

    protected $keyType = 'int';

    protected $fillable = [
            'loaida_id',
            'loaida_ten',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
