<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'conteudo' => 'required|min:2'
        ]);

        Comment::create([
            'conteudo' => $request->conteudo,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return back(); // Volta para a mesma página
    }

    // --- NOVA FUNÇÃO PARA APAGAR ---
    public function destroy(Comment $comment)
    {
        // Verifica se o usuário logado é o dono do comentário
        if (Auth::id() === $comment->user_id) {
            $comment->delete();
            return back()->with('success', 'Comentário apagado.');
        }

        return back()->withErrors('Você não tem permissão para apagar este comentário.');
    }
}