<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'unique_id',
        'num_code',
        'char_code',
        'name',
        'value',
        'previous'
    ];

    protected $casts = [
        'unique_id' => 'string',
        'num_code' => 'string',
        'char_code' => 'string',
        'name' => 'string',
        'value' => 'float',
        'previous' => 'float',
    ];
}
