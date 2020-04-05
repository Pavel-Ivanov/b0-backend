<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNews extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'announcement' => ['required'],
            'body' => ['required'],
            'image' => ['mimes:jpeg,png,gif', 'nullable'],
            'meta_title' => [
                'required',
                Rule::unique('news')->ignore($this->route('news'))
            ],
            'meta_description' => ['required'],
            'alias' => [
                Rule::unique('news')->ignore($this->route('news'))
            ],
            'published' => ['required'],
        ];
    }
}
