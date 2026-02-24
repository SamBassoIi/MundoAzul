<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Os atributos que podem ser preenchidos em massa.
     * Importante: Aqui usamos 'password_hash', não 'password'.
     */
    protected $fillable = [
        'name',
        'email',
        'password_hash', // <--- O NOME CERTO DA SUA COLUNA
        'role',
        'phone',
        'address',
        'active',
        'avatar_media_id'
    ];

    /**
     * Atributos escondidos ao converter para array/JSON.
     */
    protected $hidden = [
        'password_hash', // Esconde a senha real
        'remember_token',
    ];

    /**
     * Conversão de tipos.
     */
    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    /**
     * ESTA É A PARTE MÁGICA!
     * Diz ao Laravel: "Ei, minha senha está na coluna 'password_hash', use ela!"
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}