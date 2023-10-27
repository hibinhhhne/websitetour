<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_hang')->unique();
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('password');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->string('quoc_tich');
            $table->string('hash_mail');
            $table->string('ngay_sinh');
            $table->string('gioi_tinh');
            $table->string('loai_tai_khoan');
            $table->string('hash_reset');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
