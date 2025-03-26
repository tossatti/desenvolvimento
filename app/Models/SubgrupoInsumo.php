<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Insumo;

class SubgrupoInsumo extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'subgrupo',
    ];

    /**
     * Relacionamento de tabela insumos.
     */
    public function insumos()
    {
        return $this->hasMany(Insumo::class, 'subgrupo_id');
    }

}
