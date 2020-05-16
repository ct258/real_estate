<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailDeposit extends Model
{
    protected $table = 'detail_deposit';
    protected $primaryKey = 'dd_id';
    protected $fillable = [
		'dd_code',
		'd_id',
		'real_estate_id',
		'b_id'
	];
}
