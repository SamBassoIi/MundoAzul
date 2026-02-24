<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| 1. ROTAS PÚBLICAS (Acesso Livre para todos)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('homepage'); 
})->name('Inicio');

Route::get('/sobre', function () {
    return view('sobre'); 
})->name('sobre');

Route::get('/contato', function () {
    return view('contato'); 
})->name('Contato');

use App\Http\Controllers\ContactController; // Não esqueça de importar no topo

// Rota para processar o formulário de contato
Route::post('/contato', [ContactController::class, 'store'])->name('contato.store');

/*
|--------------------------------------------------------------------------
| 2. AUTENTICAÇÃO (Login, Cadastro e Google)
|--------------------------------------------------------------------------
*/

// TELA DE LOGIN/CADASTRO (/participe)
// Inclui o truque para lembrar de onde o usuário veio se ele clicar em "Participe"
Route::get('/participe', function () {
    // Se o Laravel ainda não salvou um destino automático...
    if (!session()->has('url.intended')) {
        $anterior = url()->previous();
        // Salvamos a página anterior manualmente (evitando loops)
        if ($anterior && $anterior !== route('login') && $anterior !== url()->current()) {
            session(['url.intended' => $anterior]);
        }
    }
    return view('participe'); 
})->name('login');

// AÇÕES DO FORMULÁRIO (Processamento)
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// LOGIN COM GOOGLE
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// SEGURANÇA: Redireciona /login para /participe
Route::get('/login', function() {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| 3. ÁREA RESTRITA (Só funciona se estiver LOGADO)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // EXERCÍCIOS (Protegido)
    Route::get('/exercicios', function () { 
        return view('exercicios');
    })->name('exercicios');

    // VIDEOTECA (Protegido)
    Route::get('/videos', [VideoController::class, 'index'])->name('videos');

    // COMUNIDADE (Ver, Postar e Comentar)
    Route::get('/comunidade', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    // NOVA ROTA DE EXCLUIR COMENTÁRIO
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // PERFIL DO USUÁRIO (Ver e Atualizar)
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil.index');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('perfil.update');

    // Rota para Curtir
Route::post('/posts/{post}/like', [App\Http\Controllers\LikeController::class, 'toggle'])->name('posts.like');
});