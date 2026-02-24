<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    // Define o nome da tabela (pois não é o plural padrão 'contact_messages')
    protected $table = 'contact_messages';

    // Desativa created_at e updated_at (sua tabela usa received_at)
    public $timestamps = false;

    protected $fillable = [
        'sender_name',
        'sender_email',
        'body',
        // 'received_at' é preenchido automaticamente pelo banco
    ];
}