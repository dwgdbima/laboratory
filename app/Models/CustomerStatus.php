<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function servicePrices()
    {
        return $this->hasMany(ServicePrice::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
