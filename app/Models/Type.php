<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';

    protected $primaryKey = 'type_id';

    protected $keyType = 'int';

    protected $fillable = [
        'form_id',
        'type_id',
        // 'type_code',
        'type_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
