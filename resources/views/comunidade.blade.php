<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul | Comunidade</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb; --primary-dark: #1e40af; --secondary: #1e3a8a;
            --accent: #f59e0b; --bg-light: #f0f9ff; --white: #ffffff; --text-body: #475569;
            --border-color: #e2e8f0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; background-color: var(--bg-light); color: var(--text-body); line-height: 1.6; }

        /* NAVBAR */
        .navbar { background: var(--white); padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 1000; }
        .logo { font-weight: 800; font-size: 1.6rem; color: var(--primary); text-decoration: none; display: flex; align-items: center; gap: 8px; }
        .logo span { color: var(--secondary); }
        .nav-links { display: flex; align-items: center; gap: 30px; }
        .nav-links a { text-decoration: none; color: var(--secondary); font-weight: 700; transition: 0.3s; }
        .nav-links a:hover { color: var(--primary); }
        .btn-profile { background-color: var(--primary); color: white !important; padding: 8px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 0.95rem; }

        /* LAYOUT */
        .container { max-width: 1200px; margin: 0 auto; padding: 30px 20px; display: grid; grid-template-columns: 260px 1fr 300px; gap: 30px; }

        /* CARDS */
        .card-box { background: var(--white); border-radius: 16px; padding: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.02); border: 1px solid var(--border-color); margin-bottom: 20px; }
        
        /* SIDEBARS */
        .sidebar-title { color: var(--secondary); font-weight: 800; margin-bottom: 15px; font-size: 1.1rem; display: flex; align-items: center; gap: 10px; }
        
        .menu-item { display: flex; align-items: center; gap: 12px; padding: 12px; color: var(--text-body); text-decoration: none; border-radius: 10px; font-weight: 600; transition: 0.2s; }
        .menu-item:hover { background-color: var(--bg-light); color: var(--primary); }
        .menu-item.active { background-color: #eff6ff; color: var(--primary); }

        /* REGRAS */
        .rule-item { display: flex; gap: 10px; font-size: 0.9rem; margin-bottom: 15px; align-items: flex-start; padding-bottom: 10px; border-bottom: 1px solid #f1f5f9; }
        .rule-item:last-child { border-bottom: none; }
        .rule-item i { color: var(--accent); margin-top: 4px; }

        /* FEED */
        .post-textarea { width: 100%; border: none; background-color: var(--bg-light); border-radius: 12px; padding: 15px; font-family: 'Nunito', sans-serif; resize: none; outline: none; margin-bottom: 10px; }
        .post-textarea:focus { background: white; box-shadow: 0 0 0 2px var(--primary); }
        
        .post-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px; }
        .user-avatar { width: 45px; height: 45px; background-color: #dbeafe; color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; margin-right: 12px; font-size: 1.1rem; }
        .author-name { font-weight: 800; color: var(--secondary); display: block; }
        .post-meta { font-size: 0.85rem; color: #94a3b8; }
        .badge-pro { background: #dbeafe; color: var(--primary); padding: 2px 8px; border-radius: 10px; font-size: 0.75rem; font-weight: 700; }

        .post-actions { display: flex; gap: 10px; align-items: center; justify-content: space-between; margin-top: 10px; border-top: 1px solid #f1f5f9; padding-top: 15px; }
        .action-btn { background: none; border: none; cursor: pointer; color: var(--text-body); font-weight: 600; display: flex; align-items: center; gap: 5px; padding: 8px 12px; border-radius: 50px; transition: 0.2s; }
        .action-btn:hover { background: var(--bg-light); color: var(--primary); }
        .liked { color: #ef4444 !important; }

        .btn-publish { background: var(--primary); color: white; border: none; padding: 8px 25px; border-radius: 50px; font-weight: 700; cursor: pointer; }
        
        /* PREVIEW FOTO/SENTIMENTO */
        .preview-area { display: flex; gap: 10px; margin-bottom: 10px; flex-wrap: wrap; }
        .preview-tag { background: #fff7ed; color: #ea580c; padding: 5px 15px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; }
        .preview-img { max-width: 100px; max-height: 100px; border-radius: 10px; border: 2px solid #e2e8f0; object-fit: cover; }
        .post-image { width: 100%; max-height: 400px; object-fit: cover; border-radius: 12px; margin-top: 10px; border: 1px solid #e2e8f0; }
        .feeling-badge { background: #fff7ed; color: #ea580c; padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; font-weight: 700; margin-left: 5px; }
        
        .feeling-menu { position: absolute; background: white; border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); display: none; z-index: 100; bottom: 40px; }
        .feeling-option { font-size: 1.5rem; cursor: pointer; padding: 5px; transition: 0.2s; }
        .feeling-option:hover { transform: scale(1.2); }

        /* RESPONSIVO */
        @media (max-width: 992px) { 
            .container { grid-template-columns: 1fr; max-width: 600px; } 
            .left-sidebar, .right-sidebar { display: none; } /* Esconde lateral no mobile */
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo"><i class="fas fa-puzzle-piece"></i> Mundo<span>Azul</span></a>
        <div class="nav-links">
            <a href="{{ url('/') }}">Inicio</a>
    <a href="{{ url('/sobre') }}">Sobre o TEA</a>
    <a href="{{ url('/exercicios') }}">Atividades</a>
    <a href="{{ url('/videos') }}">Vídeos</a>
            @auth
                <div style="display: flex; align-items: center; gap: 10px;">
                    <a href="{{ route('perfil.index') }}" class="btn-profile"><i class="fas fa-user-circle"></i> {{ explode(' ', Auth::user()->name)[0] }}</a>
                    <form action="{{ route('auth.logout') }}" method="POST" style="margin: 0;">@csrf<button type="submit" style="background: none; border: 2px solid var(--primary); color: var(--primary); padding: 5px 15px; border-radius: 20px; font-weight: bold; cursor: pointer;">Sair</button></form>
                </div>
            @else
                <a href="{{ url('/participe') }}" class="btn-profile">Participe</a>
            @endauth
        </div>
    </nav>

    <div class="container">

        <aside class="left-sidebar">
            <div class="card-box">
                <div class="sidebar-title"><i class="fas fa-compass"></i> Menu Principal</div>
                <a href="#" class="menu-item active"><i class="fas fa-newspaper"></i> Feed Geral</a>
                <a href="#" class="menu-item"><i class="fas fa-fire"></i> Destaques</a>
                <a href="#" class="menu-item"><i class="fas fa-comments"></i> Minhas Discussões</a>
                <a href="#" class="menu-item"><i class="fas fa-bookmark"></i> Salvos</a>
            </div>

            <div class="card-box" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; border: none; text-align: center;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Precisa de Ajuda?</h3>
                <p style="font-size: 0.9rem; margin-bottom: 15px; opacity: 0.9;">Nossas atividades lúdicas podem ajudar no desenvolvimento.</p>
                <a href="{{ url('/exercicios') }}" style="background: white; color: var(--primary); padding: 10px 20px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 0.9rem; display: inline-block;">Ir para Atividades</a>
            </div>
        </aside>

        <main>
            
            <div class="card-box">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex; gap: 15px;">
                        <div class="user-avatar">{{ Auth::check() ? substr(Auth::user()->name, 0, 1) : '?' }}</div>
                        <div style="flex: 1;">
                            <textarea name="conteudo" class="post-textarea" placeholder="Compartilhe sua experiência, dúvida ou conquista..." required rows="3"></textarea>
                            
                            <div class="preview-area" id="preview-area"></div>
                            <input type="hidden" name="feeling" id="feeling-input">
                            <input type="file" name="image" id="image-input" style="display: none;" accept="image/*" onchange="previewImage(this)">
                        </div>
                    </div>

                    <div class="post-actions">
                        <div style="position: relative; display: flex; gap: 10px;">
                            <button type="button" class="action-btn" onclick="document.getElementById('image-input').click()">
                                <i class="fas fa-image" style="color: #22c55e;"></i> Foto
                            </button>
                            <button type="button" class="action-btn" onclick="toggleFeelingMenu()">
                                <i class="fas fa-smile" style="color: #f59e0b;"></i> Sentimento
                            </button>
                            
                            <div id="feeling-menu" class="feeling-menu">
                                <span class="feeling-option" onclick="setFeeling('Feliz 😄')">😄</span>
                                <span class="feeling-option" onclick="setFeeling('Amado 🥰')">🥰</span>
                                <span class="feeling-option" onclick="setFeeling('Triste 😢')">😢</span>
                                <span class="feeling-option" onclick="setFeeling('Cansado 😴')">😴</span>
                                <span class="feeling-option" onclick="setFeeling('Orgulhoso 😎')">😎</span>
                            </div>
                        </div>
                        <button type="submit" class="btn-publish">Publicar</button>
                    </div>
                </form>
            </div>

            @if(session('success'))
                <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 10px; margin-bottom: 20px; text-align: center;">
                    {{ session('success') }}
                </div>
            @endif

            @foreach($posts as $post)
                <div class="card-box">
                    
                    <div class="post-header">
                        <div style="display: flex; gap: 10px;">
                            <div class="user-avatar">{{ substr($post->user->name, 0, 1) }}</div>
                            <div>
                                <span class="author-name">
                                    {{ $post->user->name }}
                                    @if($post->user->role == 'professional') <span class="badge-pro">Profissional</span> @endif
                                    @if($post->feeling) <span class="feeling-badge">está {{ $post->feeling }}</span> @endif
                                </span>
                                <div class="post-meta">{{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </div>

                        @if(Auth::check() && Auth::id() == $post->user_id)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apagar post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 5px; font-size: 1.1rem;" title="Apagar Post">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </div>

                    <div style="margin-bottom: 15px; color: #334155;">{{ $post->conteudo }}</div>

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="Imagem do post">
                    @endif

                    <div class="post-actions">
                        <form action="{{ route('posts.like', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="action-btn {{ $post->isLikedByAuthUser() ? 'liked' : '' }}">
                                <i class="{{ $post->isLikedByAuthUser() ? 'fas' : 'far' }} fa-heart"></i> {{ $post->likes->count() }} Curtir
                            </button>
                        </form>

                        <button class="action-btn" onclick="toggleComments({{ $post->id }})">
                            <i class="far fa-comment"></i> {{ $post->comments->count() }} Comentários
                        </button>
                    </div>

                    <div id="comments-{{ $post->id }}" style="display: none; margin-top: 15px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                        
                        @foreach($post->comments as $comment)
                            <div style="display: flex; justify-content: space-between; align-items: start; background: #f8fafc; padding: 10px; border-radius: 10px; margin-bottom: 8px;">
                                <div>
                                    <strong>{{ $comment->user->name }}:</strong> {{ $comment->conteudo }}
                                </div>
                                
                                @if(Auth::check() && Auth::id() == $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Apagar comentário?')" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 0 5px;" title="Excluir Comentário">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                        
                        <form action="{{ route('comments.store', $post->id) }}" method="POST" style="display: flex; gap: 10px; margin-top: 15px;">
                            @csrf
                            <input type="text" name="conteudo" placeholder="Escreva um comentário..." style="flex: 1; padding: 10px; border: 1px solid #cbd5e1; border-radius: 50px; outline: none;" required>
                            <button type="submit" style="background: var(--primary); color: white; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center;"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach

        </main>

        <aside class="right-sidebar">
            <div class="card-box" style="border-top: 5px solid var(--accent);">
                <div class="sidebar-title"><i class="fas fa-shield-alt"></i> Regras da Comunidade</div>
                
                <div class="rule-item">
                    <i class="fas fa-check-circle"></i>
                    <div><strong>Seja Gentil:</strong> Respeito e empatia são fundamentais aqui.</div>
                </div>
                <div class="rule-item">
                    <i class="fas fa-user-md"></i>
                    <div><strong>Sem Diagnósticos:</strong> Apenas profissionais podem diagnosticar. Compartilhe experiências, não laudos.</div>
                </div>
                <div class="rule-item">
                    <i class="fas fa-lock"></i>
                    <div><strong>Privacidade:</strong> Proteja a identidade das crianças. Evite fotos de rosto identificáveis.</div>
                </div>
                <div class="rule-item">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div><strong>Dúvidas Médicas:</strong> Em caso de emergência ou dúvida clínica, procure um médico.</div>
                </div>
                
                <div style="text-align: center; margin-top: 15px; font-size: 0.8rem; color: #94a3b8;">
                    Mundo Azul © 2025
                </div>
            </div>
        </aside>

    </div>

    <script>
        function toggleFeelingMenu() {
            const menu = document.getElementById('feeling-menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        function setFeeling(feeling) {
            document.getElementById('feeling-input').value = feeling;
            const area = document.getElementById('preview-area');
            const old = document.getElementById('preview-feeling-tag');
            if(old) old.remove();

            const tag = document.createElement('div');
            tag.id = 'preview-feeling-tag';
            tag.className = 'preview-tag';
            tag.innerHTML = `Sentindo: ${feeling}`;
            area.appendChild(tag);
            toggleFeelingMenu();
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const area = document.getElementById('preview-area');
                    const old = document.getElementById('preview-img-tag');
                    if(old) old.remove();

                    const img = document.createElement('img');
                    img.id = 'preview-img-tag';
                    img.className = 'preview-img';
                    img.src = e.target.result;
                    area.appendChild(img);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function toggleComments(id) {
            const box = document.getElementById('comments-' + id);
            box.style.display = box.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body>
</html>