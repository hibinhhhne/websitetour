<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietTour extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_tour';

    protected $fillable = [
        'id_tour'                ,
        'ten_tour'               ,
        'slug'              ,
        'ten_khach_san'           ,
        'list_dia_diem_tham_quan',
        'mo_ta',
        'ten_phuong_tien'         ,
        'ten_tinh_thanh'          ,
        'so_ngay'                ,
        'so_dem'                 ,
        'so_nguoi'               ,
        'ghi_chu'                ,
        'don_gia'                ,
        'hinh_anh'              ,
        'trang_thai'              ,
    ];
}
