<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    protected $table = 'about_translation';

    protected $primaryKey = 'about_translation_id';

    protected $keyType = 'int';

    protected $fillable = [
        'about_id',
        'about_translation_id',
        'about_translation_content',
        'about_translation_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}
