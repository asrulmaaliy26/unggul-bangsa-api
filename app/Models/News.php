<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'gallery' => 'array',
        'date' => 'date',
    ];
}
