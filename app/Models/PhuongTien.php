<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongTien extends Model
{
    use HasFactory;

    protected $table = 'phuong_tien';

    protected $fillable = [

        'ten_phuong_tien',
        'loai_phuong_tien',
        'cho_ngoi',
        'id_tinh_thanh',
        'trang_thai',
    ];
}
