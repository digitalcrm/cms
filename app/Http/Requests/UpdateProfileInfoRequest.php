<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // dd($this->auth_profile->id),
            'name' => 'required|unique:users,name,'.$this->auth_profile->id,
            // 'name' => [
            //     'required',
            //     Rule::unique('users')->ignore($this->auth_profile->id),
            // ],
            'firstname' => 'required|max:75',
            'lastname' => 'required|max:75',
            'email' => 'required|email|unique:users,email,'.$this->auth_profile->id,
            'mobile_number' => 'string|size:10',
            'address' => 'string|max:255',
            'description' => 'string',
            'profile_photo_path' => 'image|mimes:jpeg,bmp,svg,jpg,png|max:512',
        ];
    }
}
