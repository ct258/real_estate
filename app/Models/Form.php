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
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}
