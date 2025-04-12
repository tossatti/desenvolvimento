<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BancAcount extends Model
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
        'banco',
        'agencia',
        'tipo_conta',
        'numero_Conta',
        'tipo_pix',
        'pix',
    ];
    
    /**
     * Relacionamento de tabela.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
