<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoaDonRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_tour'                   => 'required',
            'id_khach_hang'             => 'required',
            'id_nhan_vien'              => 'required',
            'khuyen_mai'                => 'required',
            'ghi_chu'                   => 'required',
            'ngay_bat_dau'              => 'required',
            'ngay_ket_thuc'             => 'required',
            'so_nguoi'                  => 'required|',
            'tong_tien'                 => 'required',
            'trang_thai_thanh_toan'     => 'required',
            'ma_thanh_toan'             => 'required',
            'id_bill_thanh_toan'        => 'required',

        ];
    }
}
