<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'banner', 'phone', 'address', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }
}
