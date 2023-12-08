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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nomplatillo');
            $table->string('ingrediente');
            $table->double('costo', 8, 2);
            $table->double('precio', 8, 2);
            $table->string('imagen')->nullable();
            //$table->unsignedBigInteger('categoria_id'); // Columna para la llave foránea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }

};
