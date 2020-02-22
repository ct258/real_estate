<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    protected $table = 'mail_template';

    protected $primaryKey = 'mail_template_id';

    protected $keyType = 'int';

    protected $fillable = [
        'staff_id',
        'mail_template_id',
        'mail_template_code',
        'mail_template_subject',
        'mail_template_body',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
