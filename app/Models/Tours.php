<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $fillable = [
        'ten_tour'               ,
        'slug'              ,
        'mo_ta'               ,
        'id_khach_san'           ,
        'list_dia_diem_tham_quan',
        'id_phuong_tien'         ,
        'id_tinh_thanh'          ,
        'ngay_khoi_hanh'        ,
        'so_ngay'                ,
        'so_dem'                 ,
        'so_nguoi'               ,
        'ghi_chu'                ,
        'don_gia'                ,
        'don_gia_2'                ,
        'hinh_anh'              ,
        'trang_thai'              ,
    ];
}
