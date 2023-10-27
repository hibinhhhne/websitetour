<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachSanRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_khach_san'              =>'required',
            'ten_khach_san'             =>'required',
            'slug'                      =>'required',
            'id_tinh_thanh'             =>'required',
            'thong_tin'                 =>'required',
            'hinh_anh'                  =>'required',
            'trang_thai'                =>'required',
        ];
    }
}
