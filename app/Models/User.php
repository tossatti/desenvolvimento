<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\{PersonalDocument, Adress, BancAcount, Contrato, ESocial, Dependente, Hire};

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
        'nascimento',
        'naturalidade',
        'nacionalidade',
        'genero',
        'escolaridade',
        'raca',
        'civil',
        'calca',
        'camisa',
        'camisa',
        'nr10',
        'temdependentes',
        'numeroDependentes',
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

    public function esocial()
    {
        return $this->hasOne(ESocial::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function dependentes()
    {
        return $this->hasMany(Dependente::class, 'user_id');
    }

    public function managedHires()
    {
        return $this->hasMany(Hire::class, 'gestor');
    }

    public function assistedHires()
    {
        return $this->hasMany(Hire::class, 'auxiliar');
    }

    public function hire()
    {
        return $this->belongsTo(Hire::class, 'hire_id');
    }

    public function lotacao()
    {
        return $this->belongsTo(Hire::class, 'hire_id', 'id');
        // 'hire_id' is the FK in the users table
        // 'id' is the primary key in the hires table
    }

    public function lotacao2()
    {
        return $this->hasOneThrough(
            Hire::class,         // Final model we want to access
            Contrato::class,     // Intermediate model
            'user_id',          // Foreign key on the Contrato table referencing User
            'id',               // Foreign key on the Hire table referencing Contrato 
            'id',               // Local key on the User table
            'lotacao'        // Foreign key on the Contrato table referencing Hire
        );
    }
}
