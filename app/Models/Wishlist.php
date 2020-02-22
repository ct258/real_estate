<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
        protected $table = '';

    protected $primaryKey = '';

    protected $keyType = 'int';

    protected $fillable = [
        
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
