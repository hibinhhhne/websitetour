<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('quoc_tich', function (Blueprint $table) {
            $table->id();
            $table->integer('id_quoc_tich')->unique();
            $table->string('ten_quoc_tich');
            $table->string('slug');
            $table->timestamps();
        });
    }


    public function down(): void
    {

    }
};
