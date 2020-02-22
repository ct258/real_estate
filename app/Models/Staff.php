<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $primaryKey = 'staff_id';

    protected $keyType = 'int';

    protected $fillable = [
        'account_id',
        'staff_id',
        'staff_code',
        'staff_name',
        'staff_birth',
        'staff_gender',
        'staff_tel',
        'staff_email',
        'staff_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
