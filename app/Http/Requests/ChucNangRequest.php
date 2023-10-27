<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChucNangRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_chuc_nang'                  =>'required',
            'ten_chuc_nang'                 =>'required',
            'slug'                          =>'required',
        ];
    }
}
