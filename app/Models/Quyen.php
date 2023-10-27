<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    use HasFactory;

    protected $table = 'quyen';

    protected $fillable = [
        'id_quyen',
        'ten_quyen',
        'slug',
        'danh_sach_chuc_nang',
    ];
}
