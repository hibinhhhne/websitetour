<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tour')->unique();
            $table->string('ten_tour');
            $table->string('slug');
            $table->string('id_khach_san');
            $table->string('list_dia_diem_tham_quan');
            $table->string('id_phuong_tien');
            $table->string('id_tinh_thanh');
            $table->string('so_ngay');
            $table->string('so_dem');
            $table->string('so_nguoi');
            $table->string('ghi_chu');
            $table->string('don_gia');
            $table->string('hinh_anh');
            $table->string('trang_thai');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        //
    }
};
