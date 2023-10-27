<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'id_admin'          =>'required',
            'ho_va_ten'         =>'required|min:5|max:50',
            'email'             =>'required|email',
            'password'          =>'required|min:6|max:30',
            'so_dien_thoai'     =>'required|digits:10',
            'dia_chi'           =>'required',
            'ngay_sinh'         =>'required',
            'gioi_tinh'         =>'required',
            'id_quyen'          =>'required',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*'           => 'Họ và tên phải dài hơn 5',
            'email.*'               => 'Nhập đúng Email',
            'password.*'            => 'Password phải dài hơn 6',
            'so_dien_thoai.*'       => 'Số điện thoại chỉ 10 chữ số',
        ];

    }
}
