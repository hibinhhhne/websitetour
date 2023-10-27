<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->integer('id_hoa_don')->unique();
            $table->integer('id_tour');;
            $table->integer('id_khach_hang');
            $table->integer('id_nhan_vien');
            $table->string('khuyen_mai');
            $table->string('ghi_chu');
            $table->string('ngay_bat_dau');
            $table->string('ngay_ket_thuc');
            $table->integer('so_nguoi');
            $table->integer('tong_tien');
            $table->string('trang_thai_thanh_toan');
            $table->string('ma_thanh_toan');
            $table->integer('id_bill_thanh_toan');
            $table->timestamps();
        });
    }


    public function down(): void
    {

    }
};
