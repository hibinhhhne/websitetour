<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        return [
            'ten_tour'                  => 'required',
            'slug'                      => 'required',
            'mo_ta'                  => 'required',
            'id_khach_san'              => 'required',
            'list_dia_diem_tham_quan'   => 'required',
            'id_phuong_tien'            => 'required',
            'id_tinh_thanh'             => 'required',
            'so_ngay'                   => 'required',
            'ngay_khoi_hanh'                   => 'required',
            'so_dem'                    => 'required',
            'so_nguoi'                  => 'required',
            'ghi_chu'                   => 'required',
            'don_gia'                   => 'required',
            'don_gia_2'                   => 'required',
            'trang_thai'                => 'required',
        ];
    }

}
