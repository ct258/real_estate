<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class TaiKhoan extends Authenticatable implements JWTSubject
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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
