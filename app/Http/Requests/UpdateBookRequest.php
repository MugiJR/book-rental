<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title'          => 'required | max:255',
            'author'         => 'required | max:255',
            'description'    => 'nullable',
            'released_at'    => 'required | date | before:now',
            'image_url'      => 'nullable | url',
            'pages'          => 'required | integer | min:1',
            'lang_code'      => 'required | max : 3',
            'isbn'           => ['required' , 'regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i', Rule::unique('books', 'isbn')->ignore($this->book)],
            'genres'         => 'nullable | array',
            'in_stock'       => 'required | integer | min:0' 
        ];
    }
}
