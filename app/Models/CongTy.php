<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CongTy extends Model
{
    
        protected $table = 'congty';
    
        protected $primaryKey = 'ct_id';
    
        protected $keyType = 'int';
    
        protected $fillable = [
            'ct_id',
            'ct_ten',
            'ct_diachi',
            'ct_email',
            'ct_fax',
            'ct_sdt',
            'created_at',
            'updated_at',
            'deleted_at',
            
        ];
        public $timestamps = true;
        protected $dates = ['deleted_at'];
    
}
