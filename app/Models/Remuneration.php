<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Remuneration extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'role_id',
        'base',
        'inss',
        'periculosidade',
        'alimentacao',
        'transporte',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function remuneration()
    {
        return $this->hasOne(Contrato::class, 'remuneration_id');
    }
}
