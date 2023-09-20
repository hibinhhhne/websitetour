<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('user_name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('full_name');
            $table->integer('phone');
            $table->string('address');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        //
    }
};
