<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $catalog = [
            'Diversão e Inclusão (Infantil)' => [
                [
                    'title' => 'Turma da Mônica - Apresentando o André',
                    'id' => '0QvW_gYvD9Y',
                    'desc' => 'Conheça o André, o personagem autista da Turma da Mônica.'
                ],
                [
                    'title' => 'Mundo Bita - Todo Mundo é Diferente',
                    'id' => 'vE2_2MgMhXE',
                    'desc' => 'O personagem Léo mostra como as diferenças tornam tudo mais especial.'
                ],
                [
                    'title' => 'A Diferença é o que nos Une',
                    'id' => 'eLtzvypcurE',
                    'desc' => 'Videoclipe musical do Mundo Bita sobre inclusão e respeito.'
                ],
                [
                    'title' => 'André em: Cheirinho de Confusão',
                    'id' => 'mu9w5tuxlM4',
                    'desc' => 'Uma historinha divertida ensinando sobre sensibilidade sensorial.'
                ]
            ],
            'Sensorial e Relaxamento (Calmante)' => [
                [
                    'title' => 'Música Relaxante e Visual Fluido',
                    'id' => 'DlnYANIVslc',
                    'desc' => 'Imagens suaves e música calma para momentos de agitação.'
                ],
                [
                    'title' => 'Formas e Cores Suaves',
                    'id' => 'oThRjRRo0Uo',
                    'desc' => 'Estímulo visual lento e de alto contraste para foco e calma.'
                ],
                [
                    'title' => 'Terapia com Bolhas e Música',
                    'id' => '2pXFIYjMXKk',
                    'desc' => 'Bolhas flutuantes com sons tranquilos para regulação sensorial.'
                ],
                [
                    'title' => 'Geometria Relaxante',
                    'id' => 'iDb6OoizmEs',
                    'desc' => 'Padrões geométricos hipnotizantes para reduzir a ansiedade.'
                ]
            ],
            'Para Pais e Educadores (Informação)' => [
                [
                    'title' => 'Sinais de Autismo na Infância',
                    'id' => 'Bw045rRqc9w',
                    'desc' => 'Explicação clara sobre os primeiros sinais de desenvolvimento atípico.'
                ],
                [
                    'title' => 'Dr. Drauzio Varella: Autismo',
                    'id' => 'SH1IY8W-wuA',
                    'desc' => 'Bate-papo fundamental sobre o espectro e diagnóstico precoce.'
                ],
                [
                    'title' => 'Alunos com TEA na Escola',
                    'id' => 'SB4cjfc5QQs',
                    'desc' => 'Dicas para professores e pais sobre inclusão escolar.'
                ]
            ]
        ];

        return view('videos', compact('catalog'));
    }
}