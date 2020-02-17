<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form';

    protected $primaryKey = 'form_id';

    protected $keyType = 'int';

    protected $fillable = [
        'unit_id',
        'form_id',
        'form_code',
        'form_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
