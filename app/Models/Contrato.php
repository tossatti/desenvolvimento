<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contrato extends Model
{
    //** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'tipoContrato',
        'lotacao',
        'equipe',
        'funcao',
        'remuneracao',
        'cbo',
        'situacao',
        'disponibilidade',
        'aso',
        'admissao',
        'termino',
        'observacao',
    ];

    /**
     * Relacionamento de tabela.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
