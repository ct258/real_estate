<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CookieUser extends Model
{
    protected $table = 'cookie_user';

    protected $primaryKey = 'cookie_user_id';

    protected $keyType = 'int';

    protected $fillable = [
        'cookie_user_id',
        // 'cookie_user_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
}
