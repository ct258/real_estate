<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageRealEstate extends Model
{
    protected $table = 'image_real_estate';

    protected $primaryKey = 'image_real_estate_id';

    protected $keyType = 'int';

    protected $fillable = [
        'image_real_estate_id',
        'image_id',
        'real_estate_id',
        'image_real_estate_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
