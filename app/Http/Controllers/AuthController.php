<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite; // Necessário para o Google
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // --- LOGIN (JÁ EXISTIA) ---
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/comunidade');
        }

        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ])->onlyInput('email');
    }

    // --- NOVO: CADASTRO (REGISTER) ---
    public function register(Request $request)
    {
        // 1. Validação
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // Verifica se já existe
            'password' => 'required|min:6|confirmed', // Exige campo 'password_confirmation'
        ]);

        // 2. Criar Usuário
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password_hash' => Hash::make($validated['password']), // Hash na coluna certa
            'role' => 'public', // Todo cadastro novo entra como público
            'active' => true,
        ]);

        // 3. Logar e Redirecionar
        Auth::login($user);
        return redirect()->route('posts.index');
    }

    // --- NOVO: GOOGLE LOGIN ---
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Procura usuário pelo email
            $user = User::where('email', $googleUser->getEmail())->first();

            // Se não existir, cria um novo
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password_hash' => Hash::make(Str::random(24)), // Senha aleatória segura
                    'role' => 'public',
                    'active' => true,
                ]);
            }

            Auth::login($user);
            return redirect()->intended('/comunidade');

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Erro ao entrar com Google. Tente novamente.']);
        }
    }

    // --- LOGOUT ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}