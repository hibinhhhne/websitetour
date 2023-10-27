<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    protected $table = 'hoa_don';

    protected $fillable = [
        'id_hoa_don',
        'id_tour',
        'id_khach_hang',
        'id_nhan_vien',
        'khuyen_mai',
        'ghi_chu',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'so_nguoi',
        'tong_tien',
        'trang_thai_thanh_toan',
        'ma_thanh_toan',
        'id_bill_thanh_toan',
    ];
}
