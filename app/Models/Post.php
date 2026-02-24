<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = ['conteudo', 'user_id', 'image', 'feeling'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    // Verifica se o usuário atual curtiu o post
    public function isLikedByAuthUser() {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
}