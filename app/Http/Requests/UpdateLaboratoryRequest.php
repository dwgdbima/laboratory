<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLaboratoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->getRoleNames()[0] == 'super-admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('laboratories')->ignore($this->laboratory)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->laboratory->user)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            $validator->after(function ($validator) {
                $validator->errors()->add('field', 'update');
                $validator->errors()->add('url', request()->url());
            });
        }
    }
}
