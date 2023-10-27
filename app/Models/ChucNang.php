<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucNang extends Model
{
    use HasFactory;

    protected $table = 'chuc_nang';

    protected $fillable = [
        'id_chuc_nang',
        'ten_chuc_nang',
        'slug',
    ];
}
