<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'customer_status_id' => 'required',
            'identity_card' => 'required|file|max:1000',
            'date_range' => 'required',
            'quantity' => 'required_unless:unit,per-hari',
        ];
    }
}
