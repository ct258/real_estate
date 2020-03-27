<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Account extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'account';
    protected $guard = 'account';

    protected $primaryKey = 'account_id';

    protected $keyType = 'int';

    protected $fillable = [
        'role_id',
        'account_id',
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

    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function hasRole($role)
    {
        $roles = $this->roles()->where('role_name', $role)->count();

        if ($roles == 1) {
            return true;
        } else {
            return false;
        }
    }

    // public function customer()
    // {
    //     return $this->hasMany(Customer::class, 'account_id', 'account_id');
    // }

    public function customer()
    {
        return $this->hasOne(Customer::class,'account_id');
    }
    public function staff()
    {
        return $this->hasOne(Staff::class,'account_id');
    }
}
