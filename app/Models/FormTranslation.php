<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormTranslation extends Model
{
    protected $table = 'form_translation';

    protected $primaryKey = 'form_translation_id';

    protected $keyType = 'int';

    protected $fillable = [
        'form_id',
        'form_translation_id',
        'form_translation_name',
        'form_translation_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
