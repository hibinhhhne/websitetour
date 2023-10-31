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
            ]
        );
    }
}
