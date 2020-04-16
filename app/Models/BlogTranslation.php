<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $table = 'blog_translation';

    protected $primaryKey = 'blog_translation_id';

    protected $keyType = 'int';

    protected $fillable = [
        'blog_id',
        'blog_translation_id',
        'blog_translation_title',
        'blog_translation_content',
        'blog_translation_intro',
        'blog_translation_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
}
