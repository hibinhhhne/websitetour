<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KhachSanSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('khach_san')->delete(); // xóa đatabase
        DB::table('khach_san')->truncate();  // Bắt đầu từ id 1

        DB::table('khach_san')->insert(
            [
                [
                    'ten_khach_san' => 'À La Carte',
                    'slug' => Str::slug('À La Carte'),
                ],
                [
                    'ten_khach_san' => 'Sala Danang Beach Hotel',
                    'slug' => Str::slug('Sala Danang Beach Hotel'),
                ],
            ]
        );
    }
}
