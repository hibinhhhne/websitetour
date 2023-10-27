<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khach_hang';

    protected $fillable = [
        'id_khach_hang'  ,
        'ho_va_ten'      ,
        'email'          ,
        'password'       ,
        'so_dien_thoai'  ,
        'dia_chi'        ,
        'quoc_tich'      ,
        'hash_mail'      ,
        'ngay_sinh'      ,
        'gioi_tinh'      ,
        'loai_tai_khoan' ,
        'hash_reset'     ,
    ];
}
