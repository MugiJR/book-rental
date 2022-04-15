<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title'          => 'required',
            'author'         => 'required',
            'description'    => 'nullable',
            'released_at'    => 'required | date',
            'image_url'      => 'nullable | url',
            'pages'          => 'required | numeric',
            'lang_code'      => 'required | max : 3',
            'isbn'           => 'required | max : 13',
            'in_stock'       => 'required | numeric' 
        ];
    }
}
