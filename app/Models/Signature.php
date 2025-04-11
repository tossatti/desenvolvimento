<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use App\Models\User;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'uuid',
        'nome_assinante',
        'email_assinante',
        'hash_assinatura',
        'data_assinatura',
        'token_verificacao',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->token_verificacao = Str::random(60);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
