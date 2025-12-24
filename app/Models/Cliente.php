<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'endereco', 'cpf_documento', 'cnh', 'status'];

    protected $primaryKey = 'id';

    public function alugueis()
    {
        return $this->hasMany(Aluguel::class);
    }
}