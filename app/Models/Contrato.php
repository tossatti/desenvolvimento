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
        'remuneration_id',
        'role_id',
        'tipoContrato',
        'lotacao',
        'equipe',
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

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function remuneration()
    {
        return $this->hasOne(Remuneration::class, 'remuneration_id');
    }

    public function hire()
    {
        return $this->belongsTo(Hire::class, 'lotacao', 'id');
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'lotacao');
    }
}
