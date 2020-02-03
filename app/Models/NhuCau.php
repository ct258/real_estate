<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhuCau extends Model
{
    protected $table = 'nhucau';

    protected $primaryKey = 'nhucau_id';

    protected $keyType = 'int';

    protected $fillable = [
        'nhucau_id',
        'nhucau_ten',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
