<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tai_khoan')->unique();
            $table->string('ten_tai_khoan');
            $table->string('password');
            $table->string('ho_va_ten');
            $table->string('id_quyen');
            $table->timestamps();
        });
    }


    public function down(): void
    {

    }
};
