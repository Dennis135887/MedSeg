<?php
session_start();

// TRAVA DE SEGURANÇA: Só permite se for uma EMPRESA logada
if (!isset($_SESSION['empresa_id']) || $_SESSION['tipo'] !== 'empresa') {
    header("Location: medseg-login.php");
    exit();
}


$conn = new mysqli("localhost", "root", "", "medseg");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    // EXPLICAÇÃO DO PROFESSOR: 
    // Em vez de $id_empresa = $_POST['id_empresa'], usamos o ID da SESSÃO.
    // Assim, uma empresa nunca consegue cadastrar funcionários para outra.
    $id_empresa_logada = $_SESSION['empresa_id'];

    if (empty($nome)) {
        echo "O nome é obrigatório!";
        exit();
    }

    $stmt = $conn->prepare("
        INSERT INTO funcionarios (id_empresa, nome, telefone, email, cep, endereco, bairro, cidade, uf) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    // "i" para o ID (integer) e "ssssss" para os outros 6 campos (strings)
    $stmt->bind_param("issssssss", $id_empresa_logada, $nome, $telefone, $email, $cep, $endereco, $bairro, $cidade , $uf);

    if ($stmt->execute()) {
        echo "<script>alert('Funcionário cadastrado com sucesso!'); window.location.href='dashboard_empresa.php';</script>";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>MEDSEG | Cadastro de Funcionário</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <!-- Splide CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Anton&display=swap" rel="stylesheet" />
  <!-- Normalize & Custom CSS -->
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="medSeg.css" />

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="medseg-funcionario.css" />
</head>
<body>

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

      <a class="navbar-brand mx-auto" href="medSeg.php">
        <img src="images2/LOGO/logo2.png" alt="MedSeg Logo">
      </a>

      <div class="navbar-collapse" id="mainNavbar">
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

          <li class="nav-item d-lg-none mt-4">
            <a class="btn btn-danger w-100 d-flex align-items-center justify-content-center text-white" href="medseg-logout.php">
              <i class="fas fa-sign-out-alt me-2"></i> Sair do Sistema
            </a>
          </li>
        </ul>

        <div class="ms-auto d-none d-lg-block">
          <a class="btn btn-outline-danger d-flex align-items-center" href="medseg-logout.php">
            <i class="fas fa-sign-out-alt me-2"></i> Sair do Sistema
          </a>
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

        <li class="nav-item">
          <a class="nav-link" href="cadastrar_funcionario.php"><i class="fas fa-user me-2"></i> Cadastrar funcionário</a>
        </li>
      </ul>
  </div>


<!---=======================================================================================--->

<div class="container mb-5">
  <div class="row align-items-center" style="margin-top:140px;">
    <div class="col-lg-10 col-md-11 col-12 mx-auto"> <div class="form">
        <form action="cadastrar_funcionario.php" method="POST" class="p-4 shadow bg-white rounded-4">

          <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
            <h2 class="text-primary fw-bold text-center text-md-start mb-0">Cadastro de Funcionário</h2>
            <a href="dashboard_empresa.php" class="btn btn-outline-primary btn-responsivo">
              <i class="fas fa-users"></i> Ver Lista de Funcionários
            </a>
          </div>

          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Nome do Funcionário</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="nome" class="form-control" placeholder="Digite o nome completo" required>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Telefone</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                <input type="tel" name="telefone" class="form-control" placeholder="(00) 00000-0000">
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Digite o email">
              </div>
            </div>

            <div class="col-12 mb-2 mt-4">
              <h5 class="text-secondary border-bottom pb-2">Endereço do Funcionário</h5>
            </div>

            <div class="col-md-4">
              <label class="form-label">CEP</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-search-location"></i></span>
                  <input type="text" name="cep" class="form-control" placeholder="00000-000" maxlength="9" required>
                </div>
            </div>

        <div class="col-md-8"></div>

            <div class="col-md-12">
              <label class="form-label">Logradouro</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-home"></i></span>
                <input type="text" name="endereco" class="form-control" placeholder="Rua, nº" required>
              </div>
            </div>

            <div class="col-md-4">
              <label class="form-label">Bairro</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                <input type="text" name="bairro" class="form-control" placeholder="Bairro" required>
              </div>
            </div>

            <div class="col-md-5">
              <label class="form-label">Cidade</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-city"></i></span>
                <input type="text" name="cidade" class="form-control" placeholder="Cidade" required>
              </div>
            </div>

            <div class="col-md-3">
              <label class="form-label">UF</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map"></i></span>
                <select name="uf" class="form-select" required>
                  <option value="" selected disabled>--</option>
                  <option value="AC">AC</option>
                  <option value="AL">AL</option>
                  <option value="AP">AP</option>
                  <option value="AM">AM</option>
                  <option value="BA">BA</option>
                  <option value="CE">CE</option>
                  <option value="DF">DF</option>
                  <option value="ES">ES</option>
                  <option value="GO">GO</option>
                  <option value="MA">MA</option>
                  <option value="MT">MT</option>
                  <option value="MS">MS</option>
                  <option value="MG">MG</option>
                  <option value="PA">PA</option>
                  <option value="PB">PB</option>
                  <option value="PR">PR</option>
                  <option value="PE">PE</option>
                  <option value="PI">PI</option>
                  <option value="RJ">RJ</option>
                  <option value="RN">RN</option>
                  <option value="RS">RS</option>
                  <option value="RO">RO</option>
                  <option value="RR">RR</option>
                  <option value="SC">SC</option>
                  <option value="SP">SP</option>
                  <option value="SE">SE</option>
                  <option value="TO">TO</option>
                </select>
              </div>
            </div>

            <div class="col-12 mt-4 text-center">
              <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                <i class="fas fa-save me-2"></i>Finalizar Cadastro
              </button>
            </div>

          </div> </form>
      </div>

    </div>
  </div>
</div>


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
            <a class="text-decoration-none  d-block mb-2" href="#nossos-trabalhos">
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>



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