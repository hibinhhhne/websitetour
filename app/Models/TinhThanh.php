<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhThanh extends Model
{
    use HasFactory;

    protected $table = 'tinh_thanh';

    protected $fillable = [
        'id_tinh_thanh',
        'ten_tinh_thanh',
        'slug',
    ];
}
