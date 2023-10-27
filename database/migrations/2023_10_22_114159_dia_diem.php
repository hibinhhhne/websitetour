<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('dia_diem', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dia_diem')->unique();
            $table->string('ten_dia_diem');
            $table->string('slug');
            $table->integer('id_tinh_thanh');
            $table->string('thong_tin');
            $table->string('hinh_anh');
            $table->timestamps();
        });
    }

    public function down(): void
    {

    }
};
