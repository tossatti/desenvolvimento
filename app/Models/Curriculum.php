<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\{Dependente, Role};

class Curriculum extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        // vaga
        'role_id',
        // dados pessoais
        'name',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'email',
        'nascimento',
        'naturalidade',
        'nacionalidade',
        'genero',
        'escolaridade',
        'raca',
        'civil',
        // documentos pessoais
        'cpf',
        'pis_pasep',
        'titulo_eleitor',
        'zona', // ok
        'secao', // ok
        'cnh',
        'catcnh',
        'ctps',
        // dados bancários
        'banco',
        'agencia',
        'tipoconta',
        'numeroConta',
        'tipopix',
        'pix',
        // EPI
        'calca',
        'camisa',
        'calcado',
        // capacitação
        'nr10',
        // dependentes
       'dependentes',
       'anterior',
       'funcao_anterior',
       'empresa',
       'periodo_inicio',
       'periodo_termino',
       'carteira',
       'indicacao',
       'quem',
       'status',
    ];
    //
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
