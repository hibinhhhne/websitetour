<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuocTichSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('quoc_tich')->delete(); // xóa đatabase
        DB::table('quoc_tich')->truncate();  // Bắt đầu từ id 1

        DB::table('quoc_tich')->insert(
            [
                [
                    'ten_quoc_tich' => 'Việt Nam',
                    'slug' => Str::slug('Việt Nam'),
                ],
                [
                    'ten_quoc_tich' => 'Thái Lan',
                    'slug' => Str::slug('Thái Lan'),
                ],
            ]
        );
    }
}
