<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date',
        'is_best' => 'boolean',
    ];
}
