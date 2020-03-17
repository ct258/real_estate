<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RankTranslation extends Model
{
    protected $table = 'rank_translation';

    protected $primaryKey = 'rank_translation_id';

    protected $keyType = 'int';

    protected $fillable = [
        'rank_id',
        'rank_translation_name',
        'rank_translation_description',
        'rank_translation_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
