<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul - Tudo Sobre o TEA</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- CONFIGURAÇÕES VISUAIS (Padrão Mundo Azul) --- */
        :root {
            --primary: #2563eb;       /* Azul Vibrante */
            --primary-dark: #1e40af;  /* Azul Escuro */
            --secondary: #1e3a8a;     /* Azul Marinho */
            --accent: #f59e0b;        /* Laranja */
            --bg-light: #f0f9ff;      /* Fundo Claro */
            --white: #ffffff;
            --text-body: #475569;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-body);
            line-height: 1.7;
        }

        /* --- NAVBAR (Igual à Home) --- */
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
        .nav-links a { text-decoration: none; color: var(--secondary); font-weight: 700; transition: color 0.3s; }
        .nav-links a:hover { color: var(--primary); }

        .btn-login {
            background-color: var(--primary); color: white !important;
            padding: 10px 25px; border-radius: 50px; font-weight: bold;
        }

        /* --- HERO SECTION --- */
        .hero {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
            padding: 80px 5%;
            text-align: center;
            border-radius: 0 0 50px 50px;
            margin-bottom: 60px;
        }

        .hero h1 { font-size: 2.8rem; margin-bottom: 15px; font-weight: 800; }
        .hero p { font-size: 1.2rem; opacity: 0.95; max-width: 800px; margin: 0 auto; }

        /* --- CONTEÚDO PRINCIPAL --- */
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px 60px; }

        .content-box {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }

        .section-title {
            color: var(--secondary);
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 20px;
            border-left: 5px solid var(--accent);
            padding-left: 15px;
        }

        .text-content { font-size: 1.05rem; margin-bottom: 15px; }
        .text-content strong { color: var(--primary-dark); }

        /* Lista de Sintomas */
        .symptoms-list {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .symptoms-list li {
            background: #f8fafc;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .symptoms-list i { color: var(--primary); font-size: 1.2rem; }

        /* Tipos de TEA */
        .types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .type-card {
            background: #eff6ff;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #dbeafe;
        }
        .type-card h4 { color: var(--primary); margin-bottom: 10px; font-size: 1.2rem; }

        /* Vídeo */
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
            background: #000;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 40px 0;
        }
        .video-container iframe {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%; border: none;
        }

        /* Footer Igual */
        footer {
            background-color: var(--secondary); color: white;
            padding: 60px 0 20px; text-align: center; margin-top: auto;
        }
        .footer-content {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px; max-width: 1000px; margin: 0 auto 40px; text-align: left; padding: 0 20px;
        }
        .footer-col h4 { color: var(--accent); margin-bottom: 20px; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 10px; }
        .footer-col a { color: #e2e8f0; text-decoration: none; }
        .footer-col a:hover { color: white; text-decoration: underline; }
        .copyright { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px; font-size: 0.9rem; opacity: 0.7; }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero h1 { font-size: 2rem; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">
            <i class="fas fa-puzzle-piece"></i> Mundo<span>Azul</span>
        </a>
        <div class="nav-links">
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ url('/comunidade') }}">Comunidade</a>
            <a href="{{ url('/exercicios') }}">Atividades</a>
            <a href="{{ url('/videos') }}">Vídeos</a>

            @auth
                <div style="display: flex; align-items: center; gap: 10px;">
                    <a href="{{ route('perfil.index') }}" 
                       style="background-color: var(--primary); color: white; padding: 8px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 0.95rem; box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);">
                        <i class="fas fa-user-circle"></i> {{ explode(' ', Auth::user()->name)[0] }}
                    </a>
                    <form action="{{ route('auth.logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" style="background: transparent; border: 2px solid var(--primary); color: var(--primary); padding: 6px 15px; border-radius: 50px; font-weight: 700; cursor: pointer;">Sair</button>
                    </form>
                </div>
            @else
                <a href="{{ url('/participe') }}" class="btn-login">Participe</a>
            @endauth
        </div>
    </nav>

    <header class="hero">
        <h1>Transtorno do Espectro Autista (TEA)</h1>
        <p>Sintomas, Causas e Tratamentos baseados em evidências científicas.</p>
    </header>

    <div class="container">

        <div class="content-box">
            <h2 class="section-title">O que é?</h2>
            <p class="text-content">
                Mais conhecido como autismo, o TEA é uma condição neurológica que se manifesta geralmente na infância e pode persistir ao longo da vida. Ele afeta principalmente três áreas: <strong>desenvolvimento social</strong> (dificuldade em manter conversas), <strong>comunicação</strong> (repetição de palavras) e <strong>comportamento</strong>.
            </p>
            <p class="text-content">
                A denominação “espectro” é usada devido à ampla variação de sintomas e níveis de gravidade observados em cada indivíduo.
            </p>
        </div>

        <div class="content-box">
            <h2 class="section-title">Principais Sintomas</h2>
            <p class="text-content">Os sinais variam, mas geralmente incluem:</p>
            <ul class="symptoms-list">
                <li><i class="fas fa-eye-slash"></i> Dificuldade em manter contato visual.</li>
                <li><i class="fas fa-theater-masks"></i> Dificuldade em reconhecer expressões faciais e ironias.</li>
                <li><i class="fas fa-sync-alt"></i> Comportamentos repetitivos e gestos estereotipados.</li>
                <li><i class="fas fa-volume-up"></i> Sensibilidade sensorial (luzes, sons, texturas).</li>
            </ul>
        </div>

        <div class="content-box">
            <h2 class="section-title">Classificação e Tipos</h2>
            <div class="types-grid">
                <div class="type-card">
                    <h4>TEA Clássico</h4>
                    <p>Geralmente o indivíduo é voltado para si, não estabelece contato visual e tem dificuldade com metáforas e duplo sentido.</p>
                </div>
                <div class="type-card">
                    <h4>Alto Desempenho</h4>
                    <p>Apresenta características do TEA, mas em menor intensidade. Consegue se comunicar melhor e pode ter habilidades acima da média em áreas de interesse.</p>
                </div>
                <div class="type-card">
                    <h4>DGD-SOE</h4>
                    <p>Distúrbio global do desenvolvimento sem outra especificação: apresenta dificuldades de comunicação, mas não preenche todos os critérios para os outros tipos.</p>
                </div>
            </div>
        </div>

        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/fokyS8KVC6c" title="Autismo: causas, sintomas, diagnóstico, tratamento" allowfullscreen></iframe>
        </div>

        <div class="content-box">
            <h2 class="section-title">Como é feito o Diagnóstico?</h2>
            <p class="text-content">
                O diagnóstico é clínico, realizado por uma equipe multidisciplinar (médicos, psicólogos, psiquiatras). Não existe exame de sangue para autismo.
            </p>
            <ul style="padding-left: 20px; margin-top: 10px;">
                <li style="margin-bottom: 10px;"><strong>Em Crianças:</strong> Envolve entrevistas com pais e observação do comportamento e brincadeiras da criança.</li>
                <li><strong>Em Adultos:</strong> Avaliações com especialistas sobre sintomas identificados e histórico de comunicação.</li>
            </ul>
        </div>

        <div class="content-box" style="background: #eef2ff;">
            <h2 class="section-title">Tratamento e Prevenção</h2>
            <p class="text-content">
                <strong>Não há cura</strong>, pois o autismo não é uma doença. O tratamento visa desenvolver habilidades e autonomia.
            </p>
            <p class="text-content">
                O acompanhamento é individualizado e pode incluir terapia ocupacional, fonoaudiologia e apoio psicoeducativo para a família. <strong>Não existe forma de prevenir o TEA</strong>, mas o diagnóstico precoce melhora muito o desenvolvimento.
            </p>
        </div>

    </div>

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