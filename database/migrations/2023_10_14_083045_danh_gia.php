<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tour');
            $table->integer('id_khach_hang');
            $table->string('noi_dung');
            $table->string('trang_thai');
            $table->timestamps();
        });
    }


    public function down(): void
    {

    }
};
