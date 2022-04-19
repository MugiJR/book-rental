<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowRequest extends FormRequest
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
            'reader_id' => 'nullable',
            'book_id' => 'nullable',
            'status' => 'required',
            'request_process_at' => 'nullable',
            'request_managed_by' => 'nullable',
            'deadline' => 'required',
            'returned_at' => 'nullable',
            'return_managed_by' => 'nullable',
        ];
    }
}
