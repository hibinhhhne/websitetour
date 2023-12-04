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
            $table->integer('id_tour');;
            $table->integer('id_khach_hang');
            $table->string('khuyen_mai');
            $table->string('ghi_chu');
            $table->string('ngay_bat_dau');
            $table->integer('so_nguoi');
            $table->integer('tong_tien');
            $table->string('trang_thai_thanh_toan');
            $table->string('ma_thanh_toan');
            $table->string('id_bill_thanh_toan');
            $table->timestamps();
        });
    }


    public function down(): void
    {

    }
};
