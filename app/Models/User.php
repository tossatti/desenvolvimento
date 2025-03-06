<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\{PersonalDocument, Adress, BancAcount, Contrato};

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relacionamento de tabela documentos pessoais.
     */
    public function documentos()
    {
        return $this->hasOne(PersonalDocument::class);
    }

    /**
     * Relacionamento de tabela endereços.
     */
    public function adress()
    {
        return $this->hasOne(Adress::class);
    }

    /**
     * Relacionamento de tabela dados bancários.
     */
    public function bancario()
    {
        return $this->hasOne(BancAcount::class);
    }

    /**
     * Relacionamento de tabela dados bancários.
     */
    public function contrato()
    {
        return $this->hasOne(Contrato::class);
    }
}
