<?php
session_start();

// 1. VERIFICAÇÃO DE SEGURANÇA
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login-medseg.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// 2. CONEXÃO COM O BANCO
$conn = new mysqli("localhost", "root", "", "medseg");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// 3. BUSCA DADOS ATUALIZADOS (Adicionado 'login' na SELECT)
$stmt = $conn->prepare("SELECT nome, login, email, telefone, nascimento, cep, endereco, bairro, cidade, uf FROM usuarios WHERE id_usuario = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if (!$usuario) {
    session_destroy();
    header("Location: medseg-login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MEDSEG | Alterar Cadastro</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="medseg-editar.css" />
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

      <a class="navbar-brand mx-auto" href="#">
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
          <li class="nav-item d-lg-none">
            <a class="nav-link d-flex justify-content-between" href="#" id="openCadastro">
              <span><i class="fas fa-user-plus me-2"></i> Cadastrar</span>
              <i class="fas fa-chevron-right"></i>
            </a>
          </li>

          <li class="nav-item d-lg-none mt-4 pt-4 border-top border-secondary">
            <span class="nav-link text-white-50 small mb-2">Bem-vindo, <?= htmlspecialchars($usuario['nome']) ?></span>
            <a href="medseg-logout.php" class="nav-link text-danger">
              <i class="fas fa-sign-out-alt me-2"></i> Sair
            </a>
          </li>
        </ul>

        <div class="user-section d-none d-lg-flex align-items-center" style="gap: 15px">
          <span class="text-muted small">Bem-vindo, <?= htmlspecialchars($usuario['nome']) ?></span>
          <a href="medseg-logout.php" class="btn btn-sm btn-outline-danger">
            <i class="fas fa-sign-out-alt"></i> Sair
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

        
      </ul>
  </div>




<!---=======================================================================================--->

<!---============================================================================================---->
<!---Formulário de editar cadastro de usuario--->

<div class="container mb-5">
  <div class="row justify-content-center" style="margin-top:70px;">
    <div class="col-lg-10 col-md-11 col-12"> <div class="form">
        <form action="medseg-atualizar.php" method="POST" class="p-4 shadow bg-white rounded-4" id="formEdicao">
          <h2 class="mb-4 text-primary text-center fw-bold">Alterar Meus Dados</h2>
          
          <div class="row g-3">
              <!-- NOVO CAMPO: LOGIN -->
            <div class="col-md-6">
              <label for="login" class="form-label">Nome de Usuário (Login)</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
                <input type="text" name="login" class="form-control" id="login" value="<?= htmlspecialchars($usuario['login']) ?>" required>
              </div>
            </div>
            
            <div class="col-md-6">
              <label for="firstname" class="form-label">Nome Completo</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="nome" class="form-control" id="firstname" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label">E-mail de Acesso</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" id="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="birthdate" class="form-label">Data de Nascimento</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                <input type="date" name="nascimento" class="form-control" id="birthdate" value="<?= htmlspecialchars($usuario['nascimento']) ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="number" class="form-label">Telefone / Celular</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                <input type="text" name="telefone" class="form-control" id="number" value="<?= htmlspecialchars($usuario['telefone']) ?>" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="cep" class="form-label">CEP</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-search-location"></i></span>
                  <input type="text" name="cep" class="form-control" id="cep" 
                         value="<?= htmlspecialchars($usuario['cep']) ?>" 
                         placeholder="00000-000" maxlength="9">
                </div>
            </div>

            <div class="col-md-12">
              <label for="endereco" class="form-label">Endereço Residencial</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" name="endereco" class="form-control" id="endereco" value="<?= htmlspecialchars($usuario['endereco']) ?>">
              </div>
            </div>

            <div class="col-md-4">
              <label for="bairro" class="form-label">Bairro</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                <input type="text" name="bairro" class="form-control" id="bairro" value="<?= htmlspecialchars($usuario['bairro']) ?>">
              </div>
            </div>

            <div class="col-md-5">
              <label for="city" class="form-label">Cidade</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-city"></i></span>
                <input type="text" name="cidade" class="form-control" id="cidade" value="<?= htmlspecialchars($usuario['cidade']) ?>">
              </div>
            </div>

            <div class="col-md-3">
              <label for="uf" class="form-label">UF</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map"></i></span>
                <select name="uf" class="form-select" id="uf" required>
                  <?php
                  $ufs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
                  foreach ($ufs as $uf) {
                      $selected = (isset($usuario['uf']) && $usuario['uf'] == $uf) ? 'selected' : '';
                      echo "<option value=\"$uf\" $selected>$uf</option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-12 text-center mt-4">
              <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                <i class="fas fa-save me-2"></i>Salvar Alterações
              </button>
              <div class="mt-3">
                <a href="medSeg.php" class="btn btn-outline-secondary btn-lg px-5">Cancelar</a>
              </div>
            </div>

          </div> </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!---=======================================================================================---->
<!-- Rodapé -->
<footer class="footer-custom text-center text-lg-start ">
  <div class="container p-4">
    <div class="row text-center">

      <div class="col-md-3 text-md-start">
        <img src="images2/LOGO/logo2.png" alt="Logo Icon Web Design" class="mb-3" />

        <p><i class="fab fa-whatsapp me-2"></i>4545-4786</p>
        <p><i class="fas fa-envelope me-2"></i>medseg@empresa.com</p>
        <p><i class="fas fa-map-marker-alt me-2"></i>Rua Pedra verde, São Paulo, SP</p>
      </div>

      <div class="col-md-3 text-md-start">
        <h5>Sobre a MEDSEG</h5>
        <ul class="list-unstyled">

          <li>
            <a class="text-decoration-none  d-block mb-2" href="#">
              <i class="fas fa-home me-2"></i>Home
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="quem-somos.html">
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
            <a class="text-decoration-none  d-block" href="medSeg.html#blogs">
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