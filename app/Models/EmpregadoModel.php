<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpregadoModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cargo',
        'endereco',
        'salario'
    ];

    public $timestamps = false;
    protected $table = 'empregados';
}
