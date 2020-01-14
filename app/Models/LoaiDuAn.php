<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoaiDuAn extends Model
{
    
        protected $table = 'loaiduan';
    
        protected $primaryKey = 'loaida_id';
    
        protected $keyType = 'int';
    
        protected $fillable = [
            'loaida_id',
            'loaida_ten',
            
            
        ];
        public $timestamps = true;
    
}
