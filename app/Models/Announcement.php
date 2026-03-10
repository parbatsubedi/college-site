<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'is_published',
        'publish_date',
        'expire_date',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'publish_date' => 'date',
        'expire_date' => 'date',
    ];
}
