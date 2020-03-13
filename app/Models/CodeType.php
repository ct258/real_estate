<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeType extends Model
{
    protected $table = 'code_type';

    protected $primaryKey = 'code_type_id';

    protected $keyType = 'int';

    protected $fillable = [
        'code_type_id',
        'code_type_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
