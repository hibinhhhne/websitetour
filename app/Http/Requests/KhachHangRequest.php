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
            'id_khach_hang'                 => 'required',
            'ho_va_ten'                     => 'required|min:5|max:50',
            'email'                         => 'required|email',
            'password'                      => 'required|min:6|max:30',
            'so_dien_thoai'                 => 'required|digits:10',
            'dia_chi'                       => 'required',
            'quoc_tich'                     => 'required',
            'hash_mail'                     => 'required|same:email',
            'ngay_sinh'                     => 'required',
            'gioi_tinh'                     => 'required',
            'loai_tai_khoan'                => 'required',
            'hash_reset'                    => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*'           =>' Họ và Tên dài hơn 5 chữ',
            'email.*'               =>' Email phải nhập đúng',
            'hash_mail.*'           =>' Nhập lại Email đúng với Email',
            'password.*'            =>' Password phải dài hơn 6',
            'hash_reset.*'          =>' Nhập lại password đúng với Password',
            'so_dien_thoai.*'       =>' Số điện thoại chỉ 10 chữ số',
        ];
    }
}
