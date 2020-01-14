<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaibds extends Model
{
    protected $table = 'loaibds';

    protected $primaryKey = 'loaibds_id';

    protected $keyType = 'int';

    protected $fillable = [
        'loaibds_id',
        'loaibds_ten',
       
    ];
    public $timestamps = true;
}