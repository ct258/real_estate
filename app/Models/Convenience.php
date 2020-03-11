<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenience extends Model
{
    protected $table = 'convenience';

    protected $primaryKey = 'convenience_id';

    protected $keyType = 'int';

    protected $fillable = [
        'direction_id',
        'convenience_id',
        'convenience_facade',
        'convenience_way',
        'convenience_floor',
        'convenience_bedroom',
        'convenience_bathroom',
        'convenience_air_conditioning',
        'convenience_BBQ_area',
        'convenience_CCTV',
        'convenience_concierge',
        'convenience_fitness',
        'convenience_garden',
        'convenience_library',
        'convenience_mountain_view',
        'convenience_parking',
        'convenience_playground',
        'convenience_ocean_view',
        'convenience_security',
        'convenience_swimming_pool',
        'convenience_tennis',
        'convenience_wifi',
        'convenience_tivi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}