<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Azul | Atividades</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb; --primary-dark: #1e40af; --secondary: #1e3a8a;
            --accent: #f59e0b; --success: #22c55e; --wrong: #ef4444;
            --bg-light: #f0f9ff; --white: #ffffff; --text-body: #475569;
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
        .btn-login { background: var(--primary); color: white !important; padding: 10px 25px; border-radius: 50px; transition: 0.2s; }

        /* LAYOUT */
        .container { max-width: 1200px; margin: 0 auto; padding: 30px 20px; display: grid; grid-template-columns: 280px 1fr; gap: 30px; min-height: 80vh; }
        
        /* SIDEBAR */
        .sidebar-card { background: var(--white); border-radius: 16px; padding: 25px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); border: 1px solid var(--border-color); position: sticky; top: 100px; }
        .sidebar-title { color: var(--secondary); font-weight: 800; margin-bottom: 20px; font-size: 1.2rem; }
        .menu-btn { width: 100%; background: none; border: none; padding: 15px; text-align: left; font-size: 1rem; font-weight: 700; color: var(--text-body); cursor: pointer; border-radius: 12px; transition: 0.2s; display: flex; align-items: center; gap: 12px; margin-bottom: 8px; font-family: 'Nunito', sans-serif; }
        .menu-btn:hover { background: var(--bg-light); color: var(--primary); }
        .menu-btn.active { background: #eff6ff; color: var(--primary); box-shadow: inset 3px 0 0 var(--primary); }

        /* GAME AREA */
        .game-card { background: var(--white); border-radius: 20px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid var(--border-color); display: none; animation: fadeIn 0.4s ease; min-height: 500px; position: relative; }
        .game-card.active { display: block; }
        .game-header { text-align: center; margin-bottom: 40px; }
        .game-header h2 { color: var(--secondary); font-size: 2rem; font-weight: 800; margin-bottom: 10px; }
        .score-board { position: absolute; top: 20px; right: 20px; background: #fffbeb; color: #d97706; padding: 5px 15px; border-radius: 50px; font-weight: bold; border: 1px solid #fcd34d; }

        /* COMPONENTS */
        .options-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 25px; }
        .btn-option { background: white; border: 3px solid #e2e8f0; border-radius: 20px; padding: 20px; font-size: 1.2rem; font-weight: 700; color: var(--text-body); cursor: pointer; transition: all 0.2s; display: flex; flex-direction: column; align-items: center; gap: 15px; height: 100%; justify-content: center; }
        .btn-option:hover { border-color: var(--primary); transform: translateY(-5px); }
        .emoji-lg { font-size: 4rem; line-height: 1; }

        .sound-btn { background: var(--accent); color: white; width: 100px; height: 100px; border-radius: 50%; border: none; font-size: 3rem; cursor: pointer; margin: 0 auto 40px auto; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 0 #d97706; transition: 0.1s; }
        .sound-btn:active { transform: translateY(4px); box-shadow: 0 4px 0 #d97706; }

        /* DRAG & DROP */
        .drop-zones { display: flex; gap: 20px; margin-bottom: 40px; }
        .zone { flex: 1; min-height: 220px; border: 3px dashed #cbd5e1; border-radius: 20px; background: #f8fafc; display: flex; flex-direction: column; align-items: center; padding: 20px; }
        .zone-label { background: var(--secondary); color: white; padding: 8px 20px; border-radius: 50px; font-weight: 700; margin-bottom: 20px; }
        .draggables-area { background: #f1f5f9; padding: 20px; border-radius: 20px; display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; min-height: 100px; }
        .draggable-item { background: white; padding: 12px 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); cursor: grab; font-weight: 700; font-size: 1.1rem; border: 2px solid transparent; }
        
        /* SEQUENCING */
        .sequence-container { display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 40px; flex-wrap: wrap; }
        .sequence-slot { width: 110px; height: 110px; border: 3px solid #cbd5e1; border-radius: 16px; background: #f8fafc; display: flex; justify-content: center; align-items: center; font-size: 2rem; color: #94a3b8; font-weight: 800; }

        /* CATALOGO DE IMPRESSÃO (VISUAL) */
        .catalog-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; }
        .catalog-card { background: white; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; transition: 0.3s; display: flex; flex-direction: column; height: 100%; }
        .catalog-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.08); }
        .catalog-img { height: 180px; width: 100%; object-fit: cover; border-bottom: 1px solid #e2e8f0; }
        .catalog-content { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
        .catalog-title { color: var(--secondary); font-size: 1.1rem; margin-bottom: 8px; font-weight: 800; }
        .catalog-desc { font-size: 0.9rem; color: #64748b; margin-bottom: 15px; flex-grow: 1; }
        .btn-download { background: var(--secondary); color: white; text-decoration: none; padding: 10px; border-radius: 8px; text-align: center; font-weight: bold; font-size: 0.9rem; display: block; transition: 0.2s; margin-top: auto; }
        .btn-download:hover { background: var(--primary); }

        /* FEEDBACK */
        .correct-glow { border-color: var(--success) !important; background: #dcfce7 !important; }
        .wrong-shake { animation: shake 0.4s; border-color: var(--wrong) !important; background: #fee2e2 !important; }
        
        /* MODAL & BUTTONS */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(30, 58, 138, 0.4); backdrop-filter: blur(4px); display: none; justify-content: center; align-items: center; z-index: 2000; }
        .modal-content { background: white; padding: 40px; border-radius: 24px; text-align: center; animation: popIn 0.3s; max-width: 400px; width: 90%; box-shadow: 0 20px 50px rgba(0,0,0,0.2); }
        .btn-next { background: var(--success); color: white; border: none; padding: 12px 30px; border-radius: 50px; font-size: 1.1rem; font-weight: 700; cursor: pointer; margin-top: 20px; }
        .btn-reset { background: #64748b; color: white; border: none; padding: 10px 25px; border-radius: 50px; font-size: 1rem; font-weight: 700; cursor: pointer; margin-right: 10px; }
        .btn-reset:hover { background: #475569; }

        @media (max-width: 768px) { .container { grid-template-columns: 1fr; } .sidebar-card, .nav-links { display: none; } }
        @keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-5px); } 75% { transform: translateX(5px); } }
        @keyframes popIn { from { transform: scale(0.8); } to { transform: scale(1); } }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo"><i class="fas fa-puzzle-piece"></i> Mundo<span>Azul</span></a>
        <div class="nav-links">
            <a href="{{ url('/sobre') }}">Sobre</a>
            <a href="{{ url('/comunidade') }}">Comunidade</a>
            <a href="{{ url('/exercicios') }}" class="active">Atividades</a>
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

    <div class="container">
        <aside>
            <div class="sidebar-card">
                <div class="sidebar-title"><i class="fas fa-gamepad"></i> Escolha o Jogo</div>
                <button class="menu-btn active" onclick="switchGame('audio')"><i class="fas fa-music" style="color: #f59e0b;"></i> Sons</button>
                <button class="menu-btn" onclick="switchGame('vocab')"><i class="fas fa-shapes" style="color: #3b82f6;"></i> Vocabulário</button>
                <button class="menu-btn" onclick="switchGame('cat')"><i class="fas fa-boxes" style="color: #8b5cf6;"></i> Categorias</button>
                <button class="menu-btn" onclick="switchGame('seq')"><i class="fas fa-list-ol" style="color: #10b981;"></i> Rotina</button>
                <button class="menu-btn" onclick="switchGame('emotion')"><i class="fas fa-smile" style="color: #ef4444;"></i> Emoções</button>
                
                <hr style="margin: 15px 0; border: 0; border-top: 1px solid #e2e8f0;">
                <button class="menu-btn" onclick="switchGame('print')"><i class="fas fa-print" style="color: #475569;"></i> Para Imprimir</button>
            </div>
        </aside>

        <main class="game-area">
            <div id="game-container" class="game-card active">
                <div class="score-board">Estrelas: <span id="star-count">0</span> ⭐</div>
                <div class="game-header">
                    <h2 id="game-title">Carregando...</h2>
                    <p id="game-instruction">...</p>
                </div>
                <div id="game-content"></div>
                <div id="game-controls" style="text-align: center; margin-top: 20px; display:none;">
                    <button class="btn-reset" onclick="renderGame()">Reiniciar Tabela</button>
                    <button class="btn-next" onclick="checkCurrentGame()">Verificar</button>
                </div>
            </div>
        </main>
    </div>

    <div id="feedbackModal" class="modal-overlay">
        <div class="modal-content">
            <span class="modal-icon" id="modalIcon" style="font-size: 4rem;">🎉</span>
            <h2 class="modal-title" id="modalTitle">Muito Bem!</h2>
            <button class="btn-next" onclick="nextLevel()">Próximo Desafio ➜</button>
        </div>
    </div>

<script>
    function shuffleArray(array) {
        let currentIndex = array.length, randomIndex;
        while (currentIndex != 0) {
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;
            [array[currentIndex], array[randomIndex]] = [array[randomIndex], array[currentIndex]];
        }
        return array;
    }

    const DB = {
        audio: [
            { target: 'Cachorro', sound: 'Au au au!', options: [['🐶','Cachorro'], ['🐱','Gato'], ['🐦','Pássaro']] },
            { target: 'Gato', sound: 'Miau miau!', options: [['🐱','Gato'], ['🦁','Leão'], ['🐸','Sapo']] },
            { target: 'Vaca', sound: 'Muuuuu!', options: [['🐮','Vaca'], ['🐷','Porco'], ['🐔','Galinha']] },
            { target: 'Pato', sound: 'Quack quack!', options: [['🦆','Pato'], ['🦅','Águia'], ['🦉','Coruja']] },
            { target: 'Trem', sound: 'Piuííí!', options: [['🚂','Trem'], ['🚗','Carro'], ['✈️','Avião']] },
            { target: 'Polícia', sound: 'Ui uiii ui uiii!', options: [['🚓','Polícia'], ['🚑','Ambulância'], ['🚒','Bombeiro']] },
        ],
        vocab: [
            { target: 'Maçã', options: [['🍎','Maçã'], ['🍌','Banana'], ['🍇','Uva'], ['🍓','Morango']] },
            { target: 'Bola', options: [['⚽','Bola'], ['🪁','Pipa'], ['🎮','Videogame'], ['🧸','Urso']] },
            { target: 'Carro', options: [['🚗','Carro'], ['🚌','Ônibus'], ['🚲','Bicicleta'], ['🛵','Moto']] },
            { target: 'Casa', options: [['🏠','Casa'], ['🏢','Prédio'], ['⛺','Tenda'], ['🏰','Castelo']] },
            { target: 'Sol', options: [['☀️','Sol'], ['🌙','Lua'], ['☁️','Nuvem'], ['⭐','Estrela']] },
            { target: 'Árvore', options: [['🌳','Árvore'], ['🌷','Flor'], ['🌵','Cacto'], ['🍄','Cogumelo']] },
        ],
        cat: [
            { labelA: 'Comida', labelB: 'Animais', catA: 'food', catB: 'animal', items: [ ['🍌','food'], ['🐱','animal'], ['🍕','food'], ['🐶','animal'], ['🍎','food'], ['🦁','animal'] ] },
            { labelA: 'Frutas', labelB: 'Legumes', catA: 'fruit', catB: 'veg', items: [ ['🍇','fruit'], ['🥕','veg'], ['🍓','fruit'], ['🥦','veg'], ['🍉','fruit'], ['🌽','veg'] ] },
            { labelA: 'Brinquedos', labelB: 'Roupas', catA: 'toy', catB: 'cloth', items: [ ['🧸','toy'], ['👕','cloth'], ['🚗','toy'], ['👖','cloth'], ['⚽','toy'], ['👗','cloth'] ] },
            { labelA: 'Céu', labelB: 'Mar', catA: 'sky', catB: 'sea', items: [ ['☀️','sky'], ['🐟','sea'], ['🐦','sky'], ['🐬','sea'], ['✈️','sky'], ['🦀','sea'] ] },
        ],
        seq: [
            { title: 'Escovar os Dentes', steps: [ {o:1, t:'🧴 Pasta'}, {o:2, t:'🪥 Escovar'}, {o:3, t:'💧 Enxaguar'} ] },
            { title: 'Lavar as Mãos', steps: [ {o:1, t:'🧼 Sabão'}, {o:2, t:'🙌 Esfregar'}, {o:3, t:'🧻 Secar'} ] },
            { title: 'Calçar Sapatos', steps: [ {o:1, t:'🧦 Meia'}, {o:2, t:'👟 Tênis'}, {o:3, t:'🎀 Amarrar'} ] },
            { title: 'Plantar', steps: [ {o:1, t:'🌱 Semente'}, {o:2, t:'💧 Água'}, {o:3, t:'🌻 Flor'} ] },
        ],
        emotion: [
            { context: 'Ganhou um presente 🎁', emoji: '🎁', target: 'Feliz', options: [['😄','Feliz'], ['😢','Triste'], ['😠','Bravo']] },
            { context: 'Caiu o sorvete 🍦', emoji: '🍦⬇️', target: 'Triste', options: [['😄','Feliz'], ['😢','Triste'], ['😠','Bravo']] },
            { context: 'Quebrou o brinquedo 🧸', emoji: '🧸💔', target: 'Bravo', options: [['😴','Sono'], ['😢','Triste'], ['😠','Bravo']] },
            { context: 'Viu um fantasma 👻', emoji: '👻', target: 'Assustado', options: [['😱','Assustado'], ['😄','Feliz'], ['😴','Sono']] },
        ],
        // --- CATÁLOGO DE IMPRESSÃO COM FOTOS REAIS ---
        print: [
            { title: 'Coordenação Motora', desc: 'Atividades de pontilhados e traços.', img: 'https://mundoindica.com/wp-content/uploads/2023/04/Atividade-de-Coordenacao-Motora-Ajude-o-Bombeiro.jpg', link: 'https://mundoindica.com/wp-content/uploads/2023/04/Atividade-de-Coordenacao-Motora-Ajude-o-Bombeiro.jpg' },
            { title: 'Pareamento e Formas', desc: 'Quebra-cabeças e formas.', img: 'https://mundoindica.com/wp-content/uploads/2024/03/Atividade-de-Quebra-cabeca-Matematico-para-Autistas-para-Imprimir.jpg', link: 'hhttps://mundoindica.com/wp-content/uploads/2024/03/Atividade-de-Quebra-cabeca-Matematico-para-Autistas-para-Imprimir.jpg' },
            { title: 'Cartões de Emoções', desc: 'Cards para imprimir e recortar.', img: 'https://mundoindica.com/wp-content/uploads/2025/01/Atividade-para-Trabalhar-com-Emocoes-e-Sentimentos-em-Criancas-com-Autismo.jpg', link: 'https://mundoindica.com/wp-content/uploads/2025/01/Atividade-para-Trabalhar-com-Emocoes-e-Sentimentos-em-Criancas-com-Autismo.jpg' },
            { title: 'Números e Quantidade', desc: 'Associe o número aos objetos.', img: 'https://mundoindica.com/wp-content/uploads/2024/04/Atividade-Pinte-os-Numeros-de-Acordo-com-a-Legenda-para-Autismo-para-Imprimir.jpg', link: 'https://mundoindica.com/wp-content/uploads/2024/04/Atividade-Pinte-os-Numeros-de-Acordo-com-a-Legenda-para-Autismo-para-Imprimir.jpg' },
            { title: 'Rotina Visual', desc: 'Pictogramas para quadro de rotina.', img: 'https://mundoindica.com/wp-content/uploads/2024/05/Atividade-de-Percepcao-Visual-Encontre-e-Circule-a-Imagem-Intrusa-do-Lado-Direito-para-Alunos-com-Autismo-para-Imprimir.jpg', link: 'https://mundoindica.com/wp-content/uploads/2024/05/Atividade-de-Percepcao-Visual-Encontre-e-Circule-a-Imagem-Intrusa-do-Lado-Direito-para-Alunos-com-Autismo-para-Imprimir.jpg' },
            { title: 'Alfabeto Ilustrado', desc: 'Letras e figuras para colorir.', img: 'https://mundoindica.com/wp-content/uploads/2024/03/Atividade-Pinte-as-Letras-do-Alfabeto-para-Autismo-para-Imprimir.jpg', link: 'https://mundoindica.com/wp-content/uploads/2024/03/Atividade-Pinte-as-Letras-do-Alfabeto-para-Autismo-para-Imprimir.jpg' },
        ]
    };

    let currentGameMode = 'audio';
    let currentLevelIndex = 0;
    let stars = 0;

    function switchGame(mode) {
        currentGameMode = mode;
        if (mode !== 'print') {
            currentLevelIndex = Math.floor(Math.random() * DB[mode].length);
        }
        updateUI();
        renderGame();
        
        document.querySelectorAll('.menu-btn').forEach(btn => btn.classList.remove('active'));
        event.target.closest('button').classList.add('active');
    }

    function updateUI() {
        const titles = { audio: 'Quem faz esse som?', vocab: 'Encontre o Objeto', cat: 'Organize as Coisas', seq: 'Qual a Ordem?', emotion: 'Como ele se sente?', print: 'Catálogo de Atividades' };
        const instructions = { 
            audio: 'Clique no botão laranja para ouvir e depois escolha a imagem correta.',
            vocab: 'Leia o nome acima e clique no emoji correspondente.',
            cat: 'Arraste cada item para a caixa correta.',
            seq: 'Arraste os passos para formar a sequência correta (1, 2, 3).',
            emotion: 'Olhe a situação e diga qual a emoção.',
            print: 'Escolha um material abaixo para visualizar e salvar.'
        };
        document.getElementById('game-title').innerText = titles[currentGameMode];
        document.getElementById('game-instruction').innerText = instructions[currentGameMode];
        document.querySelector('.score-board').style.display = currentGameMode === 'print' ? 'none' : 'block';
    }

    function renderGame() {
        const container = document.getElementById('game-content');
        container.innerHTML = '';
        document.getElementById('game-controls').style.display = 'none';

        if (currentGameMode === 'print') {
            container.innerHTML = `
                <div class="catalog-grid">
                    ${DB.print.map(item => `
                        <div class="catalog-card">
                            <img src="${item.img}" class="catalog-img" alt="${item.title}">
                            <div class="catalog-content">
                                <h3 class="catalog-title">${item.title}</h3>
                                <p class="catalog-desc">${item.desc}</p>
                                <a href="${item.link}" target="_blank" download class="btn-download">
                                    <i class="fas fa-download"></i> Baixar Imagem
                                </a>
                            </div>
                        </div>
                    `).join('')}
                </div>
            `;
            return;
        }

        const data = DB[currentGameMode];
        const levelData = data[currentLevelIndex % data.length];

        if(currentGameMode === 'audio') {
            const shuffledOptions = shuffleArray([...levelData.options]);
            
            container.innerHTML = `
                <button class="sound-btn" onclick="playText('${levelData.sound}')"><i class="fas fa-volume-up"></i></button>
                <div class="options-grid">
                    ${shuffledOptions.map(opt => `
                        <div class="btn-option" onclick="checkGeneric('${opt[1]}', '${levelData.target}', this)">
                            <span class="emoji-lg">${opt[0]}</span><span>${opt[1]}</span>
                        </div>
                    `).join('')}
                </div>
            `;
        } 
        else if (currentGameMode === 'vocab') {
            const shuffledOptions = shuffleArray([...levelData.options]);

            container.innerHTML = `
                <div style="text-align:center; margin-bottom:30px;">
                    <h1 style="font-size:3rem; color:var(--primary);">${levelData.target}</h1>
                </div>
                <div class="options-grid">
                    ${shuffledOptions.map(opt => `
                        <div class="btn-option" onclick="checkGeneric('${opt[1]}', '${levelData.target}', this)">
                            <span class="emoji-lg">${opt[0]}</span>
                        </div>
                    `).join('')}
                </div>
            `;
        }
        else if (currentGameMode === 'cat') {
            const shuffledItems = levelData.items.sort(() => 0.5 - Math.random()).slice(0,4);
            container.innerHTML = `
                <div class="drop-zones">
                    <div class="zone" ondrop="drop(event, '${levelData.catA}')" ondragover="allowDrop(event)">
                        <div class="zone-label" style="background:#f59e0b;">${levelData.labelA}</div>
                    </div>
                    <div class="zone" ondrop="drop(event, '${levelData.catB}')" ondragover="allowDrop(event)">
                        <div class="zone-label" style="background:#3b82f6;">${levelData.labelB}</div>
                    </div>
                </div>
                <div class="draggables-area" id="drag-area">
                    ${shuffledItems.map((item, i) => `
                        <div class="draggable-item" draggable="true" ondragstart="drag(event)" id="d-${i}" data-cat="${item[1]}">
                            ${item[0]}
                        </div>
                    `).join('')}
                </div>
            `;
        }
        else if (currentGameMode === 'seq') {
            container.innerHTML = `
                <h3 style="text-align:center; margin-bottom:20px; color:var(--primary);">${levelData.title}</h3>
                <div class="sequence-container">
                    <div class="sequence-slot" ondrop="dropSeq(event)" ondragover="allowDrop(event)" data-slot="1">1</div>
                    <i class="fas fa-arrow-right" style="color:#cbd5e1;"></i>
                    <div class="sequence-slot" ondrop="dropSeq(event)" ondragover="allowDrop(event)" data-slot="2">2</div>
                    <i class="fas fa-arrow-right" style="color:#cbd5e1;"></i>
                    <div class="sequence-slot" ondrop="dropSeq(event)" ondragover="allowDrop(event)" data-slot="3">3</div>
                </div>
                <div class="draggables-area">
                    ${levelData.steps.sort(() => 0.5 - Math.random()).map((step, i) => `
                        <div class="draggable-item" draggable="true" ondragstart="drag(event)" id="s-${i}" data-order="${step.o}">
                            ${step.t}
                        </div>
                    `).join('')}
                </div>
            `;
            document.getElementById('game-controls').style.display = 'block';
        }
        else if (currentGameMode === 'emotion') {
            const shuffledOptions = shuffleArray([...levelData.options]);

            container.innerHTML = `
                <div style="text-align:center; margin-bottom:30px;">
                    <div style="font-size:5rem;">${levelData.emoji}</div>
                    <h3>${levelData.context}</h3>
                </div>
                <div class="options-grid">
                    ${shuffledOptions.map(opt => `
                        <div class="btn-option" onclick="checkGeneric('${opt[1]}', '${levelData.target}', this)">
                            <span class="emoji-lg">${opt[0]}</span><span>${opt[1]}</span>
                        </div>
                    `).join('')}
                </div>
            `;
        }
    }

    function playText(text) {
        const msg = new SpeechSynthesisUtterance(text);
        msg.lang = 'pt-BR';
        window.speechSynthesis.speak(msg);
    }

    function checkGeneric(selected, target, el) {
        if (selected === target) {
            el.classList.add('correct-glow');
            playText("Muito bem!");
            setTimeout(() => showModal(true), 500);
        } else {
            el.classList.add('wrong-shake');
            playText("Tente de novo");
            setTimeout(() => el.classList.remove('wrong-shake'), 500);
        }
    }

    function allowDrop(ev) { ev.preventDefault(); }
    function drag(ev) { ev.dataTransfer.setData("text", ev.target.id); }

    function drop(ev, targetCat) {
        ev.preventDefault();
        const id = ev.dataTransfer.getData("text");
        const el = document.getElementById(id);
        
        if (el.dataset.cat === targetCat) {
            ev.target.appendChild(el);
            el.classList.add('correct-glow');
            el.setAttribute('draggable', 'false');
            
            const remaining = document.getElementById('drag-area').children.length;
            if(remaining === 0) setTimeout(() => showModal(true), 500);
        } else {
            playText("Ops, lugar errado");
        }
    }

    function dropSeq(ev) {
        ev.preventDefault();
        const id = ev.dataTransfer.getData("text");
        const el = document.getElementById(id);
        if (ev.target.classList.contains('sequence-slot') && ev.target.children.length === 0) {
            ev.target.innerText = "";
            ev.target.appendChild(el);
        }
    }

    function checkCurrentGame() {
        if(currentGameMode === 'seq') {
            const slots = document.querySelectorAll('.sequence-slot');
            let correct = 0;
            slots.forEach((slot, idx) => {
                const item = slot.querySelector('.draggable-item');
                if(item && item.dataset.order == (idx + 1)) {
                    correct++;
                    item.classList.add('correct-glow');
                } else if(item) {
                    item.classList.add('wrong-shake');
                    setTimeout(()=>item.classList.remove('wrong-shake'), 500);
                }
            });
            if(correct === 3) showModal(true);
            else playText("Ainda não está certo");
        }
    }

    function showModal(success) {
        document.getElementById('feedbackModal').style.display = 'flex';
        stars++;
        document.getElementById('star-count').innerText = stars;
    }

    function nextLevel() {
        document.getElementById('feedbackModal').style.display = 'none';
        currentLevelIndex++; 
        renderGame();
    }

    switchGame('audio');

</script>
</body>
</html>