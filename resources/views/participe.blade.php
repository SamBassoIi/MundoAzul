<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul | Acesso</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ... (Use o mesmo CSS que você já aprovou na mensagem anterior) ... */
        /* Vou resumir o CSS aqui para não ficar gigante, mas mantenha o seu CSS completo */
        :root { --primary: #2563eb; --secondary: #1e3a8a; --bg-light: #f0f9ff; --white: #ffffff; }
        body { font-family: 'Nunito', sans-serif; background: linear-gradient(135deg, var(--bg-light) 0%, #dbeafe 100%); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .auth-container { background: var(--white); width: 100%; max-width: 450px; border-radius: 24px; box-shadow: 0 10px 40px rgba(37, 99, 235, 0.1); overflow: hidden; position: relative; }
        .auth-header { text-align: center; padding: 30px 30px 10px; }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary); text-decoration: none; display: inline-flex; align-items: center; gap: 8px; margin-bottom: 10px; }
        .logo span { color: var(--secondary); }
        .auth-tabs { display: flex; border-bottom: 1px solid #e2e8f0; margin-top: 20px; }
        .tab-btn { flex: 1; background: none; border: none; padding: 15px; font-weight: 700; color: #94a3b8; cursor: pointer; transition: 0.3s; border-bottom: 3px solid transparent; }
        .tab-btn.active { color: var(--primary); border-bottom-color: var(--primary); background-color: #f8fafc; }
        .auth-body { padding: 30px; }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 8px; color: var(--secondary); font-weight: 600; font-size: 0.9rem; }
        .input-wrapper { position: relative; }
        .input-wrapper i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .form-input { width: 100%; padding: 12px 15px 12px 45px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 1rem; outline: none; }
        .form-input:focus { border-color: var(--primary); }
        .btn-submit { width: 100%; background-color: var(--primary); color: white; border: none; padding: 14px; border-radius: 12px; font-weight: 700; cursor: pointer; margin-top: 10px; }
        .btn-google { width: 100%; background-color: white; border: 1px solid #e2e8f0; padding: 12px; border-radius: 12px; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 10px; cursor: pointer; text-decoration: none; color: #374151; }
        .error-msg { color: #ef4444; font-size: 0.85rem; margin-top: 5px; font-weight: 600; }
        .form-section { display: none; }
        .form-section.active { display: block; }
        .back-link { position: absolute; top: 20px; left: 20px; text-decoration: none; color: var(--secondary); font-weight: 700; background: white; padding: 10px 20px; border-radius: 50px; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

    <a href="{{ url('/') }}" class="back-link"><i class="fas fa-arrow-left"></i> Voltar</a>

    <div class="auth-container">
        
        <div class="auth-header">
            <a href="{{ url('/') }}" class="logo"><i class="fas fa-puzzle-piece"></i> Mundo<span>Azul</span></a>
            <p id="header-desc">Bem-vindo de volta! Acesse sua conta.</p>
        </div>

        <div class="auth-tabs">
            <button class="tab-btn active" onclick="switchTab('login')">Entrar</button>
            <button class="tab-btn" onclick="switchTab('register')">Criar Conta</button>
        </div>

        <div class="auth-body">
            
            <div id="form-login" class="form-section active">
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">E-mail</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" class="form-input" placeholder="seu@email.com" required>
                        </div>
                        @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Senha</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" class="form-input" placeholder="Sua senha" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit">Entrar</button>
                </form>
            </div>

            <div id="form-register" class="form-section">
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nome Completo</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" name="name" class="form-input" placeholder="Seu nome" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">E-mail</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" class="form-input" placeholder="seu@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Senha</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" class="form-input" placeholder="Mínimo 6 caracteres" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirmar Senha</label>
                        <div class="input-wrapper">
                            <i class="fas fa-check-circle"></i>
                            <input type="password" name="password_confirmation" class="form-input" placeholder="Repita a senha" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit">Criar Conta</button>
                </form>
            </div>

            <div style="text-align: center; margin: 25px 0; position: relative;">
                <hr style="border: 0; border-top: 1px solid #e2e8f0;">
                <span style="background: white; padding: 0 10px; color: #94a3b8; font-size: 0.85rem; position: absolute; top: -10px; left: 50%; transform: translateX(-50%);">ou continue com</span>
            </div>

            <a href="{{ route('auth.google') }}" class="btn-google">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="20" height="20" alt="Google">
                Google
            </a>

        </div>
    </div>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.form-section').forEach(form => form.classList.remove('active'));

            if (tab === 'login') {
                document.querySelectorAll('.tab-btn')[0].classList.add('active');
                document.getElementById('form-login').classList.add('active');
                document.getElementById('header-desc').innerText = "Bem-vindo de volta! Acesse sua conta.";
            } else {
                document.querySelectorAll('.tab-btn')[1].classList.add('active');
                document.getElementById('form-register').classList.add('active');
                document.getElementById('header-desc').innerText = "Junte-se à comunidade Mundo Azul!";
            }
        }
    </script>
</body>
</html>