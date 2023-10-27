<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiTietTourRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        return [
            'id_tour'                   => 'required',
            'ten_tour'                  => 'required',
            'slug'                      => 'required',
            'ten_khach_san'              => 'required',
            'list_dia_diem_tham_quan'   => 'required',
            'mo_ta'                     => 'required',
            'ten_phuong_tien'            => 'required',
            'ten_tinh_thanh'             => 'required',
            'so_ngay'                   => 'required',
            'so_dem'                    => 'required',
            'so_nguoi'                  => 'required',
            'ghi_chu'                   => 'required',
            'don_gia'                   => 'required',
            'hinh_anh'                   => 'required',
            'trang_thai'                => 'required',
        ];
    }
}
