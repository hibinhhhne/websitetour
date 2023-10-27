<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $fillable = [
        'id_tour'                ,
        'ten_tour'               ,
        'mo_ta'               ,
        'slug'              ,
        'id_khach_san'           ,
        'list_dia_diem_tham_quan',
        'id_phuong_tien'         ,
        'id_tinh_thanh'          ,
        'so_ngay'                ,
        'so_dem'                 ,
        'so_nguoi'               ,
        'ghi_chu'                ,
        'don_gia'                ,
        'hinh_anh'              ,
        'trang_thai'              ,
    ];
}
