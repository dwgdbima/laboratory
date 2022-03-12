<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['laboratory_id', 'name', 'unit_id', 'note', 'slug', 'quantity', 'price_1', 'price_2', 'price_3', 'price_4', 'min'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function servicePrices()
    {
        return $this->hasMany(ServicePrice::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
