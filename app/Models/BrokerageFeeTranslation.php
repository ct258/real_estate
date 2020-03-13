<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerageFeeTranslation extends Model
{
    protected $table = 'brokerage_fee_translation';

    protected $primaryKey = 'bft_id';

    protected $keyType = 'int';

    protected $fillable = [
        'staff_id',
        'bft_id',
        'bft_name',
        'bft_content',
        'bft_locale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
