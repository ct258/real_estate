<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTranslation extends Model
{
    protected $table = 'type_translation';

    protected $primaryKey = 'type_translation_id';

    protected $keyType = 'int';

    protected $fillable = [
        'type_id',
        'type_translation',
        'type_translation_name',
        'type_translation_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}
