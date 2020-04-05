<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
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
//            'image' => ['sometimes', 'mimes:jpeg,png,gif'],
            'image' => ['mimes:jpeg,png,gif', 'nullable'],
            'meta_title' => ['required', 'unique:news'],
            'meta_description' => ['required'],
//            'alias' => ['required', 'unique:news'],
            'alias' => ['sometimes', 'unique:news'],
            'published' => ['required'],
        ];
    }
}
