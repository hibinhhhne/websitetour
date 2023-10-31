<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;

    protected $table = 'tai_khoan';

    protected $fillable = [
        'ten_tai_khoan',
        'password',
        'ho_va_ten',
        'id_quyen',
    ];
}
