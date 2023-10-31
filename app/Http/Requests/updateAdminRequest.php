<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateAdminRequest extends FormRequest
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
            'ho_va_ten'         =>'required|min:5|max:50',
            'email'             =>'required|email|unique:admin,email,' . $this->id,
            'so_dien_thoai'     =>'required|digits:10|unique:admin,so_dien_thoai,' .$this->id,
            'dia_chi'           =>'required',
            'ngay_sinh'         =>'required|date',
            'gioi_tinh'         =>'required',
            'id_quyen'          =>'required',
        ];
    }

    public function messages()
    {
        return [
            'required'       => ':attribute phải nhập',
            'max'            => ':attribute quá dài',
            'min'            => ':attribute quá ngắn',
            'email'          => ':attribute phải đúng định dạng',
            'unique'          => ':attribute đã tồn tại',
            'digits'          => ':attribute bắt buộc 10 số',
            'date'            => ':attribute phải đúng dịnh dạng',
        ];

    }
    public function attributes()
    {
        return [
            'ho_va_ten'     =>'Họ và tên',
            'email'         =>'Email',
            'so_dien_thoai' =>'Số Điện Thoại',
            'dia_chi'       =>'Địa Chỉ',
            'ngay_sinh'     =>'Ngày Sinh',
            'gioi_tinh'     =>'Giới Tính',
            'id_quyen'      =>'Quyền',
        ];
    }
}
