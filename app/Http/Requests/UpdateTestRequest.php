<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->hasRole('super-admin')) {
            return true;
        } elseif ($this->user()->hasRole('admin') && $this->user()->id == $this->test->laboratory->user_id) {
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
            'title' => ['required', 'string', 'max:255', Rule::unique('tests')->ignore($this->test)],
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
