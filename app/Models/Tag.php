<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function scopePopular($query)
    {
        return $query->withCount('blogs')->having('blogs_count', '>', 0)->orderBy('blogs_count', 'desc')->take(5);
    }
}
