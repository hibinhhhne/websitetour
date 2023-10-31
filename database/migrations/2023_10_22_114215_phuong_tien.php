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

        Schema::create('phuong_tien', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phuong_tien')->unique();
            $table->string('loai_phuong_tien');
            $table->string('cho_ngoi');
            $table->string('id_tinh_thanh');
            $table->string('trang_thai');
            $table->timestamps();
        });
    }


    public function down(): void
    {

    }
};
