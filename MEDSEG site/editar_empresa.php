<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Verifica se é uma empresa que está logada
if (!isset($_SESSION['empresa_id'])) {
    header("Location: medseg-login.php?redirect=editar_empresa.php");
    exit();
}

$empresa_id = $_SESSION['empresa_id'];
$conn = new mysqli("localhost", "root", "", "medseg");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

// ATUALIZADO: Adicionado o campo 'login' na consulta SQL
// Troque 'city' por 'cidade'
$stmt = $conn->prepare("SELECT nome, login, cnpj, email, telefone, cep, endereco, bairro, cidade, uf FROM empresas WHERE id_empresa = ?");
$stmt->bind_param("i", $empresa_id);
$stmt->execute();
$result = $stmt->get_result();
$empresa = $result->fetch_assoc();

if (!$empresa) {
    echo "Empresa não encontrada.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Editar Empresa</title>

<meta name="description" content="MEDSEG: Referência em Medicina e Segurança do Trabalho. Gestão completa de NRs, exames ocupacionais, treinamentos e assessoria técnica para o eSocial. Proteja sua empresa e seus colaboradores.">

<meta name="keywords" content="MEDSEG, medicina do trabalho, segurança do trabalho, eSocial, exames admissionais, PCMSO, PGR, treinamento NR, saúde ocupacional">

<meta name="author" content="MEDSEG">



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
  <link rel="stylesheet" href="cadastro_empresa.css" />

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="editar_empresa.css" />

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

      <div class="user-section d-flex align-items-center d-lg-none">
        <a href="medseg-logout.php" title="Sair" class="text-danger">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>

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
          <a class="nav-link" href="editar_empresa.php"><i class="fas fa-building me-2"></i> Cadastrar Empresa</a>
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
<div class="container py-5">
  <div class="row justify-content-center" style="margin-top:100px;">
    <div class="col-lg-10 col-md-11 col-12">
      <div class="form">
        <form action="atualizar_empresa.php" method="POST" class="p-4 shadow bg-white rounded-4">
          <h2 class="mb-4 text-primary text-center fw-bold">Editar Empresa</h2>

          <div class="row g-3">
            <!-- NOVO CAMPO: LOGIN DA EMPRESA -->
            <div class="col-md-6">
              <label class="form-label">Login de Acesso</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                <input type="text" name="login" class="form-control" value="<?= htmlspecialchars($empresa['login'] ?? '') ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nome da Empresa</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
                <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($empresa['nome']) ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">CNPJ</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                <input type="text" name="cnpj" id="cnpj" class="form-control" value="<?= htmlspecialchars($empresa['cnpj']) ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($empresa['email']) ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Telefone</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($empresa['telefone']) ?>" required>
              </div>
            </div>
            
              <div class="col-md-6">
                <label class="form-label">CEP</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-search-location"></i></span>
                  <input type="text" name="cep" class="form-control" 
                         value="<?= htmlspecialchars($empresa['cep'] ?? '') ?>" 
                         placeholder="00000-000" maxlength="9" required>
                </div>
              </div>

            <div class="col-md-6">
              <label class="form-label">Endereço (Rua e Nº)</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" name="endereco" class="form-control" value="<?= htmlspecialchars($empresa['endereco'] ?? '') ?>" placeholder="Rua exemplo, 123">
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Bairro</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                <input type="text" name="bairro" class="form-control" value="<?= htmlspecialchars($empresa['bairro'] ?? '') ?>">
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Cidade</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-city"></i></span>
                <input type="text" name="cidade" class="form-control" value="<?= htmlspecialchars($empresa['cidade'] ?? '') ?>">
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">UF</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map"></i></span>
                <select name="uf" class="form-select" required>
                  <?php
                  $ufs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
                  foreach ($ufs as $uf) {
                      $selected = ($empresa['uf'] == $uf) ? 'selected' : '';
                      echo "<option value=\"$uf\" $selected>$uf</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary btn-lg px-4">Salvar Alterações</button>
            <a href="medSeg.php" class="btn btn-outline-secondary btn-lg px-4 d-flex align-items-center justify-content-center">
              <i class="fas fa-times me-2"></i> Cancelar
            </a>
          </div>
        </form>
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
            <a class="text-decoration-none  d-block mb-2" href="medSeg.html">
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




<!-- máscara CNPJ -->
<script>
document.getElementById('cnpj').addEventListener('input', function (e) {
  let v = e.target.value.replace(/\D/g, '');
  v = v.replace(/^(\d{2})(\d)/, '$1.$2');
  v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
  v = v.replace(/\.(\d{3})(\d)/, '.$1/$2');
  v = v.replace(/(\d{4})(\d)/, '$1-$2');
  e.target.value = v;
});
</script>


<script>
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