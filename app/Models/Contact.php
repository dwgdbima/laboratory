<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'map', 'phone', 'email', 'social_media'];
    protected $casts = [
        'social_media' => 'array',
    ];
}
