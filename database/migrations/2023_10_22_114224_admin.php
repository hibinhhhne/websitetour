<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('password');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh');
            $table->integer('id_quyen');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        //
    }
};
