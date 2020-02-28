<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $primaryKey = 'role_id';

    protected $keyType = 'int';

    protected $fillable = [
        'role_id',
        'role_level',
        'role_name',
        'role_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('App\Models\Account', 'role_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsTo(Permission::class, 'role_id');
    }
}
