<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'path',
        'ip_hash',
        'user_agent',
        'referer',
        'session_id',
        'country',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
