<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitTranslation extends Model
{
    protected $table = 'unit_translation';

    protected $primaryKey = 'unit_translation_id';

    protected $keyType = 'int';

    protected $fillable = [
        'unit_id',
        'unit_translation_id',
        'unit_translation_name',
        'unit_translation_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
