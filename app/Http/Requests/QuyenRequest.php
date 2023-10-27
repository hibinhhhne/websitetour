<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyenRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_quyen'                  =>'required',
            'ten_quyen'                 =>'required',
            'slug'                      =>'required',
            'danh_sach_chuc_nang'       =>'required',
        ];
    }
}
