<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul | Conscientização e Apoio ao TEA</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb;       /* Azul Vibrante */
            --primary-dark: #1e40af;  /* Azul Escuro para hover */
            --secondary: #1e3a8a;     /* Azul Marinho (Texto/Titulos) */
            --accent: #f59e0b;        /* Laranja para destaque/ações */
            --bg-light: #f0f9ff;      /* Fundo muito claro */
            --text-body: #475569;     /* Cinza para textos longos */
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-body);
            line-height: 1.6;
        }

        /* --- NAVBAR --- */
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

        .nav-links a:hover { color: var(--primary); }

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

        /* --- HERO SECTION --- */
        .hero {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            color: white;
            padding: 100px 5% 140px 5%;
            text-align: center;
            border-radius: 0 0 50px 50px;
            margin-bottom: 60px;
        }

        .hero-content { max-width: 800px; margin: 0 auto; }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 25px;
        }

        .hero p {
            font-size: 1.35rem;
            opacity: 0.95;
            margin-bottom: 45px;
            font-weight: 600;
        }

        .btn-hero {
            background-color: var(--accent);
            color: white;
            text-decoration: none;
            padding: 18px 45px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 1.2rem;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
            transition: all 0.3s;
        }

        .btn-hero:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.5);
            background-color: #eab308;
        }

        /* --- SECTION TITLES --- */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
            padding: 0 20px;
        }

        .section-header h2 {
            color: var(--secondary);
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .section-header p {
            max-width: 600px;
            margin: 0 auto;
            color: var(--text-body);
        }

        /* --- CARDS --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .grid-cards {
            display: grid;
            /* Ajuste para caber 4 cards lado a lado se a tela for grande */
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 80px;
        }

        .card {
            background: var(--white);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.1);
            border-color: var(--primary);
        }

        .card-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .card h3 {
            color: var(--secondary);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .card p { margin-bottom: 25px; flex-grow: 1; }

        .card-link {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-link:hover { gap: 10px; }

        /* --- SOBRE SECTION --- */
        .about-section {
            background-color: var(--white);
            padding: 80px 0;
            margin-bottom: 80px;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-content h2 {
            color: var(--secondary);
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .about-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* --- FOOTER --- */
        footer {
            background-color: var(--secondary);
            color: white;
            padding: 60px 0 20px;
            text-align: center;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto 40px;
            text-align: left;
            padding: 0 20px;
        }

        .footer-col h4 { color: var(--accent); margin-bottom: 20px; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 10px; }
        .footer-col a { color: #e2e8f0; text-decoration: none; }
        .footer-col a:hover { color: white; text-decoration: underline; }

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .nav-links { display: none; }
            .about-grid { grid-template-columns: 1fr; }
            .hero { padding: 60px 5% 100px 5%; }
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
    <a href="{{ url('/sobre') }}">Sobre o TEA</a>
    <a href="{{ url('/comunidade') }}">Comunidade</a>
    <a href="{{ url('/exercicios') }}">Atividades</a>
    <a href="{{ url('/videos') }}">Vídeos</a>

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

    <section class="hero">
        <div class="hero-content">
            <h1>Transformando vidas através da compreensão do Autismo</h1>
            <p>Promovendo conscientização, apoio e recursos práticos para indivíduos com TEA, seus familiares e toda a comunidade.</p>
            <a href="#recursos" class="btn-hero">Começar Agora</a>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <img src="{{ asset('images/Ilustração de apoio TEA.png') }}" alt="Ilustração de diversidade" onerror="this.src='https://img.freepik.com/free-vector/flat-world-autism-awareness-day-background_23-2149323678.jpg'">
                </div>
                <div class="about-content">
                    <h2>Sobre o Mundo Azul</h2>
                    <p>Somos um projeto dedicado à pesquisa, conscientização e apoio. Nosso objetivo é quebrar barreiras de comunicação e criar um ambiente digital acolhedor.</p>
                    <br>
                    <p><i class="fas fa-check-circle" style="color: var(--primary);"></i> Informações verificadas por especialistas.</p>
                    <p><i class="fas fa-check-circle" style="color: var(--primary);"></i> Ferramentas de apoio ao desenvolvimento.</p>
                    <p><i class="fas fa-check-circle" style="color: var(--primary);"></i> Comunidade segura para troca de experiências.</p>
                    <br>
                    <a href="{{ url('/sobre') }}" style="color: var(--primary); font-weight: bold; text-decoration: none;">Saiba mais sobre nossa missão &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <section id="recursos" class="container">
        <div class="section-header">
            <h2>Recursos Educacionais</h2>
            <p>Ferramentas práticas e teóricas desenvolvidas para auxiliar no dia a dia.</p>
        </div>

        <div class="grid-cards">
            <div class="card">
                <div class="card-icon"><i class="fas fa-book-reader"></i></div>
                <h3>Guia para Famílias</h3>
                <p>Material completo com orientações sobre diagnóstico, direitos e inclusão escolar para pais e cuidadores.</p>
                <a href="{{ url('/sobre') }}" class="card-link">Ler Guia <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="card" style="border-color: var(--primary);">
                <div class="card-icon"><i class="fas fa-gamepad"></i></div>
                <h3>Atividades Interativas</h3>
                <p>Jogos de comunicação, exercícios de vocabulário e rotina visual (PECS) para estimular o desenvolvimento.</p>
                <a href="{{ url('/exercicios') }}" class="card-link">Acessar Jogos <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="card">
                <div class="card-icon"><i class="fas fa-users"></i></div>
                <h3>Comunidade de Apoio</h3>
                <p>Um espaço seguro para compartilhar histórias, tirar dúvidas e se conectar com outras famílias.</p>
                <a href="{{ url('/comunidade') }}" class="card-link">Entrar no Fórum <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="card" style="border-color: var(--primary);">
                <div class="card-icon"><i class="fas fa-video"></i></div>
                <h3>Videoteca Azul</h3>
                <p>Desenhos, músicas relaxantes e conteúdos sensoriais selecionados com carinho para todos os momentos.</p>
                <a href="{{ url('/videos') }}" class="card-link">Assistir Agora <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-col">
                <h4>Mundo Azul</h4>
                <p>TCC ETEC Itaquera - Desenvolvimento de Sistemas.</p>
            </div>
            <div class="footer-col">
                <h4>Links Rápidos</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Início</a></li>
                    <li><a href="{{ url('/sobre') }}">Sobre</a></li>
                    <li><a href="{{ url('/exercicios') }}">Exercícios</a></li>
                    <li><a href="{{ url('/videos') }}">Vídeos</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contato</h4>
                <ul>
                    <li><a href="{{ url('/contato') }}">Fale Conosco</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 Mundo Azul. Todos os direitos reservados.
        </div>
    </footer>

</body>
</html>