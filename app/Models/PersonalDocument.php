<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class PersonalDocument extends Model
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
        'cpf',
        'pis_pasep',
        'titulo_eleitor',
        'zona', // ok
        'secao', // ok
        'cnh',
        'catcnh',
        'ctps',
    ];

    /**
     * Relacionamento de tabela.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
