<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Authenticatable
{
    use Notifiable;
    protected $table = 'taikhoan';

    protected $primaryKey = 'tk_id';

    protected $keyType = 'int';

    protected $fillable = [
        'tk_id',
        'username',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
