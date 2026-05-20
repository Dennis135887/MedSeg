<?php
session_start();

// Redirect seguro
$redirect = $_GET['redirect'] ?? $_POST['redirect'] ?? null;

$allowed_redirects = [
    "editar_empresa.php",
    "cadastrar_funcionario.php"
];

if (!in_array($redirect, $allowed_redirects)) {
    $redirect = null;
}

// Verifica se já está logado
if (isset($_SESSION['empresa_id']) && $redirect) {
    header("Location: " . $redirect);
    exit();
}

// Conexão
$conn = new mysqli("localhost", "root", "", "medseg");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// PROCESSA LOGIN
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // MUDANÇA AQUI: Recebemos 'login' em vez de 'email'
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    // =============================
    // 1. TENTA LOGIN COMO USUÁRIO
    // =============================
    // Buscamos na coluna 'login' da tabela usuarios
    $stmt = $conn->prepare("SELECT id_usuario, nome, senha FROM usuarios WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if (password_verify($senha, $user["senha"])) {
            $_SESSION["usuario_id"] = $user["id_usuario"]; 
            $_SESSION["nome"]       = $user["nome"];
            $_SESSION["tipo"]       = "usuario";

            header("Location: " . ($redirect ?? "medseg-editar.php"));
            exit();
        }
    }

    // =============================
    // 2. TENTA LOGIN COMO EMPRESA (Se não for usuário)
    // =============================
    // Buscamos na coluna 'login' da tabela empresas
    $stmt = $conn->prepare("SELECT id_empresa, nome, senha FROM empresas WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $empresa = $res->fetch_assoc();

        if (password_verify($senha, $empresa["senha"])) {
            $_SESSION["empresa_id"] = $empresa["id_empresa"];
            $_SESSION["nome"]       = $empresa["nome"];
            $_SESSION["tipo"]       = "empresa";

            header("Location: " . ($redirect ?? "cadastrar_funcionario.php"));
            exit();
        }
    }

    // =============================
    // ERRO GERAL (Se não encontrou em nenhum dos dois ou senha errada)
    // =============================
    echo "<script>alert('Login ou senha inválidos!'); window.location.href='medseg-login.php';</script>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
<title>MEDSEG | Login</title>

<meta name="description" content="MEDSEG: Referência em Medicina e Segurança do Trabalho. Gestão completa de NRs, exames ocupacionais, treinamentos e assessoria técnica para o eSocial. Proteja sua empresa e seus colaboradores.">

<meta name="keywords" content="MEDSEG, medicina do trabalho, segurança do trabalho, eSocial, exames admissionais, PCMSO, PGR, treinamento NR, saúde ocupacional">

<meta name="author" content="MEDSEG">

  <!-- Bootstrap e Ícones -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Anton&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="medseg-login.css" />
</head>
<body>



<!-- Navbar -->
<!---==================================================================================---->
<!---Navbar--->
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top px-3 custom-mobile-nav">
    <div class="container-fluid">

      <button class="custom-toggler navbar-toggler me-2" type="button">
        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
      </button>

      <a class="navbar-brand mx-auto" href="#">
        <img src="images2/LOGO/logo2.png" alt="MedSeg Logo">
      </a>

      <div class="navbar-collapse" id="mainNavbar">

        <!-- MENU CENTRAL -->
        <ul class="navbar-nav me-auto nav-list-mobile">

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php"><i class="fas fa-home me-2"></i> Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="quem-somos.php"><i class="fas fa-info-circle me-2"></i> Quem somos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php#contato"><i class="fas fa-envelope me-2"></i> Contato</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-server me-2"></i> Serviços</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medseg-esocial.php"><i class="fas fa-laptop me-2"></i> Esocial</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php#blogs"><i class="fas fa-blog me-2"></i> Blog</a>
          </li>

          <li class="nav-item d-lg-none">
            <a class="nav-link d-flex justify-content-between" href="#" id="openCadastro">
              <span><i class="fas fa-user-plus me-2"></i> Cadastrar</span>
              <i class="fas fa-chevron-right"></i>
            </a>
          </li>

        </ul>

        <!-- BOTÃO CADASTRAR (DIREITA) -->
        <div class="ms-auto d-none d-lg-block custom-dropdown">
          <a class="nav-link dropdown-toggle" href="#">
            <i class="fas fa-user-plus me-2"></i> Cadastrar
          </a>

          <div class="dropdown-mevmed">
            <a href="empresa-cadastro.php" class="dropdown-card">
              <i class="fas fa-building"></i>
              <div>
                <strong>Empresa</strong>
                <p>Cadastre sua empresa no sistema</p>
              </div>
            </a>

            <a href="cadastro-medseg.php" class="dropdown-card">
              <i class="fas fa-user"></i>
              <div>
                <strong>Usuário</strong>
                <p>Crie um novo usuário</p>
              </div>
            </a>
          </div>
        </div>

      </div>


    </div>



  </nav>
</header>

<!---Menu cadastar em mobile--->
  <div class="submenu-cadastro">
      <div class="submenu-header">
        <button class="btn-back">
          <i class="fas fa-arrow-left"></i> Voltar
        </button>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="empresa-cadastro.php"><i class="fas fa-building me-2"></i> Cadastrar Empresa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastro-medseg.php"><i class="fas fa-user me-2"></i> Cadastrar Usuário</a>
        </li>
      </ul>
  </div>

<!---==============================================================================================--->



<!-- Formulário de Login -->
<div class="container py-5 ">
  <div class="row justify-content-center" style="margin-top:100px;">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
      <div class="form">
        <form action="medseg-login.php" method="POST" class="p-4 shadow bg-white rounded-4">
           <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '') ?>">
          <h2 class="mb-4 text-primary text-center fw-bold">Faça seu login</h2>

         <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <!-- MUDANÇA AQUI: name="login" e type="text" -->
              <input type="text" name="login" class="form-control" id="login" placeholder="Digite seu login" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha" required>
              <span class="input-group-text toggle-password" data-target="senha"><i class="fas fa-eye"></i></span>
            </div>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg px-5">Entrar</button>
          </div>
        </form>

        <p class="text-center mt-3">
          Ainda não tem conta? <a href="cadastro-medseg.php">Cadastre-se</a>
        </p>
      </div>
    </div>
  </div>
</div>

<!---=======================================================================================---->
<!---=======================================================================================---->
<!-- Rodapé -->
<footer class="footer-custom text-center text-lg-start ">
  <div class="container p-4">
    <div class="row text-center">

      <div class="col-md-3 text-md-start">
        <img src="images2/LOGO/logo2.png" alt="Logo Medseg" class="mb-3" />

        <p><i class="fab fa-whatsapp me-2"></i>4545-4786</p>
        <p><i class="fas fa-envelope me-2"></i>medseg@empresa.com</p>
        <p><i class="fas fa-map-marker-alt me-2"></i>Rua Pedra verde, São Paulo, SP</p>
      </div>

      <div class="col-md-3 text-md-start">
        <h5>Sobre a MEDSEG</h5>
        <ul class="list-unstyled">

          <li>
            <a class="text-decoration-none  d-block mb-2" href="medSeg.php">
              <i class="fas fa-home me-2"></i>Home
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="quem-somos.php">
              <i class="fas fa-info-circle me-2"></i>Quem somos
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="medSeg.php#contato">
              <i class="fas fa-envelope me-2"></i>Contato
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="#">
              <i class="fas fa-server me-2"></i>Serviços
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="medseg-esocial.php">
              <i class="fas fa-laptop me-2"></i>Esocial
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block" href="medSeg.php#blogs">
              <i class="fas fa-blog me-2"></i>Blog
            </a>
          </li>

        </ul>
      </div>

      <div class="col-md-3 text-md-start">
        <h5>Nosso horário</h5>
        <p><i class="fas fa-clock me-2"></i>Segunda: 10h - 17h</p>
        <p><i class="fas fa-clock me-2"></i>Sábado: 10h - 13h</p>
        <p><i class="fas fa-clock me-2"></i>Domingo: Fechado</p>
      </div>

      <div class="col-md-3 text-md-start">
        <h5>Quem somos</h5>
        <p>
        Nossa empresa se especializou em Medicina e Segurança do Trabalho porque
        defendemos a dignidade do ser humano, como trabalhador e como empresário,
        devido às alterações das legislações, das Normas Regulamentadoras e nas
        diretrizes estabelecidas pelo INSS.
        </p>

        <div class="mt-3">
          <a href="#" class="text-dark me-3"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-dark me-3"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-linkedin fa-lg"></i></a>
        </div>
      </div>

      <!-- Rodapé inferior -->
      <div class="footer-custom2 col-12 mt-4 text-center">
        <hr />
        <p>&copy; 2025 - MEDSEG Gestão Ocupacional | Todos os direitos reservados – Desenvolvido por Icon Web Design</p>
      </div>

    </div>
  </div>
</footer>
<!--=============================================================--->


<!--=============================================================--->



<!-- Scripts -->
<script>
  // Mostrar/Ocultar senha
  const toggles = document.querySelectorAll(".toggle-password");

  toggles.forEach(toggle => {
    toggle.addEventListener("click", () => {
      const targetId = toggle.getAttribute("data-target");
      const input = document.getElementById(targetId);

      if (input.type === "password") {
        input.type = "text";
        toggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
      } else {
        input.type = "password";
        toggle.innerHTML = '<i class="fas fa-eye"></i>';
      }
    });
  });
</script>

<!--Script para outra página-->

<script>
  window.addEventListener('DOMContentLoaded', function () {
    const hash = window.location.hash;

    if (hash === '#whatsapp-contato' || hash === 'nossos-trabalhos') {
      const targetSection = document.querySelector(hash);

      if (targetSection) {
        // Scroll suave até a seção
        targetSection.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
</script><!--fim do script para outra página-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<a 
href="#" class="whatsapp-float"
>

<!---com esse link real voçe é enviado para o site do whatsapp<a 
href="https://wa.me/5599999999999" 
class="whatsapp-float"
target="_blank"
>-->

<i class="fab fa-whatsapp"></i>

</a>


<script src="js/anime_navbar.js" defer></script>
<script src="js/anime_img.js" defer></script>
<script src="js/blog_slide.js" defer></script>
<script src="js/chat_medseg.js" defer></script>
<script src="js/hero_script.js" defer></script>
<script src="js/slide_script.js" defer></script>

</body>
</html>