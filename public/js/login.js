// Simulação de banco de dados em memória
let bancoDeDados = [];

// Mostrar formulário de acordo com o tipo
function mostrarFormulario(tipo) {
  // Esconde todos
  document.querySelectorAll(".formulario").forEach(f => f.style.display = "none");

  // Mostra apenas o clicado
  if (tipo === "google") {
    document.getElementById("form-google").style.display = "block";
  } else if (tipo === "email") {
    document.getElementById("form-email").style.display = "block";
  }
}

// Função de registro
function registrar(tipo) {
  let email, senha;

  if (tipo === "google") {
    email = document.getElementById("google-email").value.trim();
    senha = document.getElementById("google-senha").value.trim();
  } else {
    email = document.getElementById("email").value.trim();
    senha = document.getElementById("senha").value.trim();
  }

  if (!validarEmail(email)) {
    alert("Por favor, insira um e-mail válido (ex: usuario@gmail.com).");
    return;
  }

  if (senha.length < 6) {
    alert("A senha deve ter no mínimo 6 caracteres.");
    return;
  }

  const usuarioExistente = bancoDeDados.find(user => user.email === email);
  if (usuarioExistente) {
    alert("Este e-mail já está registrado.");
    return;
  }

  bancoDeDados.push({ email, senha, tipo });
  alert("Usuário registrado com sucesso!");
  console.log(bancoDeDados);
}

// Função de login
function login(tipo) {
  let email, senha;

  if (tipo === "google") {
    email = document.getElementById("google-email").value.trim();
    senha = document.getElementById("google-senha").value.trim();
  } else {
    email = document.getElementById("email").value.trim();
    senha = document.getElementById("senha").value.trim();
  }

  if (!validarEmail(email)) {
    alert("Digite um e-mail válido.");
    return;
  }

  const usuario = bancoDeDados.find(user => user.email === email && user.senha === senha);
  if (usuario) {
    alert("Login realizado com sucesso! Bem-vindo " + email);
  } else {
    alert("E-mail ou senha incorretos.");
  }
}

// Validação de email com domínios permitidos
function validarEmail(email) {
  const padrao = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!padrao.test(email)) return false;

  const dominiosPermitidos = [
    "gmail.com", "outlook.com", "hotmail.com", "yahoo.com", 
    "edu.br" // você pode adicionar mais aqui
  ];
  
  const dominio = email.split("@")[1].toLowerCase();
  return dominiosPermitidos.includes(dominio);
}
