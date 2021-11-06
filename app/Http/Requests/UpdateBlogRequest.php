<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
        } elseif ($this->user()->hasRole('admin') && $this->user()->id == $this->blog->user_id) {
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
            'title' => ['required', 'string', 'max:255', Rule::unique('blogs')->ignore($this->blog)],
            'content' => ['required', 'string'],
            'thumbnail' => ['image', 'max:2048'],
            'category' => ['required'],
            'tag' => ['required', 'array', 'min:1'],
        ];
    }
}
