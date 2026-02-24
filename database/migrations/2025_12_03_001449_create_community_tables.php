<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabela de POSTAGENS
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            // CORREÇÃO: Usar unsignedInteger para bater com a tabela users
            $table->unsignedInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->text('conteudo');
            $table->timestamps();
        });

        // Tabela de COMENTÁRIOS
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            
            // post_id continua foreignId pois a tabela posts usa id() (BigInt)
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            
            // CORREÇÃO: user_id também deve ser unsignedInteger aqui
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->text('conteudo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
};