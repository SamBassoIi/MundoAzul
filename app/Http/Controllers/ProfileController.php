<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Mostra a tela de perfil
    public function index()
    {
        $user = Auth::user();
        return view('perfil', compact('user'));
    }

    // Atualiza os dados
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            // 'avatar' => 'nullable|image|max:2048', // Futuramente para foto
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Perfil atualizado com sucesso!');
    }
}