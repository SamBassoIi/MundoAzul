<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Adicionar colunas na tabela POSTS
        // Verificamos se a coluna já existe para não dar erro se rodar de novo
        if (!Schema::hasColumn('posts', 'image')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->string('image')->nullable();
                $table->string('feeling')->nullable();
            });
        }

        // 2. Criar tabela de LIKES (Corrigida)
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            
            // CORREÇÃO: Usar unsignedInteger para 'user_id' (para bater com tabela users)
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // 'post_id' continua como foreignId (BigInt) pois a tabela posts usa BigInt
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
            
            // Garante que um usuário só pode curtir um post uma vez
            $table->unique(['user_id', 'post_id']);
        });
    }
};
