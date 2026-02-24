<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul | Videoteca</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* --- CONFIGURAÇÕES GERAIS (Identidade Visual do Mundo Azul) --- */
        :root {
            --primary: #2563eb;       /* Azul Vibrante */
            --primary-dark: #1e40af;  /* Azul Escuro */
            --secondary: #1e3a8a;     /* Azul Marinho (Texto) */
            --accent: #f59e0b;        /* Laranja (Destaque) */
            --bg-light: #f0f9ff;      /* Fundo Claro */
            --white: #ffffff;
            --text-body: #475569;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-body);
            line-height: 1.6;
        }

        /* --- HEADER / NAVBAR (Igual à Home) --- */
        .navbar {
            background-color: var(--white);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-weight: 800;
            font-size: 1.6rem;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo span { color: var(--secondary); }

        .nav-links { display: flex; align-items: center; gap: 30px; }
        
        .nav-links a {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 700;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-links a:hover, .nav-links a.active { color: var(--primary); }

        .btn-login {
            background-color: var(--primary);
            color: white !important;
            padding: 10px 25px;
            border-radius: 50px;
            transition: transform 0.2s, background-color 0.2s;
        }
        
        .btn-login:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* --- HERO BANNER (Destaque da Página) --- */
        .hero-banner {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            margin-bottom: 60px;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
            position: relative;
            overflow: hidden;
        }

        /* Efeito de bolinhas no fundo para ficar "caracterizado" */
        .hero-banner::before {
            content: '';
            position: absolute;
            top: -50px; left: -50px;
            width: 150px; height: 150px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .hero-banner::after {
            content: '';
            position: absolute;
            bottom: -30px; right: 10%;
            width: 100px; height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .hero-img {
            max-width: 140px;
            margin-bottom: 15px;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            transition: transform 0.3s;
        }
        .hero-img:hover { transform: scale(1.05) rotate(5deg); }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.95;
            max-width: 600px;
            margin: 0 auto;
        }

        /* --- CONTEÚDO PRINCIPAL --- */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        .category-section { margin-bottom: 60px; }

        .category-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 3px solid #e2e8f0;
        }

        .category-title {
            color: var(--secondary);
            font-size: 1.8rem;
            font-weight: 800;
            margin: 0;
            padding-left: 15px;
            border-left: 6px solid var(--accent); /* Detalhe laranja */
        }

        /* --- GRID DE VÍDEOS (Balões Arredondados) --- */
        .video-grid {
            display: grid;
            /* Responsivo: cria colunas automaticamente */
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .video-card {
            background: var(--white);
            border-radius: 25px; /* Bordas bem arredondadas como pedido */
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .video-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15);
            border-color: var(--primary); /* Borda azul ao passar o mouse */
        }

        /* Área do Vídeo (Youtube) */
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* Proporção 16:9 perfeita */
            height: 0;
            background: #000;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            border: none;
        }

        /* Conteúdo do Card */
        .card-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-content h3 {
            font-size: 1.1rem;
            color: var(--secondary);
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .card-content p {
            font-size: 0.9rem;
            color: var(--text-body);
            line-height: 1.5;
            margin-bottom: 15px;
        }

        /* Pequena tag decorativa */
        .tag-play {
            margin-top: auto;
            align-self: flex-start;
            font-size: 0.8rem;
            color: var(--primary);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* --- FOOTER --- */
        footer {
            background-color: var(--secondary);
            color: white;
            padding: 40px 0 20px;
            text-align: center;
        }
        .copyright {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .page-title { font-size: 2rem; }
            .hero-banner { padding: 40px 20px; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">
            <i class="fas fa-puzzle-piece"></i>
            Mundo<span>Azul</span>
        </a>
       <div class="nav-links">
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ url('/sobre') }}">Sobre o TEA</a>
            <a href="{{ url('/comunidade') }}">Comunidade</a>
            <a href="{{ url('/exercicios') }}">Atividades</a>

    @auth
<div style="display: flex; align-items: center; gap: 10px;">
                    
                    <a href="{{ route('perfil.index') }}" 
                       style="background-color: var(--primary); color: white; padding: 8px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 0.95rem; transition: 0.3s; box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);">
                        <i class="fas fa-user-circle"></i> {{ explode(' ', Auth::user()->name)[0] }}
                    </a>

                    <form action="{{ route('auth.logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" 
                                style="background: transparent; border: 2px solid var(--primary); color: var(--primary); padding: 6px 15px; border-radius: 50px; font-weight: 700; cursor: pointer; font-size: 0.9rem; transition: 0.3s;">
                            Sair
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ url('/participe') }}" class="btn-login">Participe</a>
            @endauth
        </div>
    </nav>

    <div class="hero-banner">
    <h1 class="page-title">Cine Mundo Azul</h1>
        <p class="page-subtitle">Uma coleção selecionada com carinho: desenhos inclusivos, relaxamento sensorial e conteúdo educativo para famílias.</p>
    </div>

    <div class="main-container">
        
        @if(isset($catalog))
            @foreach($catalog as $categoryName => $videos)
                <div class="category-section">
                    <div class="category-header">
                        <h2 class="category-title">{{ $categoryName }}</h2>
                    </div>
                    
                    <div class="video-grid">
                        @foreach($videos as $video)
                            <div class="video-card">
                                <div class="video-wrapper">
                                    <iframe 
                                        loading="lazy"
                                        src="https://www.youtube.com/embed/{{ $video['id'] }}" 
                                        title="{{ $video['title'] }}" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="card-content">
                                    <h3>{{ $video['title'] }}</h3>
                                    <p>{{ $video['desc'] }}</p>
                                    <div class="tag-play">
                                        <i class="fas fa-play-circle"></i> Assistir
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <div style="text-align: center; padding: 50px;">
                <h2>Ops! O catálogo está vazio.</h2>
                <p>Verifique se o VideoController está configurado corretamente.</p>
            </div>
        @endif

    </div>

    <footer>
        <div class="copyright">
            &copy; 2025 Mundo Azul. Feito com 💙 para a comunidade.
        </div>
    </footer>

</body>
</html>