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
    ];

    public $timestamps = false;
}
