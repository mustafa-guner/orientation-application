<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'email'=>'string|required|email:rfc,dns|unique:users,email',
            'password'=>'required|min:8',
            'phone_no'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone_no',
            'profile_image'=>'required|file|mimes:jps,png,gif,jpeg,svg|max:1024',
            'birth_date'=>'date|required',
            'city_id'=>'required',
            'gender_id'=>'required',
        ];
    }
}
