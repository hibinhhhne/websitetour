<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diadiem extends Model
{
    use HasFactory;

    protected $table = 'dia_diem';

    protected $fillable = [
            'id_dia_diem',
            'ten_dia_diem',
            'slug',
            'id_tinh_thanh',
            'thong_tin',
            'hinh_anh',
    ];
}
