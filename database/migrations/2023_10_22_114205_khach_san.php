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
        Schema::create('khach_san', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_san')->unique();
            $table->string('ten_khach_san');
            $table->string('slug');
            $table->integer('id_tinh_thanh');
            $table->string('thong_tin');
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
