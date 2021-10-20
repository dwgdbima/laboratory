<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chairman extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'greeting', 'email', 'social_media'];

    protected $casts = [
        'social_media' => 'array',
    ];
}
