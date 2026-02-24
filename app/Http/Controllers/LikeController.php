<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $like = Like::where('post_id', $post->id)
                    ->where('user_id', Auth::id())
                    ->first();

        if ($like) {
            $like->delete(); // Se já curtiu, descurte
        } else {
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
            ]); // Se não curtiu, curte
        }

        return back(); // Volta para a página (para não recarregar tudo)
    }
}