<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'ano', 'placa', 'cor', 'status'];

    protected $primaryKey = 'veiculo_id';
}
