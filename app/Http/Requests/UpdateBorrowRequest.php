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
            'reader_id' => 'required',
            'book_id' => 'required',
            'status' => 'required',
            'request_process_at' => null,
            'request_managed_at' => null,
            'deadline' => 'required',
            'returned_at' => null,
            'return_managed_by' => null
        ];
    }
}
