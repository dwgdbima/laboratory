<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'customer_status_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customerStatus()
    {
        return $this->belongsTo(CustomerStatus::class);
    }
}
