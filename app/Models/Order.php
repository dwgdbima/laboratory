<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'name', 'phone', 'email', 'customer_status_id', 'identity_card', 'start_date', 'end_date', 'date', 'quantity', 'payment_proof'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customerStatus()
    {
        return $this->belongsTo(CustomerStatus::class);
    }

    // /**
    //  * @return string
    //  */
    // public function getStartDateAttribute()
    // {
    //     return  Carbon::parse($this->attributes['start_date'])->format('d/m/Y');
    // }

    // /**
    //  * @return string
    //  */
    // public function getEndDateAttribute()
    // {
    //     return  Carbon::parse($this->attributes['end_date'])->format('d/m/Y');
    // }

    // /**
    //  * @return string
    //  */
    // public function getDateAttribute()
    // {
    //     return  Carbon::parse($this->attributes['date'])->format('d/m/Y');
    // }

    //  /**
    //  * @return string
    //  */
    // public function getPaymentDueAttribute()
    // {
    //     return Carbon::parse($this->attributes['payment_due'])->format('d/m/Y');
    // }
}
