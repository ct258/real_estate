<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';
    protected $primaryKey = 'b_id';
    protected $fillable = [
		'b_txnref',
		'b_orderInfo',
		'b_amount',
		'b_responseCode',
		'b_bankcode',
		'b_accountnumber',
		'b_membersince',
		'b_name'
	];
}
