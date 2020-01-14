<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChuDauTu extends Model
{
    protected $table = 'chudautu';

    protected $primaryKey = 'cdt_id';

    protected $keyType = 'int';

    protected $fillable = [
        'cdt_id',
        'cdt_ten',
        'cdt_diachi',
        'cdt_email',
        'cdt_sdt',
        'cdt_tongthauECP',
        
        
    ];
    public $timestamps = true;
}
