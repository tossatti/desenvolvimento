<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\{Curriculum, User};

class Dependente extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        // Relacionamento com a pessoa
        'user_id',
        // dados pessoais
        'name',
        'cpf',
        'nascimento',
    ];

    // public function userDependentes()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function dependentes()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
