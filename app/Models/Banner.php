<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    protected $primaryKey = 'banner_id';

    protected $keyType = 'int';

    protected $fillable = [
        'banner_id',
        'banner_title',
        'banner_path',
        'banner_type',
        'banner_link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}
