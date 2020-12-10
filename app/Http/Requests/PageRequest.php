<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => ($this->getMethod() == 'POST')
                        ? 'required|unique:pages|max:75'
                        : 'required|max:75|unique:pages,title,'.$this->page->id,
            'body' => 'required',
            'image' => 'image|max:1024',
        ];
    }
}
