<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul | Meu Perfil</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* --- CONFIGURAÇÕES GERAIS --- */
        :root {
            --primary: #2563eb;       /* Azul Vibrante */
            --primary-dark: #1e40af;  /* Azul Escuro */
            --secondary: #1e3a8a;     /* Azul Marinho */
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

        /* --- NAVBAR (Igualzinha a Home) --- */
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
            display: flex; align-items: center; gap: 8px;
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

        /* --- BOTÃO DE PERFIL (Personalizado) --- */
        .btn-profile {
            background-color: var(--primary); /* FUNDO AZUL */
            color: white !important;          /* LETRA BRANCA */
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
            transition: transform 0.2s, background-color 0.2s;
        }

        .btn-profile:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-logout {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.9rem;
            transition: 0.3s;
            font-family: 'Nunito', sans-serif;
        }

        .btn-logout:hover {
            background-color: #eff6ff;
        }

        /* --- CARD DE PERFIL --- */
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .profile-card {
            background: var(--white);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        /* Cabeçalho do Card */
        .profile-header {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            padding: 50px 20px;
            text-align: center;
            color: white;
        }

        .avatar-circle {
            width: 120px; height: 120px;
            background: var(--white);
            color: var(--primary);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 3rem; font-weight: 800;
            margin: 0 auto 15px;
            border: 5px solid rgba(255,255,255,0.3);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .profile-body { padding: 40px; }

        .section-title {
            color: var(--secondary);
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 25px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
        .full-width { grid-column: 1 / -1; }

        .form-group label {
            display: block; margin-bottom: 8px; color: var(--secondary); font-weight: 700;
        }

        .form-control {
            width: 100%; padding: 12px 15px;
            border: 2px solid #e2e8f0; border-radius: 12px;
            font-size: 1rem; color: var(--text-body);
            font-family: 'Nunito', sans-serif;
        }

        .btn-save {
            background-color: var(--primary); color: white;
            border: none; padding: 15px 40px;
            border-radius: 50px; font-weight: 800; cursor: pointer;
            font-size: 1.1rem; display: block; margin: 30px auto 0;
            transition: 0.3s;
        }
        .btn-save:hover { background-color: var(--primary-dark); transform: translateY(-2px); }

        .alert-success {
            background-color: #dcfce7; color: #166534; padding: 15px; 
            border-radius: 10px; margin-bottom: 20px; text-align: center; border: 1px solid #bbf7d0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .nav-links { display: none; } /* Em mobile, esconderia o menu */
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">
            <i class="fas fa-puzzle-piece"></i> Mundo<span>Azul</span>
        </a>
        
        <div class="nav-links">
            <a href="{{ url('/sobre') }}">Sobre o TEA</a>
            <a href="{{ url('/comunidade') }}">Comunidade</a>
            <a href="{{ url('/exercicios') }}">Atividades</a>
            <a href="{{ url('/videos') }}">Vídeos</a>

            @auth
            <div style="display: flex; align-items: center; gap: 10px;">
                <a href="{{ route('perfil.index') }}" class="btn-profile">
                    <i class="fas fa-user-circle"></i> 
                    {{ Auth::user()->name ? explode(' ', Auth::user()->name)[0] : 'Usuário' }}
                </a>

                <form action="{{ route('auth.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Sair</button>
                </form>
            </div>
            @endauth
        </div>
    </nav>

    <div class="container">
        
        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="profile-card">
            <div class="profile-header">
                <div class="avatar-circle">
                    {{ Auth::user()->name ? substr(Auth::user()->name, 0, 1) : 'U' }}
                </div>
                <h1 style="margin: 0;">{{ Auth::user()->name }}</h1>
                <p style="opacity: 0.9;">{{ Auth::user()->email }}</p>
            </div>

            <div class="profile-body">
                <h3 class="section-title"><i class="fas fa-id-card"></i> Meus Dados</h3>
                
                <form action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Nome Completo</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label><i class="fab fa-whatsapp"></i> Telefone</label>
                            <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" placeholder="(11) 99999-9999">
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-map-marker-alt"></i> Cidade / Estado</label>
                            <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" placeholder="Ex: São Paulo - SP">
                        </div>
                    </div>

                    <button type="submit" class="btn-save">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>