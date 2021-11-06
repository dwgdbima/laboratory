<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->hasRole('super-admin') || $this->user()->hasRole('admin')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'laboratory_id' => [Rule::requiredIf($this->user()->hasRole('super-admin'))],
            'name' => ['required', 'string', 'max:255', 'unique:equipment,name'],
            'image' => ['required', 'image', 'max:5000'],
        ];
    }
}
