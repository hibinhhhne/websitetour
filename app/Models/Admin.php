<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'id_admin',
        'ho_va_ten',
        'email',
        'password',
        'so_dien_thoai',
        'dia_chi',
        'ngay_sinh',
        'gioi_tinh',
        'id_quyen',
    ];
}
