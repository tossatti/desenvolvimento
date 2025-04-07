<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Hire extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cno',
        'codigo',
        'sigla',
        'objeto',
        'tipo', 
        'contrato',
        'contratante',
        'cnpj',
        'valor',
        'vigência', 
        'inicio',
        'termino',
        'gestor', 
        'auxiliar', 
        'status',
    ];
    

    private function gerarCodigo()
    {
        $idFormatado = str_pad($this->id, 4, '0', STR_PAD_LEFT);
        return 'MKC.' . $idFormatado;
    }

    protected static function booted()
    {
        static::created(function ($hire) {
            $hire->codigo = $hire->gerarCodigo();
            $hire->saveQuietly();
        });
    }

    public function gestor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'gestor'); 
    }

    public function auxiliar(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auxiliar'); 
    }
    
}
