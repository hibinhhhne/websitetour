<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'ho_va_ten'                     => 'required|min:5|max:50',
            'email'                         => 'required|email',
            'so_dien_thoai'                 => 'required|digits:10',
            'dia_chi'                       => 'required',
            'quoc_tich'                     => 'required',
            'ngay_sinh'                     => 'required',
            'gioi_tinh'                     => 'required',
            'loai_tai_khoan'                => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*'           =>' Họ và Tên dài hơn 5 chữ',
            'email.*'               =>' Email phải nhập đúng',
            'hash_reset.*'          =>' Nhập lại password đúng với Password',
            'so_dien_thoai.*'       =>' Số điện thoại chỉ 10 chữ số',
        ];
    }
}
