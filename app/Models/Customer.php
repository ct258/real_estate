<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $primaryKey = 'customer_id';

    protected $keyType = 'int';

    protected $fillable = [
        'rank_id',
        'accout_id',
        'ward_id',
        'customer_id',
        'customer_name',
        'customer_avatar',
        'customer_email',
        'customer_tel',
        'customer_birth',
        'customer_gender',
        'customer_address',
        'customer_identity_card',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function accounts()
    {
        return $this->belongsTo('App\Models\Account', 'account_id');
    }
}
