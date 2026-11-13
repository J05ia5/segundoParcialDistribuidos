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
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->string('destino');
            $table->date('fecha')->nullable(true);
            $table->time('hora')->nullable(true);
            $table->string('bus');
            $table->integer('precio')->unsigned();
            $table->integer('capacidad')->unsigned();
            // $table->foreignId('asientos_id')->constrained('asientos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
};
