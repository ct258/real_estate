<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposit';
	protected $primaryKey = 'd_id';
    public $timestamps = false;
    protected $fillable = [
		'd_amount',
		'd_time',
		'd_per',
		'staff_id'
	];
}
