<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['marca', 'modelo', 'ano', 'placa', 'cor', 'status', 'quilometragem_atual', 'valor_dias'];

    protected $primaryKey = 'id';

    public function alugueis()
    {
        return $this->hasMany(Aluguel::class);
    }

    public function aluguelAtivo()
    {
        return $this->hasOne(Aluguel::class, 'veiculo_id')->latest();
    }


}