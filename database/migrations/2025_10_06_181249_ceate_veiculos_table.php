<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Sempre que 'php artisan migrate' for executado, essa função será chamada
    public function up(): void
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id('veiculo_id'); // Cria a coluna id como chave primária auto-incremento
            $table->string('marca');
            $table->string('modelo');
            $table->string('placa')->unique();
            $table->integer('ano');
            $table->string('cor');
            $table->enum('status', ['Disponível', 'Alugado', 'Em Manutenção'])->default('Disponível'); // Define sempre que o carro que entrar fica disponível
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
