<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerageFeeTranslation extends Model
{
    protected $table = 'brokerage_fee_translation';

    protected $primaryKey = 'bft_id';

    protected $keyType = 'int';

    protected $fillable = [
        'bft_id',
        'bft_name',
        'bft_note',
        'bft_locale',
    ];

    public $timestamps = false;
}
