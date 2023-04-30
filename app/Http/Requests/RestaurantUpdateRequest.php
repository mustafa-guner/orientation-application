<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantUpdateRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'description'=>'string|max:255|nullable',
            'profile_image'=>'required|file|mimes:jps,png,gif,jpeg,svg|max:1024',
            'email'=>'string|nullable|email:rfc,dns|email',
            'address'=>'required|string',
            'phone_no'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'phone_no_2'=>'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'has_outdoor'=>'required',
            'has_indoor'=>'required',
            'website_link'=>'nullable|string',
            'facebook_link'=>'nullable|string',
            'instagram_link'=>'nullable|string',
            'city_id'=>'required'
            ];
    }
}
