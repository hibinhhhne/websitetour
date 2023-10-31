<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
    use HasFactory;

    protected $table = 'khach_hang';

    protected $fillable = [
        'ho_va_ten'      ,
        'email'          ,
        'password'       ,
        'so_dien_thoai'  ,
        'dia_chi'        ,
        'quoc_tich'      ,
        'ngay_sinh'      ,
        'gioi_tinh'      ,
        'loai_tai_khoan' ,
        'hash_reset'     ,
    ];
}
