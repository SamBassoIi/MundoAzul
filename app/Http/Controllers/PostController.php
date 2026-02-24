<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // <--- Importante para apagar a foto

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user', 'likes')->latest()->get();
        return view('comunidade', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'conteudo' => 'required|min:2',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'conteudo' => $request->conteudo,
            'user_id' => Auth::id(),
            'image' => $imagePath,
            'feeling' => $request->feeling,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post publicado!');
    }

    // --- NOVA FUNÇÃO DE APAGAR POST ---
    public function destroy(Post $post)
    {
        // Verifica se o usuário logado é o dono do post
        if (Auth::id() == $post->user_id) {
            
            // Se tiver imagem, apaga do servidor para não ocupar espaço
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $post->delete();
            return back()->with('success', 'Post apagado com sucesso!');
        }

        return back()->withErrors('Você não tem permissão para apagar este post.');
    }
}