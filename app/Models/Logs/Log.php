<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'user_id',
        'currency',
        'amount',
        'status',
        'rub_value'
    ];
}
