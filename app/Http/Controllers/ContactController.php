<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validação
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Salvar no Banco
        ContactMessage::create([
            'sender_name' => $request->name,
            'sender_email' => $request->email,
            'body' => $request->message,
        ]);

        // 3. Voltar com mensagem de sucesso
        return back()->with('success', 'Sua mensagem foi enviada! Responderemos em breve.');
    }
}