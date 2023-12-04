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
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tour');
            $table->integer('id_khach_hang');
            $table->integer('id_don_hang')->nullable();
            $table->double('don_gia');
            $table->integer('so_luong')->default(1);
            $table->integer('so_luong_2')->default(1);
            $table->double('thanh_tien')->default(0);
            $table->integer('tinh_trang')->default(0);
            $table->integer('start_date')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hangs');
    }
};
