<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    protected $table = 'hoa_don';

    protected $fillable = [
        'id_tour',
        'id_khach_hang',
        'khuyen_mai',
        'ghi_chu',
        'ngay_bat_dau',
        'so_nguoi',
        'tong_tien',
        'trang_thai_thanh_toan',
        'ma_thanh_toan',
        'id_bill_thanh_toan' ,
    ];
}
