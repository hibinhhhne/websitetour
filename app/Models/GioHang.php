<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = "gio_hangs";

    protected $fillable = [
        'id_tour',
        'id_khach_hang',
        'id_don_hang',
        'don_gia',
        'so_luong',
        'so_luong_2',
        'thanh_tien',
        'tinh_trang',
        'start_date'
    ];

    CONST DANG_CHO_THANH_TOAN   =  1;   // warning
    CONST DA_THANH_TOAN         =  2;   // success
}
