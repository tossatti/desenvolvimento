<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Insumo extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'grupo',
        'subgrupo',
        'codigo',
        'sinapi',
        'descricao',
        'referencia',
        'unidade',
        'valor',
        'imagem',
    ];


    /**
     * Relacionamento de tabela endereços.
     */
    public function almox()
    {
        return $this->hasOne(Adress::class);
    }
}
