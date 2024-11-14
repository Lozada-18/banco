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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_cuenta'); // tipo de cuenta
            $table->string('persona'); // nombre de la persona
            $table->string('cedula'); // cédula de la persona
            $table->boolean('confirmacion'); // confirmación de la transacción
            $table->string('estado'); // estado de la transacción
            $table->decimal('monto', 15, 2); // monto en pesos colombianos
            $table->integer('tiempo_estimado'); // tiempo estimado en días
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
