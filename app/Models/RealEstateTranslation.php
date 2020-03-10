<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealEstateTranslation extends Model
{
    protected $table = 'real_estate_translation';

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

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
