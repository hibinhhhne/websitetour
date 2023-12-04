<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class TinhThanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tinh_thanh')->delete(); // xóa đatabase
        DB::table('tinh_thanh')->truncate();  // Bắt đầu từ id 1

        DB::table('tinh_thanh')->insert(
            [
                [
                    'ten_tinh_thanh' => 'Đà Nẵng',
                    'slug' => Str::slug('Đà Nẵng'),
                ],
                [
                    'ten_tinh_thanh' => 'Quảng Nam',
                    'slug' => Str::slug('Quảng Nam'),
                ],
                [
                    'ten_tinh_thanh' => 'Hà Nội',
                    'slug' => Str::slug('Hà Nội'),
                ],
                [
                    'ten_tinh_thanh' => 'TP Hồ Chí Minh',
                    'slug' => Str::slug('TP Hồ Chí Minh'),
                ],
                [
                    'ten_tinh_thanh' => 'Quảng Bình',
                    'slug' => Str::slug('Quảng Bình'),
                ],
                [
                    'ten_tinh_thanh' => 'Nha Trang',
                    'slug' => Str::slug('Nha Trang'),
                ],
                [
                    'ten_tinh_thanh' => 'Đà Lạt',
                    'slug' => Str::slug('Đà Lạt'),
                ],
                [
                    'ten_tinh_thanh' => 'Phú Quốc',
                    'slug' => Str::slug('Phú Quốc'),
                ],
                [
                    'ten_tinh_thanh' => 'Quy Nhơn',
                    'slug' => Str::slug('Quy Nhơn'),
                ],
                [
                    'ten_tinh_thanh' => 'Đà Lạt',
                    'slug' => Str::slug('Đà Lạt'),
                ],
            ]
        );
    }
}
