<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|max:200',
            'body' => 'required',
            // 'photo_id' => 'image|mimes:jpeg,jpg,png|max:2024',
            'category_id' => 'required|not_in:0',
            'subcategory_id' => 'not_in:0',
            'tags' => 'exists:tags,id'
        ];
    }
}
