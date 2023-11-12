<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuocTichRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_quoc_tich'                 =>'required',
            'slug'                          =>'required',
        ];
    }
}
