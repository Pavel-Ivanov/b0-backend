<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSparepart extends FormRequest
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
            'subtitle' => ['nullable'],
            'synonyms' => ['nullable'],
            'manufacturer_id' => ['required'],
            'image' => ['nullable'],
//            'image' => ['mimes:jpeg,png,gif','nullable'],
            'code' => ['required', 'size:5', 'unique:spareparts'],
//            'vendor_code' => '',
            'vendor_code' => ['regex:/^[a-zA-Zа-яА-Я0-9\-\,\ ]$/', 'nullable'],
//            'original_code' => '',
            'original_code' => ['regex:/^[a-zA-Z0-9\-\,\ ]*$/', 'nullable'],
            'is_special' => ['required'],
            'is_original' => ['required'],
            'is_by_order' => ['required'],
        ];
    }
}
