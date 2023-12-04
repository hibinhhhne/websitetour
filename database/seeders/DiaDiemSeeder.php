<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DiaDiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dia_diem')->delete(); // xóa đatabase
        DB::table('dia_diem')->truncate();  // Bắt đầu từ id 1

        DB::table('dia_diem')->insert(
            [
                [
                    'ten_dia_diem' => 'Núi Thần Tài',
                    'slug' => Str::slug('Núi Thần Tài'),
                ],
                [
                    'ten_dia_diem' => 'Bà Nà Hills',
                    'slug' => Str::slug('Bà Nà Hills'),
                ],
            ]
        );
    }
}
