<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhGiaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_danh_gia'       =>'required',
            'id_tour'           =>'required',
            'id_khach_hang'     =>'required',
            'noi_dung'          =>'required',
            'trang_thai'        =>'required',
        ];
    }
}
