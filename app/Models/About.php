<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';

    protected $primaryKey = 'about_id';

    protected $keyType = 'int';

    protected $fillable = [
        'staff_id',
        'about_id',
        'about_description',
        'about_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
