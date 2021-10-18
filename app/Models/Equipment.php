<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'image'];

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }
}
