<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul | Contato</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #1e3a8a;
            --accent: #f59e0b;
            --bg-light: #f0f9ff;
            --white: #ffffff;
            --text-body: #475569;
            --border-color: #e2e8f0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

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

        .logo { font-weight: 800; font-size: 1.6rem; color: var(--primary); text-decoration: none; display: flex; align-items: center; gap: 8px; }
        .logo span { color: var(--secondary); }
        .nav-links { display: flex; align-items: center; gap: 30px; }
        .nav-links a { text-decoration: none; color: var(--secondary); font-weight: 700; transition: 0.3s; }
        .nav-links a:hover { color: var(--primary); }
        
        .btn-profile { background-color: var(--primary); color: white !important; padding: 8px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 0.95rem; }
        .btn-login { background-color: var(--primary); color: white !important; padding: 10px 25px; border-radius: 50px; transition: 0.2s; font-weight: bold; }

        /* --- EQUIPE --- */
        .team-section { padding: 80px 20px; max-width: 1200px; margin: 0 auto; text-align: center; }
        .section-header h1 { color: var(--secondary); font-size: 2.5rem; font-weight: 800; margin-bottom: 15px; }
        .section-header p { max-width: 700px; margin: 0 auto 60px; font-size: 1.1rem; color: #64748b; }

        .team-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 30px; justify-content: center; }
        .team-card { background: var(--white); border-radius: 24px; padding: 30px 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid var(--border-color); transition: transform 0.3s; display: flex; flex-direction: column; align-items: center; }
        .team-card:hover { transform: translateY(-10px); border-color: var(--primary); }
        .member-photo { width: 130px; height: 130px; border-radius: 50%; object-fit: cover; border: 4px solid var(--bg-light); margin-bottom: 20px; background-color: #cbd5e1; }
        .member-name { color: var(--secondary); font-weight: 800; font-size: 1.2rem; margin-bottom: 5px; }
        .member-role { color: var(--primary); font-size: 0.9rem; font-weight: 700; text-transform: uppercase; margin-bottom: 15px; }
        .social-links { display: flex; gap: 10px; }
        .social-btn { width: 35px; height: 35px; border-radius: 50%; background: var(--bg-light); color: var(--secondary); display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.2s; }
        .social-btn:hover { background: var(--primary); color: white; }

        /* --- CONTATO --- */
        .contact-section-dark { background-color: var(--secondary); color: white; padding: 80px 20px; margin-top: 60px; border-radius: 50px 50px 0 0; }
        .contact-container { max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
        .contact-text h2 { font-size: 2.5rem; margin-bottom: 20px; font-weight: 800; }
        .contact-text p { font-size: 1.1rem; opacity: 0.9; margin-bottom: 30px; line-height: 1.8; }
        .contact-info-item { display: flex; align-items: center; gap: 15px; margin-bottom: 20px; font-size: 1.05rem; }
        .contact-info-item i { color: var(--accent); font-size: 1.2rem; width: 30px; }

        .dark-form { background: rgba(255,255,255,0.05); padding: 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); }
        .dark-input, .dark-textarea { width: 100%; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; padding: 12px 15px; border-radius: 10px; font-family: 'Nunito', sans-serif; font-size: 1rem; margin-bottom: 20px; outline: none; }
        .dark-input::placeholder, .dark-textarea::placeholder { color: rgba(255,255,255,0.6); }
        .dark-input:focus, .dark-textarea:focus { background: rgba(255,255,255,0.2); border-color: white; }
        .dark-textarea { height: 120px; resize: none; }
        .btn-contact { width: 100%; background-color: var(--accent); color: var(--secondary); border: none; padding: 15px; border-radius: 10px; font-weight: 800; font-size: 1.1rem; cursor: pointer; transition: 0.2s; }
        .btn-contact:hover { background-color: #ffffff; transform: translateY(-2px); }

        /* FOOTER */
        .main-footer { background-color: #172554; color: rgba(255,255,255,0.6); text-align: center; padding: 30px; font-size: 0.9rem; }
        .footer-links { margin-bottom: 15px; }
        .footer-links a { color: white; text-decoration: none; margin: 0 10px; font-weight: 600; }
        .footer-links a:hover { text-decoration: underline; }

        /* MENSAGEM SUCESSO */
        .alert-success { background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; font-weight: bold; }

        @media (max-width: 768px) { 
            .contact-container { grid-template-columns: 1fr; } 
            .nav-links { display: none; } 
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
    <a href="{{ url('/sobre') }}">Sobre o TEA</a>
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

    <section class="team-section">
        <div class="section-header">
            <h1>Quem Faz o Mundo Azul</h1>
            <p>Conheça os alunos da ETEC de Itaquera responsáveis pelo desenvolvimento deste projeto de TCC.</p>
        </div>
        
        <div class="team-grid">
            <div class="team-card">
                <img src="{{ asset('images/equipe/anny.jpg') }}" class="member-photo" onerror="this.src='https://ui-avatars.com/api/?name=Anny+Marie&background=random&color=fff&background=2563eb'">
                <h3 class="member-name">Anny Marie</h3>
                <span class="member-role">Coordenadora</span>
                <div class="social-links">
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/annymarie" class="social-btn"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/mmarieanny/" class="social-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('images/equipe/carlos.jpeg') }}" class="member-photo" onerror="this.src='https://ui-avatars.com/api/?name=Carlos+Gabriel&background=random&color=fff&background=2563eb'">
                <h3 class="member-name">Carlos Gabriel</h3>
                <span class="member-role">Designer</span>
                <div class="social-links">
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
                     <a href="https://www.instagram.com/gabrielxx_galindo/" class="social-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('images/equipe/gabi.jpeg') }}" class="member-photo" onerror="this.src='https://ui-avatars.com/api/?name=Gabrielle+Jorge&background=random&color=fff&background=2563eb'">
                <h3 class="member-name">Gabrielle Jorge</h3>
                <span class="member-role">Designer</span>
                <div class="social-links">
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/gabiih.dcj/" class="social-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('images/equipe/guilherme.jpg') }}" class="member-photo" onerror="this.src='https://ui-avatars.com/api/?name=Guilherme+Carmo&background=random&color=fff&background=2563eb'">
                <h3 class="member-name">Guilherme Carmo</h3>
                <span class="member-role">Arquiteto BD</span>
                <div class="social-links">
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/GuilhermedeSouzaCarmo" class="social-btn"><i class="fab fa-github"></i></a>
                     <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('images/equipe/lucas.jpg') }}" class="member-photo" onerror="this.src='https://ui-avatars.com/api/?name=Lucas+Watanabe&background=random&color=fff&background=2563eb'">
                <h3 class="member-name">Lucas Watanabe</h3>
                <span class="member-role">Desenvolvedor</span>
                <div class="social-links">
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/watanabelucas" class="social-btn"><i class="fab fa-github"></i></a>
                     <a href="https://www.instagram.com/alves.watanabe/" class="social-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('images/equipe/Bassoli.jpg') }}" class="member-photo" onerror="this.src='https://ui-avatars.com/api/?name=Samuel+Bassoli&background=random&color=fff&background=2563eb'">
                <h3 class="member-name">Samuel Bassoli</h3>
                <span class="member-role">Desenvolvedor</span>
                <div class="social-links">
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/SammBassoli" class="social-btn"><i class="fab fa-github"></i></a>
                     <a href="https://www.instagram.com/samm_oliveira/" class="social-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('images/equipe/victor.jpeg') }}" class="member-photo" onerror="this.src='https://ui-avatars.com/api/?name=Victor+Hugo&background=random&color=fff&background=2563eb'">
                <h3 class="member-name">Victor Hugo</h3>
                <span class="member-role">Marketing</span>
                <div class="social-links">
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
                     <a href="https://www.instagram.com/vittorhsr/" class="social-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section-dark">
        <div class="contact-container">
            
            <div class="contact-text">
                <h2>Entre em Contato</h2>
                <p>Tem alguma dúvida, sugestão ou quer saber mais sobre o projeto Mundo Azul? Ficaremos felizes em ouvir você.</p>
                
                <div class="contact-info-item">
                    <i class="fas fa-envelope"></i>
                    <span>contato@mundoazul.etec.br</span>
                </div>
                <div class="contact-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>ETEC de Itaquera - SP</span>
                </div>
            </div>

            <div class="dark-form">
                
                @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contato.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="dark-input" placeholder="Seu Nome" required>
                    <input type="email" name="email" class="dark-input" placeholder="Seu E-mail" required>
                    <textarea name="message" class="dark-textarea" placeholder="Sua Mensagem" required></textarea>
                    <button type="submit" class="btn-contact">Fale Conosco</button>
                </form>

            </div>

        </div>
    </section>

    <footer class="main-footer">
        <div class="footer-links">
            <a href="{{ url('/') }}">Início</a>
            <a href="{{ url('/sobre') }}">Sobre</a>
            <a href="{{ url('/exercicios') }}">Recursos</a>
            <a href="{{ url('/comunidade') }}">Comunidade</a>
        </div>
        <p>&copy; 2025 Mundo Azul - Todos os direitos reservados.</p>
    </footer>

</body>
</html>