<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachSan extends Model
{
    use HasFactory;

    protected $table = 'khach_san';

    protected $fillable = [
        'id_khach_san',
        'ten_khach_san',
        'slug',
        'id_tinh_thanh',
        'thong_tin',
        'hinh_anh',
        'trang_thai',
    ];
}
