<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\{GrupoInsumo, SubgrupoInsumo};

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
        'grupo_id',
        'subgrupo_id',
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

    /**
     * Relacionamento de tabela grupo_insumos.
     */
    public function grupo()
    {
        return $this->belongsTo(GrupoInsumo::class, 'grupo_id');
    }

    /**
     * Relacionamento de tabela subgrupo_insumos.
     */
    public function subgrupo()
    {
        return $this->belongsTo(SubgrupoInsumo::class, 'subgrupo_id');
    }

    protected static function booted()
    {
        static::created(function ($insumo) {
            $insumo->codigo = $insumo->gerarCodigo();
            $insumo->saveQuietly();
        });
    }

    private function gerarCodigo()
    {
        $grupoId = str_pad($this->grupo_id, 3, '0', STR_PAD_LEFT);
        $subgrupoId = str_pad($this->subgrupo_id, 3, '0', STR_PAD_LEFT);
        $insumoId = str_pad($this->id, 3, '0', STR_PAD_LEFT);

        return 'MKI.' . $grupoId .'.'. $subgrupoId .'.'. $insumoId;
    }


     


}
