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
        Schema::create('detalles_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendedor_id')->constrained('users');
            $table->foreignId('pedido_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->integer('amount');
            $table->enum('status', ['pendiente', 'en camino', 'entregado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_pedidos');
    }
};
