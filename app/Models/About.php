<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['banner', 'desc', 'vision', 'mission'];

    protected $casts = [
        'mission' => 'array',
    ];
}
