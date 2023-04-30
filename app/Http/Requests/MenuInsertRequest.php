<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'menu_image'=>'required|file|mimes:jpg,png,gif,jpeg,svg|max:1024',
        ];
    }
}
