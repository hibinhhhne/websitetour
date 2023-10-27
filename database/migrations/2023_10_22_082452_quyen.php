<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->id();
            $table->integer('id_quyen')->unique();
            $table->string('ten_quyen');
            $table->string('slug');
            $table->string('danh_sach_chuc_nang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
