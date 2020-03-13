<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeUsed extends Model
{
    protected $table = 'code_used';

    protected $primaryKey = 'code_used_id';

    protected $keyType = 'int';

    protected $fillable = [
        'code_used_id',
        'code_id',
        'code_used_id',
        'code_used_count',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
