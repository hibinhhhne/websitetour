<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->longText('slide')->nullable();
            $table->longText('images')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('configs');
    }
};
