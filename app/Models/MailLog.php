<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    protected $table = 'mail_log';

    protected $primaryKey = 'mail_log_id';

    protected $keyType = 'int';

    protected $fillable = [
        'mail_template_id',
        'mail_log_id',
        'mail_log_send_datetime',
        'mail_log_to',
        'mail_log_subject',
        'mail_log_body',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
