<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiadiemRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_dia_diem'           =>'required',
            'ten_dia_diem'          =>'required',
            'slug'                  =>'required',
            'id_tinh_thanh'         =>'required',
            'thong_tin'             =>'required',
            'hinh_anh'              =>'required',
        ];
    }
}
