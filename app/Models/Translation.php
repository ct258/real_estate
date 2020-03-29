<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translation';

    protected $primaryKey = 'translation_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'translation_id',
        'translation_name',
        'translation_address',
        'translation_description',
        'translation_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}
