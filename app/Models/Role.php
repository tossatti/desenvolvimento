<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'funcao',
    ];

    public function role()
    {
        return $this->hasMany(Contrato::class, 'role_id');
    }

    // public function curriculum()
    // {
    //     return $this->hasMany(Curriculum::class, 'role_id');
    // }
}
