<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaiKhoanRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_tai_khoan'         =>'required',
            'password'              =>'required|min:6|max:30',
            'ho_va_ten'             =>'required|min:5|max:50',
            'id_quyen'              =>'required',
        ];
    }
}
