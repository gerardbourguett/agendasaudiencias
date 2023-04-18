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
        Schema::create('audiencias', function (Blueprint $table) {

            $table->increments('id');
            $table->string("title", 255);
            $table->dateTime("start");
            $table->dateTime("end");
            $table->string("tipoAudiencia", 255);
            $table->string("sala", 255);
            $table->string("magis", 255);
            $table->string("textColor", 7);
            $table->string("backgroundColor", 7);
            $table->string("observaciones", 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audiencias');
    }
};
