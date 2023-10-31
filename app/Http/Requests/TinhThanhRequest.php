<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinhThanhRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_tinh_thanh'        =>'required',
            'slug'                  =>'required',
        ];
    }
}
