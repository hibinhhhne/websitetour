<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhuongTienRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_phuong_tien'              =>'required',
            'ten_phuong_tien'             =>'required',
            'loai_phuong_tien'            =>'required',
            'cho_ngoi'                    =>'required',
            'id_tinh_thanh'               =>'required',
            'trang_thai'                  =>'required',
        ];
    }

   
}
