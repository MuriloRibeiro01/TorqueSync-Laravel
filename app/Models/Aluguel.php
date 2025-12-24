<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{

    protected $table = 'aluguels';

    use HasFactory;

    protected $fillable = ['cliente_id', 'veiculo_id', 'data_retirada', 'data_devolucao', 'valor_aluguel', 'quilometragem_retirada', 'quilometragem_rodada'];

    protected $primaryKey = 'id';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id'); 
    }

    protected $casts = [
        'data_retirada' => 'datetime',
        'data_devolucao' => 'datetime',
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id'); 
    }

}